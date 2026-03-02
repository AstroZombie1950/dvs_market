<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Контакты — ДВС Маркет | Москва, ул. Бирюлевская 37 к.1</title>
	<meta name="description" content="Контакты ДВС Маркет: адрес, телефон, email. Москва, ул. Бирюлевская 37 корп.1. Работаем ежедневно. Задайте вопрос или оставьте заявку." />
	<meta name="keywords" content="ДВС Маркет контакты, адрес, телефон, двигатели Москва, купить двигатель Москва" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Open Graph -->
	<meta property="og:title" content="Контакты — ДВС Маркет" />
	<meta property="og:description" content="Адрес, телефон и форма обратной связи. Москва, ул. Бирюлевская 37 корп.1." />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="ru_RU" />
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet" />
	<!-- css -->
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
	<!-- ===================== HEADER top ===================== -->
	<?php include '../include/header.html'; ?>
	<!-- ===================== HEADER bottom ===================== -->
	<nav class="header__nav" aria-label="Основная навигация">
		<div class="header__nav-inner">
			<ul class="nav__links">
				<li><a href="/">Главная</a></li>
				<li><a href="/catalog">Каталог</a></li>
				<li><a href="/delivery">Доставка</a></li>
				<li><a href="/contacts" class="active">Контакты</a></li>
			</ul>
			<!-- Social Icons -->
			<div class="nav__socials">
				<a href="https://t.me/+79263124747" target="_blank" aria-label="Telegram">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.17 13.23l-2.965-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.983.329z"/>
					</svg>
				</a>
				<a href="https://wa.me/79263124747" target="_blank" aria-label="WhatsApp">
					<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
						<path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.52 14.15c-.23.65-1.35 1.24-1.85 1.32-.47.07-1.07.1-1.72-.11-.4-.13-.91-.3-1.56-.59-2.74-1.18-4.53-3.96-4.67-4.14-.14-.18-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.23-.25.5-.31.67-.31.17 0 .34.002.49.009.16.008.37-.062.58.44.23.53.77 1.87.84 2.01.07.14.12.3.02.48-.09.18-.14.29-.28.45-.14.16-.29.36-.42.48-.14.13-.28.28-.12.54.16.26.72 1.19 1.55 1.93 1.07.95 1.97 1.25 2.24 1.39.27.14.43.12.59-.07.16-.19.68-.8.86-1.07.18-.27.36-.23.61-.14.25.09 1.58.75 1.85.88.27.14.45.2.52.31.06.12.06.69-.17 1.34z"/>
					</svg>
				</a>
			</div>
			<!-- CTA -->
			<div class="nav__cta">
				<button class="btn-cta" onclick="openModal()">Оставить заявку</button>
			</div>
			<!-- Burger (mobile) -->
			<button class="burger" id="burger" aria-label="Открыть меню" onclick="toggleMenu()">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<!-- Mobile Drawer -->
		<div class="nav__drawer" id="navDrawer">
			<a href="/">Главная</a>
			<a href="/catalog">Каталог</a>
			<a href="/delivery">Доставка</a>
			<a href="/contacts" class="active">Контакты</a>
			<div class="nav__drawer-socials">
				<a href="https://t.me/+79263124747" target="_blank" aria-label="Telegram">
					<svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.17 13.23l-2.965-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.983.329z"/></svg>
				</a>
				<a href="https://wa.me/79263124747" target="_blank" aria-label="WhatsApp">
					<svg viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.52 14.15c-.23.65-1.35 1.24-1.85 1.32-.47.07-1.07.1-1.72-.11-.4-.13-.91-.3-1.56-.59-2.74-1.18-4.53-3.96-4.67-4.14-.14-.18-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.23-.25.5-.31.67-.31.17 0 .34.002.49.009.16.008.37-.062.58.44.23.53.77 1.87.84 2.01.07.14.12.3.02.48-.09.18-.14.29-.28.45-.14.16-.29.36-.42.48-.14.13-.28.28-.12.54.16.26.72 1.19 1.55 1.93 1.07.95 1.97 1.25 2.24 1.39.27.14.43.12.59-.07.16-.19.68-.8.86-1.07.18-.27.36-.23.61-.14.25.09 1.58.75 1.85.88.27.14.45.2.52.31.06.12.06.69-.17 1.34z"/></svg>
				</a>
			</div>
			<div class="nav__drawer-cta">
				<button class="btn-cta" onclick="openModal(); toggleMenu();">Оставить заявку</button>
			</div>
		</div>
	</nav>
	<main>
		<!-- ===================== CONTACTS main block ===================== -->
		<section class="contacts reveal reveal--fade">
			<div class="contacts__bg"></div>
			<div class="contacts__inner">

				<div class="contacts__header">
					<h1 class="contacts__title">Оставьте заявку</h1>
					<p class="contacts__subtitle">Наши менеджеры свяжутся с Вами и предложат лучшие варианты</p>
				</div>

				<div class="contacts__body">

					<!-- Левая колонка: инфо -->
					<div class="contacts__info">

						<div class="contacts__info-group">
							<h3>Адрес</h3>
							<p>Адрес склада: г. Москва,<br>ул. Бирюлевская 37 корп.1</p>
						</div>

						<div class="contacts__info-group">
							<h3>Контакты</h3>
							<div class="contact-row"><span>Телефон:</span> <a href="tel:+79263124747">+7 (926) 312-47-47</a></div>
							<div class="contact-row"><span>Доп.:</span> <a href="tel:+79258042599">+7 (925) 804-25-99</a></div>
							<div class="contact-row"><span>Email:</span> <a href="mailto:star-motor@mail.ru">star-motor@mail.ru</a></div>
							<div class="contact-row"><span>График:</span> <span>Пн–Пт с 10.00 до 19.00</span></div>
						</div>

						<div class="contacts__info-group">
							<h3>Мессенджеры</h3>
							<div class="contacts__socials">
								<a href="https://t.me/+79263124747" target="_blank" aria-label="Telegram">
									<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.17 13.23l-2.965-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.983.329z"/></svg>
								</a>
								<a href="https://wa.me/79263124747" target="_blank" aria-label="WhatsApp">
									<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.52 14.15c-.23.65-1.35 1.24-1.85 1.32-.47.07-1.07.1-1.72-.11-.4-.13-.91-.3-1.56-.59-2.74-1.18-4.53-3.96-4.67-4.14-.14-.18-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.23-.25.5-.31.67-.31.17 0 .34.002.49.009.16.008.37-.062.58.44.23.53.77 1.87.84 2.01.07.14.12.3.02.48-.09.18-.14.29-.28.45-.14.16-.29.36-.42.48-.14.13-.28.28-.12.54.16.26.72 1.19 1.55 1.93 1.07.95 1.97 1.25 2.24 1.39.27.14.43.12.59-.07.16-.19.68-.8.86-1.07.18-.27.36-.23.61-.14.25.09 1.58.75 1.85.88.27.14.45.2.52.31.06.12.06.69-.17 1.34z"/></svg>
								</a>
							</div>
						</div>

					</div>

					<!-- Правая колонка: форма -->
					<form class="contacts__form" id="contactsForm" onsubmit="handleContactsSubmit(event)">
						<div class="field--full">
							<input type="text" id="cf-name" name="name" placeholder="Имя" autocomplete="name" />
						</div>
						<input type="email" id="cf-email" name="email" placeholder="Email" autocomplete="email" />
						<input type="tel"   id="cf-phone" name="phone" placeholder="+7 (___) ___-__-__" autocomplete="tel" maxlength="18" />
						<div class="field--full">
							<textarea name="message" placeholder="Сообщение.."></textarea>
						</div>
						<button type="submit" class="btn-submit" id="cf-submit" disabled>
							Отправить
							<svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
						</button>
					</form>

				</div>
			</div>
		</section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include '../include/footer.html'; ?>
		<script src="/js/form_contact_page.js"></script>
	</main>
</body>
</html>