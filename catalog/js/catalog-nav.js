(function () {

	// ===== DOM =====
	const breadcrumbs = document.getElementById('breadcrumbs');
	const title       = document.getElementById('catalog-title');

	// ===== СОСТОЯНИЕ =====
	// Берём состояние из PHP
	const state = Object.assign(
		{ level: 'brands', brand: null, model: null, generation: null },
		typeof CATALOG_STATE !== 'undefined' ? CATALOG_STATE : {}
	);

	// ===== ИНИЦИАЛИЗАЦИЯ =====
	updateBreadcrumbs();
	updateTitle();

	// ===== ХЛЕБНЫЕ КРОШКИ =====
	function updateBreadcrumbs() {
		const sep = '<span class="breadcrumbs__sep"></span>';
		let html  = '<a href="/">Главная</a>';

		// Каталог
		if (state.level === 'brands') {
			html += sep + '<span class="breadcrumbs__current">Каталог</span>';
		} else {
			html += sep + '<a href="/catalog/">Каталог</a>';
		}

		// Марка
		if (state.brand) {
			const brandUrl = '/catalog/' + toSlug(state.brand) + '/';
			if (state.level === 'brands_detail') {
				html += sep + '<span class="breadcrumbs__current">' + escHtml(state.brand) + '</span>';
			} else {
				html += sep + '<a href="' + brandUrl + '">' + escHtml(state.brand) + '</a>';
			}
		}

		// Модель
		if (state.model) {
			const modelUrl = '/catalog/' + toSlug(state.brand) + '/' + toSlug(state.model) + '/';
			if (state.level === 'models') {
				html += sep + '<span class="breadcrumbs__current">' + escHtml(state.model) + '</span>';
			} else {
				html += sep + '<a href="' + modelUrl + '">' + escHtml(state.model) + '</a>';
			}
		}

		// Поколение
		if (state.generation && state.level === 'generations') {
			html += sep + '<span class="breadcrumbs__current">' + escHtml(state.generation) + '</span>';
		}

		breadcrumbs.innerHTML = html;
	}

	// ===== ЗАГОЛОВОК =====
	function updateTitle() {
		const map = {
			brands:        'Новые моторы',
			brands_detail: 'Новые моторы ' + (state.brand ?? ''),
			models:        'Новые моторы ' + [state.brand, state.model].filter(Boolean).join(' '),
			generations:   'Новые моторы ' + [state.brand, state.model, state.generation].filter(Boolean).join(' '),
		};
		title.textContent = map[state.level] ?? 'Новые моторы';
	}

	// ===== УТИЛИТЫ =====
	function toSlug(str) {
		return String(str)
			.toLowerCase()
			.replace(/\s+/g, '-')
			.replace(/[^a-z0-9\-]/g, '')
			.replace(/-+/g, '-')
			.replace(/^-|-$/g, '');
	}

	function escHtml(str) {
		return String(str)
			.replace(/&/g, '&amp;')
			.replace(/</g, '&lt;')
			.replace(/>/g, '&gt;')
			.replace(/"/g, '&quot;');
	}

})();