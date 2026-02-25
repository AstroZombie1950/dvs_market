/* --- Scroll: hide topbar --- */
(function () {
	var topbar = document.querySelector('.header__topbar');
	var lastScroll = 0;
	var ticking = false;

	window.addEventListener('scroll', function () {
		if (!ticking) {
			requestAnimationFrame(function () {
				var current = window.scrollY;
				if (current > 60 && current > lastScroll) {
					topbar.classList.add('hidden');
				} else if (current < lastScroll || current <= 10) {
					topbar.classList.remove('hidden');
				}
				lastScroll = current;
				ticking = false;
			});
			ticking = true;
		}
	});
})();

/* --- Burger --- */
function toggleMenu() {
	var burger = document.getElementById('burger');
	var drawer = document.getElementById('navDrawer');
	burger.classList.toggle('open');
	drawer.classList.toggle('open');
}

/* --- Modal --- */
function openModal() {
	document.getElementById('modalBackdrop').classList.add('open');
	document.body.style.overflow = 'hidden';
}

function closeModal() {
	document.getElementById('modalBackdrop').classList.remove('open');
	document.body.style.overflow = '';
}

function closeModalOnBackdrop(e) {
	if (e.target === document.getElementById('modalBackdrop')) {
		closeModal();
	}
}

document.addEventListener('keydown', function (e) {
	if (e.key === 'Escape') closeModal();
});

/* --- FAQ Accordion --- */
document.addEventListener('DOMContentLoaded', function () {
	document.querySelectorAll('.faq__question').forEach(function (btn) {
		btn.addEventListener('click', function () {
			var isOpen = this.getAttribute('aria-expanded') === 'true';
			var answer = this.nextElementSibling;
			if (isOpen) {
				this.setAttribute('aria-expanded', 'false');
				answer.style.maxHeight = null;
			} else {
				this.setAttribute('aria-expanded', 'true');
				answer.style.maxHeight = answer.scrollHeight + 'px';
			}
		});
	});
});

/* ---- Scroll reveal ---- */
(function () {
	const items = document.querySelectorAll('.reveal');
	if (!items.length) return;

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (entry.isIntersecting) {
					/* задержка берётся из data-атрибута, выставленного ниже */
					const delay = entry.target.dataset.delay || 0;
					setTimeout(() => {
			entry.target.classList.add('visible');
					}, delay);
					observer.unobserve(entry.target);
				}
			});
		},
		{ threshold: 0.15 }
	);

	/* 80мс между каждым элементом для stagger-эффекта */
	items.forEach((el, i) => {
		el.dataset.delay = i * 80;
		observer.observe(el);
	});
})();

/* Маска и валидация телефона. Принимает id поля, вешает маску и валидацию */
function initPhoneMask(inputId) {
	const input = document.getElementById(inputId);
	if (!input) return;

	function digits(str) { return str.replace(/\D/g, ''); }

	function format(raw) {
		let d = digits(raw);
		if (d.startsWith('8') || d.startsWith('7')) d = d.slice(1);
		d = d.slice(0, 10);
		let result = '+7';
		if (d.length > 0) result += ' (' + d.slice(0, 3);
		if (d.length >= 3) result += ') ' + d.slice(3, 6);
		if (d.length >= 6) result += '-' + d.slice(6, 8);
		if (d.length >= 8) result += '-' + d.slice(8, 10);
		return result;
	}

	function isValid(raw) {
		let d = digits(raw);
		if (d.startsWith('8') || d.startsWith('7')) d = d.slice(1);
		return d.length === 10;
	}

	function updateState() {
		const d = digits(input.value).replace(/^[78]/, '');
		if (d.length === 0) {
			input.classList.remove('input--valid', 'input--invalid');
			return;
		}
		if (isValid(input.value)) {
			input.classList.add('input--valid');
			input.classList.remove('input--invalid');
		} else {
			input.classList.add('input--invalid');
			input.classList.remove('input--valid');
		}
	}

	input.addEventListener('input', function () {
		const before = input.selectionStart;
		const oldLen = input.value.length;
		input.value = format(input.value);
		const pos = Math.max(0, before + (input.value.length - oldLen));
		input.setSelectionRange(pos, pos);
		updateState();
	});

	input.addEventListener('focus', function () {
		if (digits(input.value).length === 0) input.value = '+7 (';
	});

	input.addEventListener('blur', function () {
		if (digits(input.value).replace(/^7/, '').length === 0) {
			input.value = '';
			input.classList.remove('input--valid', 'input--invalid');
		}
	});
}

/* Инициализируем все поля телефона на странице */
initPhoneMask('cta-phone');
initPhoneMask('modal-phone');


/* ---- Валидация имени ---- */
(function () {
	const input = document.getElementById('modal-name');
	if (!input) return;
	/* Маска: режем всё кроме букв (рус/англ), пробелов и дефиса */
	input.addEventListener('input', function () {
		const clean = input.value.replace(/[^a-zA-Zа-яА-ЯёЁ\s\-]/g, '');
		if (input.value !== clean) input.value = clean;
		updateNameState();
	});

	input.addEventListener('blur', updateNameState);

	function updateNameState() {
		const val = input.value.trim();
		if (val.length === 0) {
			/* Пустое — убираем рамку */
			input.classList.remove('input--valid', 'input--invalid');
			return;
		}
		/* Минимум 2 символа, только допустимые символы */
		if (val.length >= 2) {
			input.classList.add('input--valid');
			input.classList.remove('input--invalid');
		} else {
			input.classList.add('input--invalid');
			input.classList.remove('input--valid');
		}
	}
})();