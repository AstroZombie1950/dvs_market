/* ---- Универсальный обработчик форм ---- */
/* Используется как handleCtaSubmit так и handleFormSubmit */
function handleFormSubmit(event, url) {
	event.preventDefault();

	const form = event.target;
	const btn  = form.querySelector('button[type="submit"]');

	/* Собираем все поля формы в URLSearchParams */
	const data = new URLSearchParams(new FormData(form));

	/* Блокируем кнопку на время запроса */
	btn.disabled = true;
	const originalText = btn.textContent.trim();
	btn.textContent = 'Отправляем...';

	fetch(url, {
		method: 'POST',
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
		body: data.toString(),
	})
		.then((res) => res.json())
		.then((response) => {
			if (response.success) {
				/* Успех — прячем форму, показываем сообщение */
				form.style.display = 'none';
				const ok = document.createElement('p');
				ok.className = 'form-success';
				ok.textContent = response.message;
				form.insertAdjacentElement('afterend', ok);
				/* Через 5 сек убираем сообщение и возвращаем форму */
				autoHide(ok, 5000, () => {
					form.style.display = '';
					restoreBtn(btn, originalText);
				});
			} else {
				/* Ошибка с сервера */
				showFormError(form, response.message);
				restoreBtn(btn, originalText);
			}
		})
		.catch(() => {
			/* Сетевая ошибка */
			showFormError(form, 'Ошибка соединения. Попробуйте позже.');
			restoreBtn(btn, originalText);
		});
}

/* Алиас — чтобы не менять onsubmit в CTA-блоке */
const handleCtaSubmit = handleFormSubmit;

/* Показывает текст ошибки под формой, прячет через 5 сек */
function showFormError(form, message) {
	let err = form.parentNode.querySelector('.form-error');
	if (!err) {
		err = document.createElement('p');
		err.className = 'form-error';
		form.insertAdjacentElement('afterend', err);
	}
	err.textContent = message;
	autoHide(err, 5000);
}

/* Плавно скрывает элемент через delay мс, затем вызывает callback */
function autoHide(el, delay, callback) {
	setTimeout(() => {
		el.style.transition = 'opacity 0.4s ease';
		el.style.opacity = '0';
		el.addEventListener('transitionend', () => {
			el.remove();
			if (callback) callback();
		}, { once: true });
	}, delay);
}

/* Разблокирует кнопку и возвращает текст */
function restoreBtn(btn, text) {
	btn.disabled = false;
	btn.textContent = text;
}