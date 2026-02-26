	/* ===== маска телефона +7 (___) ___-__-__ ===== */
	const phoneInput = document.getElementById('cf-phone');
	phoneInput.addEventListener('input', function (e) {
		let digits = this.value.replace(/\D/g, '');
		/* если начинается с 8 — заменяем на 7 */
		if (digits.startsWith('8')) digits = '7' + digits.slice(1);
		if (!digits.startsWith('7')) digits = '7' + digits;
		digits = digits.slice(0, 11);

		let result = '+7';
		if (digits.length > 1) result += ' (' + digits.slice(1, 4);
		if (digits.length >= 4) result += ') ' + digits.slice(4, 7);
		if (digits.length >= 7) result += '-' + digits.slice(7, 9);
		if (digits.length >= 9) result += '-' + digits.slice(9, 11);

		this.value = result;
		validate();
	});

	/* ===== валидация полей ===== */
	const nameInput  = document.getElementById('cf-name');
	const emailInput = document.getElementById('cf-email');
	const submitBtn  = document.getElementById('cf-submit');

	function isNameValid()  { return nameInput.value.trim().length >= 2; }
	function isPhoneValid() { return phoneInput.value.replace(/\D/g, '').length === 11; }
	function isEmailValid() { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim()); }

	function setFieldState(input, valid) {
		input.classList.toggle('input--valid',   valid);
		input.classList.toggle('input--invalid', !valid);
	}

	function validate() {
		/* имя: подсвечиваем только если что-то введено */
		if (nameInput.value.trim().length > 0) setFieldState(nameInput, isNameValid());
		else { nameInput.classList.remove('input--valid', 'input--invalid'); }

		/* телефон */
		const phoneDigits = phoneInput.value.replace(/\D/g, '').length;
		if (phoneDigits > 1) setFieldState(phoneInput, isPhoneValid());
		else { phoneInput.classList.remove('input--valid', 'input--invalid'); }

		/* email */
		if (emailInput.value.trim().length > 0) setFieldState(emailInput, isEmailValid());
		else { emailInput.classList.remove('input--valid', 'input--invalid'); }

		/* кнопка активна если имя + телефон + email валидны */
		submitBtn.disabled = !(isNameValid() && (isPhoneValid() && isEmailValid()));
	}

	nameInput.addEventListener('input', validate);
	emailInput.addEventListener('input', validate);

/* ===== отправка формы ===== */
function handleContactsSubmit(e) {
	e.preventDefault();
	const form = e.target;
	const data = new FormData(form);

	/* блокируем форму на время запроса */
	submitBtn.disabled = true;

	fetch('/php/form_contacts.php', { method: 'POST', body: data })
		.then(r => r.ok ? showSuccess(form) : Promise.reject())
		.catch(() => showError(form))
		.finally(() => { submitBtn.disabled = false; });
}

/* ===== показываем успех ===== */
function showSuccess(form) {
	/* блюрим содержимое формы */
	form.classList.add('form--blurred');

	/* создаём оверлей с сообщением */
	const overlay = document.createElement('div');
	overlay.className = 'form-overlay';
	overlay.innerHTML = '<p class="form-success">Заявка отправлена!<br>Мы свяжемся с Вами.</p>';
	form.appendChild(overlay);

	setTimeout(() => {
		/* убираем оверлей и блюр */
		overlay.remove();
		form.classList.remove('form--blurred');

		/* сбрасываем поля и состояние валидации */
		form.reset();
		[nameInput, emailInput, phoneInput].forEach(el => {
			el.classList.remove('input--valid', 'input--invalid');
		});
		submitBtn.disabled = true;
	}, 5000);
}

/* ===== показываем ошибку ===== */
function showError(form) {
	/* не дублируем если уже есть */
	if (form.querySelector('.form-error')) return;

	const err = document.createElement('p');
	err.className = 'form-error';
	err.textContent = 'Ошибка отправки.';
	form.appendChild(err);

	setTimeout(() => err.remove(), 5000);
}