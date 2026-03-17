/* ===== Фильтр каталога по бренду ===== */
(function () {
	const cards   = document.querySelectorAll('.brand-card');
	const links   = document.querySelectorAll('#brandFilter a[data-brand]');
	const grid    = document.querySelector('.brand-grid');

	/* плашка пустой выдачи */
	const empty = document.createElement('p');
	empty.className = 'brand-grid__empty';
	empty.textContent = 'Двигателей для этой марки пока нет в каталоге.';
	empty.style.display = 'none';
	grid.after(empty);

	/* фильтрация — показываем только нужную карточку */
	function filterBy(brand) {
		let visible = 0;
		cards.forEach(function (card) {
			const show = card.dataset.brand === brand;
			card.style.display = show ? '' : 'none';
			if (show) visible++;
		});
		empty.style.display = visible === 0 ? '' : 'none';
	}

	/* сброс — показываем все */
	function resetFilter() {
		cards.forEach(function (card) { card.style.display = ''; });
		links.forEach(function (l) { l.classList.remove('active'); });
		empty.style.display = 'none';
	}

	/* клик по марке в сайдбаре */
	links.forEach(function (link) {
		link.addEventListener('click', function (e) {
			e.preventDefault();

			/* повторный клик по активной — сброс */
			if (this.classList.contains('active')) {
				resetFilter();
				return;
			}

			links.forEach(function (l) { l.classList.remove('active'); });
			this.classList.add('active');
			filterBy(this.dataset.brand);
		});
	});
})();