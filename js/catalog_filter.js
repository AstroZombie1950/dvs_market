/* ===== Фильтр каталога по бренду ===== */
(function () {
	const cards     = document.querySelectorAll('.product-card');
	const links     = document.querySelectorAll('#brandFilter a[data-brand]');
	const countEl   = document.getElementById('catalogCount');
	const total     = cards.length;

	/* считаем и проставляем счётчики в сайдбаре */
	links.forEach(function (link) {
		const brand = link.dataset.brand;
		const count = [...cards].filter(function (c) {
			return c.dataset.brand.split(' ').includes(brand);
		}).length;
		link.querySelector('span').textContent = '(' + count + ')';
	});

	/* обновляем строку "Отображение X–Y из Z" */
	function updateCount(visible) {
		if (visible === total) {
			countEl.textContent = 'Отображение 1–' + total + ' из ' + total;
		} else {
			countEl.textContent = 'Отображение 1–' + visible + ' из ' + total;
		}
	}

	/* фильтрация */
	function filterBy(brand) {
		let visible = 0;
		cards.forEach(function (card) {
			const brands = card.dataset.brand.split(' ');
			const show   = brands.includes(brand);
			card.style.display = show ? '' : 'none';
			if (show) visible++;
		});
		updateCount(visible);
	}

	function resetFilter() {
		cards.forEach(function (card) { card.style.display = ''; });
		updateCount(total);
		links.forEach(function (l) { l.classList.remove('active'); });
		/* убираем кнопку сброса */
		const resetBtn = document.getElementById('filterReset');
		if (resetBtn) resetBtn.style.display = 'none';
	}

	/* клик по марке */
	links.forEach(function (link) {
		link.addEventListener('click', function (e) {
			e.preventDefault();

			/* если кликнули по уже активной — сбрасываем */
			if (this.classList.contains('active')) {
				resetFilter();
				return;
			}

			links.forEach(function (l) { l.classList.remove('active'); });
			this.classList.add('active');
			filterBy(this.dataset.brand);

			/* показываем кнопку сброса */
			const resetBtn = document.getElementById('filterReset');
			if (resetBtn) resetBtn.style.display = '';
		});
	});

	/* кнопка "Показать все" */
	const resetBtn = document.getElementById('filterReset');
	if (resetBtn) {
		resetBtn.style.display = 'none';
		resetBtn.addEventListener('click', function (e) {
			e.preventDefault();
			resetFilter();
		});
	}
})();