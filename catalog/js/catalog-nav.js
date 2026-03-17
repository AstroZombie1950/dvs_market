(function () {

	// ===== DOM =====
	const grid       = document.getElementById('catalog-grid');
	const breadcrumbs = document.getElementById('breadcrumbs');
	const title      = document.getElementById('catalog-title');

	// ===== СОСТОЯНИЕ =====
	// level: 'brands' | 'generations' | 'engines'
	let state = {
		level:      'brands',
		brand:      null,
		model:      null,
		generation: null,
	};

	// ===== ИНИЦИАЛИЗАЦИЯ =====
	render();

	// ===== РЕНДЕР =====
	function render() {
		grid.innerHTML = '';

		if (state.level === 'brands')      renderBrands();
		if (state.level === 'generations') renderGenerations();
		if (state.level === 'engines')     renderEngines();

		updateBreadcrumbs();
		updateTitle();
	}

	// --- Уровень 1: карточки марок ---
	function renderBrands() {
		const brands = Object.keys(CATALOG);

		if (!brands.length) {
			grid.innerHTML = '<p class="brand-grid__empty">Каталог пуст</p>';
			return;
		}

		brands.forEach((brand) => {
			const models = Object.keys(CATALOG[brand]);
			const card   = createCard({
				title: brand,
				tags:  models,
				onTagClick: (model) => {
					state.level = 'generations';
					state.brand = brand;
					state.model = model;
					render();
				},
			});
			grid.appendChild(card);
		});
	}

	// --- Уровень 2: карточки поколений ---
	function renderGenerations() {
		const models = CATALOG[state.brand];

		Object.entries(models).forEach(([model, generations]) => {
			const genList = Object.keys(generations);
			const card    = createCard({
				title: model,
				tags:  genList,
				onTagClick: (generation) => {
					state.level      = 'engines';
					state.generation = generation;
					render();
				},
			});
			grid.appendChild(card);
		});
	}

	// --- Уровень 3: карточки двигателей ---
	function renderEngines() {
		const engines = CATALOG[state.brand][state.model][state.generation];

		// Если двигатель один — сразу редиректим
		if (engines.length === 1 && engines[0].slug) {
			window.location.href = '/product/index.php?slug=' + engines[0].slug;
			return;
		}

		engines.forEach(({ engine, slug }) => {
			const card = createCard({
				title: engine,
				tags:  slug ? [engine] : [],
				onTagClick: () => {
					if (slug) window.location.href = '/product/index.php?slug=' + slug;
				},
				// если slug пустой — карточка без тегов, просто заголовок
				desc: slug ? '' : 'Скоро в наличии',
			});
			grid.appendChild(card);
		});
	}

	// ===== КРАФТ КАРТОЧКИ =====
	function createCard({ title, tags = [], onTagClick, desc = '' }) {
		const card = document.createElement('div');
		card.className = 'brand-card';

		// теги моделей/поколений/двигателей
		const tagItems = tags.map((tag) => {
			return `<li><a href="#" data-tag="${escHtml(tag)}">${escHtml(tag)}</a></li>`;
		}).join('');

		card.innerHTML = `
			<div class="brand-card__top"></div>
			<div class="brand-card__body">
				<h2 class="brand-card__title">${escHtml(title)}</h2>
				${desc ? `<p class="brand-card__desc">${escHtml(desc)}</p>` : ''}
				${tagItems ? `<ul class="brand-card__models">${tagItems}</ul>` : ''}
			</div>
		`;

		// вешаем клики на теги
		card.querySelectorAll('[data-tag]').forEach((link) => {
			link.addEventListener('click', (e) => {
				e.preventDefault();
				onTagClick(link.dataset.tag);
			});
		});

		return card;
	}

	// ===== ХЛЕБНЫЕ КРОШКИ =====
	function updateBreadcrumbs() {
		const sep  = '<span class="breadcrumbs__sep"></span>';
		let html   = '<a href="/">Главная</a>';

		// Каталог — всегда кликабелен если не на первом уровне
		if (state.level === 'brands') {
			html += sep + '<span class="breadcrumbs__current">Каталог</span>';
		} else {
			html += sep + `<a href="#" id="crumb-catalog">Каталог</a>`;
		}

		// Марка
		if (state.brand) {
			if (state.level === 'generations') {
				html += sep + `<span class="breadcrumbs__current">${escHtml(state.brand)}</span>`;
			} else {
				html += sep + `<a href="#" id="crumb-brand">${escHtml(state.brand)}</a>`;
			}
		}

		// Модель
		if (state.model) {
			if (state.level === 'engines') {
				html += sep + `<span class="breadcrumbs__current">${escHtml(state.model)}</span>`;
			}
		}

		breadcrumbs.innerHTML = html;

		// Клики по крошкам
		const crumbCatalog = document.getElementById('crumb-catalog');
		if (crumbCatalog) {
			crumbCatalog.addEventListener('click', (e) => {
				e.preventDefault();
				state = { level: 'brands', brand: null, model: null, generation: null };
				render();
			});
		}

		const crumbBrand = document.getElementById('crumb-brand');
		if (crumbBrand) {
			crumbBrand.addEventListener('click', (e) => {
				e.preventDefault();
				state.level      = 'generations';
				state.generation = null;
				render();
			});
		}
	}

	// ===== ЗАГОЛОВОК =====
	function updateTitle() {
		const map = {
			brands:      'Новые моторы',
			generations: 'Новые моторы для ' + (state.brand ?? ''),
			engines:     'Новые моторы для ' + [state.brand, state.model, state.generation].filter(Boolean).join(' '),
		};
		title.textContent = map[state.level] ?? '';
	}

	// ===== УТИЛИТА =====
	function escHtml(str) {
		return String(str)
			.replace(/&/g, '&amp;')
			.replace(/</g, '&lt;')
			.replace(/>/g, '&gt;')
			.replace(/"/g, '&quot;');
	}

})();