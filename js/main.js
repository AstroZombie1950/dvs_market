/* --- Scroll: hide topbar --- */
(function () {
	var topbar = document.querySelector('.header__topbar');
	var lastScroll = 0;
	var ticking = false;

	window.addEventListener('scroll', function () {
		if (!ticking) {
			requestAnimationFrame(function () {
				var current = window.scrollY;
				if (current > 80 && current > lastScroll) {
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
initPhoneMask('ctam-phone');


/* ---- Валидация имени Modal---- */
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

/* --- Валидация текстовых полей cta-main --- */
(function () {
	const nameInput  = document.getElementById('ctam-name');
	const phoneInput = document.getElementById('ctam-phone');
	const cityInput  = document.getElementById('ctam-city');
	const submitBtn  = document.querySelector('#ctam-name')?.closest('form')?.querySelector('button[type="submit"]');
	if (!nameInput || !cityInput || !submitBtn) return;

	function initTextField(input, minLen) {
		input.addEventListener('input', function () {
			const clean = input.value.replace(/[^a-zA-Zа-яА-ЯёЁ\s]/g, '');
			if (input.value !== clean) input.value = clean;
			updateState(input, minLen);
			updateBtn();
		});
		input.addEventListener('blur', function () {
			updateState(input, minLen);
		});
	}

	function updateState(input, minLen) {
		const val = input.value.trim();
		if (val.length === 0) {
			input.classList.remove('input--valid', 'input--invalid');
			return;
		}
		if (val.length >= minLen) {
			input.classList.add('input--valid');
			input.classList.remove('input--invalid');
		} else {
			input.classList.add('input--invalid');
			input.classList.remove('input--valid');
		}
	}

	function isPhoneValid() {
		return phoneInput.value.replace(/\D/g, '').replace(/^7/, '').length === 10;
	}

	function updateBtn() {
		const ok = nameInput.value.trim().length >= 2
			&& isPhoneValid()
			&& cityInput.value.trim().length >= 2;
		submitBtn.disabled = !ok;
	}

	/* телефон тоже триггерит кнопку */
	phoneInput.addEventListener('input', updateBtn);

	initTextField(nameInput, 2);
	initTextField(cityInput, 2);

	/* начальное состояние */
	submitBtn.disabled = true;
})();

/* --- Hero slideshow --- */
(function () {
	const slides = document.querySelectorAll('.hero__slide');
	if (!slides.length) return;

	let current = 0;

	setInterval(function () {
		slides[current].classList.remove('active');
		current = (current + 1) % slides.length;
		slides[current].classList.add('active');
	}, 5000);
})();

/* --- Счётчики "ДВС доставлено для клиентов" --- */
(function () {
	const nums = document.querySelectorAll('.engine-replace__num');
	if (!nums.length) return;

	function animateCounter(el) {
		const target = parseInt(el.dataset.target);
		const suffix = el.dataset.suffix || '';
		const duration = 1800;
		const step = 16;
		const steps = duration / step;
		const increment = target / steps;
		let current = 0;

		const timer = setInterval(function () {
			current += increment;
			if (current >= target) {
				current = target;
				clearInterval(timer);
			}
			el.textContent = Math.floor(current) + suffix;
		}, step);
	}

	const observer = new IntersectionObserver(function (entries) {
		entries.forEach(function (entry) {
			if (entry.isIntersecting) {
				animateCounter(entry.target);
				observer.unobserve(entry.target);
			}
		});
	}, { threshold: 0.5 });

	nums.forEach(function (el) { observer.observe(el); });
})();

/* --- Products slider --- */
(function () {
	const slides = document.querySelectorAll('.products-slider__slide');
	const dots   = document.querySelectorAll('.ps-dot');
	if (!slides.length) return;

	function goTo(index) {
		slides.forEach(function (s) { s.classList.remove('active'); });
		dots.forEach(function (d)   { d.classList.remove('active'); });
		slides[index].classList.add('active');
		dots[index].classList.add('active');
	}

	dots.forEach(function (dot) {
		dot.addEventListener('click', function () {
			goTo(parseInt(this.dataset.index));
		});
	});
})();

/* --- Dropdown (desktop) --- */
(function () {
	var dropdowns = document.querySelectorAll('.nav__dropdown');

	dropdowns.forEach(function (dropdown) {
		var trigger = dropdown.querySelector('.nav__dropdown-trigger');

		trigger.addEventListener('click', function (e) {
			e.stopPropagation();
			var isOpen = dropdown.classList.contains('open');

			/* Закрываем все остальные */
			dropdowns.forEach(function (d) {
				d.classList.remove('open');
				d.querySelector('.nav__dropdown-trigger').setAttribute('aria-expanded', 'false');
			});

			/* Togglem текущий */
			if (!isOpen) {
				dropdown.classList.add('open');
				trigger.setAttribute('aria-expanded', 'true');
			}
		});
	});

	/* Клик вне — закрываем всё */
	document.addEventListener('click', function () {
		dropdowns.forEach(function (d) {
			d.classList.remove('open');
			d.querySelector('.nav__dropdown-trigger').setAttribute('aria-expanded', 'false');
		});
	});
})();

/* --- Accordion (drawer) --- */
(function () {
	var accordions = document.querySelectorAll('.nav__drawer-accordion');

	accordions.forEach(function (accordion) {
		var trigger = accordion.querySelector('.nav__drawer-accordion-trigger');
		var list = accordion.querySelector('.nav__drawer-accordion-list');

		trigger.addEventListener('click', function () {
			var isOpen = accordion.classList.contains('open');

			/* Закрываем остальные */
			accordions.forEach(function (a) {
				a.classList.remove('open');
				a.querySelector('.nav__drawer-accordion-trigger').setAttribute('aria-expanded', 'false');
				a.querySelector('.nav__drawer-accordion-list').style.maxHeight = null;
			});

			/* Togglem текущий */
			if (!isOpen) {
				accordion.classList.add('open');
				trigger.setAttribute('aria-expanded', 'true');
				list.style.maxHeight = list.scrollHeight + 'px';
			}
		});
	});
})();

/* --- Active nav link --- */
(function () {
	/* Убираем trailing slash, кроме корня */
	function normPath(p) {
		return p === '/' ? '/' : p.replace(/\/$/, '');
	}

	var current = normPath(window.location.pathname);

	/* Все ссылки в десктопном меню, выпадашках и drawer */
	var links = document.querySelectorAll('.nav__links a, .nav__dropdown-list a, .nav__drawer a:not(.nav__drawer-socials a)');

	links.forEach(function (link) {
		var href = normPath(new URL(link.href).pathname);

		if (href === current) {
			link.classList.add('active');

			/* Если в выпадашке — активируем и триггер */
			var dropdown = link.closest('.nav__dropdown');
			if (dropdown) {
				dropdown.querySelector('.nav__dropdown-trigger').classList.add('active');
			}

			/* Если в аккордеоне drawer — активируем и триггер */
			var accordion = link.closest('.nav__drawer-accordion');
			if (accordion) {
				accordion.querySelector('.nav__drawer-accordion-trigger').classList.add('active');
			}
		}
	});
})();