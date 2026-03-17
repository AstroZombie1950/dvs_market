(function () {

	// ===== DOM =====
	const grid        = document.getElementById('catalog-grid');
	const breadcrumbs = document.getElementById('breadcrumbs');
	const title       = document.getElementById('catalog-title');

	// ===== СОСТОЯНИЕ =====
	// Берём начальное состояние из PHP
	let state = Object.assign(
		{ level: 'brands', brand: null, model: null },
		typeof CATALOG_STATE !== 'undefined' ? CATALOG_STATE : {}
	);

	// ===== ИНИЦИАЛИЗАЦИЯ =====
	// PHP уже нарисовал карточки — JS только вешает обработчики
	updateBreadcrumbs();
	updateTitle();

	// ===== НАВИГАЦИЯ + HISTORY API =====
	function navigate(newState) {
		state = newState;

		// Перезагружаем страницу по новому URL — PHP отрендерит нужный уровень
		window.location.href = buildUrl(state);
	}

	// Строим URL из состояния
	function buildUrl(s) {
		let url = '/catalog/';
		if (s.brand) url += toSlug(s.brand) + '/';
		if (s.model) url += toSlug(s.model) + '/';
		return url;
	}

	// ===== ХЛЕБНЫЕ КРОШКИ =====
	function updateBreadcrumbs() {
		const sep = '<span class="breadcrumbs__sep"></span>';
		let html  = '<a href="/">Главная</a>';

		if (state.level === 'brands') {
			html += sep + '<span class="breadcrumbs__current">Каталог</span>';
		} else {
			html += sep + '<a href="/catalog/">Каталог</a>';
		}

		if (state.brand) {
			const brandUrl = '/catalog/' + toSlug(state.brand) + '/';
			if (state.level === 'generations') {
				html += sep + '<span class="breadcrumbs__current">' + escHtml(state.brand) + '</span>';
			} else {
				html += sep + '<a href="' + brandUrl + '">' + escHtml(state.brand) + '</a>';
			}
		}

		if (state.model && state.level === 'engines') {
			html += sep + '<span class="breadcrumbs__current">' + escHtml(state.model) + '</span>';
		}

		breadcrumbs.innerHTML = html;
	}

	// ===== ЗАГОЛОВОК =====
	function updateTitle() {
		const map = {
			brands:      'Новые моторы',
			generations: 'Новые моторы для ' + (state.brand ?? ''),
			engines:     'Новые моторы для ' + [state.brand, state.model].filter(Boolean).join(' '),
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