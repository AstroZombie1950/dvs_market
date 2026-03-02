<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Доставка — ДВС Маркет</title>
	<meta name="description" content="Доставка двигателей, АКПП и запчастей по всей России. Примерная стоимость доставки до вашего города." />
	<meta name="keywords" content="доставка двигателя, доставка ДВС, стоимость доставки двигателя, двигатель доставка по России" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Open Graph -->
	<meta property="og:title" content="Доставка — ДВС Маркет" />
	<meta property="og:description" content="Доставка двигателей и запчастей по всей России. Работаем с транспортными компаниями по всем городам." />
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
				<li><a href="/delivery" class="active">Доставка</a></li>
				<li><a href="/contacts">Контакты</a></li>
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
			<a href="/delivery" class="active">Доставка</a>
			<a href="/contacts">Контакты</a>
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
		<!-- ===================== HERO ===================== -->
		<section class="delivery-hero reveal reveal--fade">
			<div class="delivery-hero__bg"></div>
			<div class="delivery-hero__content">
				<h1 class="delivery-hero__title">Доставка</h1>
				<p class="delivery-hero__subtitle">Работаем по всем городам России</p>
			</div>
		</section>
		<!-- ===================== TABLE ===================== -->
		<section class="delivery-table">
			<div class="delivery-table__inner reveal reveal--fade">
				<h2 class="delivery-table__title">Примерная стоимость доставки двигателя</h2>
				<div class="delivery-table__wrap">
					<table class="dtable">
						<thead>
							<tr>
								<th>Город</th>
								<th>Пункт выдачи</th>
								<th>Стоимость</th>
							</tr>
						</thead>
						<tbody>
							<tr><td>Астрахань</td><td>ул. Боевая 136Б</td><td>4 800 р.</td></tr>
							<tr><td>Барнаул</td><td>ул. Чернышевского, 293А</td><td>5 800 р.</td></tr>
							<tr><td>Белгород</td><td>ул. Кирпичный тупик 2а</td><td>4 500 р.</td></tr>
							<tr><td>Волгоград</td><td>ул. Землячки 16</td><td>4 700 р.</td></tr>
							<tr><td>Воронеж</td><td>ул. Землячки 15</td><td>4 400 р.</td></tr>
							<tr><td>Екатеринбург</td><td>ул. Титова 19</td><td>5 100 р.</td></tr>
							<tr><td>Ижевск</td><td>ул. Пойма 22</td><td>4 700 р.</td></tr>
							<tr><td>Иркутск</td><td>ул. Новаторов 1</td><td>6 400 р.</td></tr>
							<tr><td>Казань</td><td>ул. Тихорацкая, д.19</td><td>4 600 р.</td></tr>
							<tr><td>Калининград</td><td>ул. Пригородная 20</td><td>5 000 р.</td></tr>
							<tr><td>Кемерово</td><td>Кузнецкий пр-т 91</td><td>5 900 р.</td></tr>
							<tr><td>Киров</td><td>ул. Производственная 22</td><td>4 600 р.</td></tr>
							<tr><td>Краснодар</td><td>ул. Бульварная 2/2</td><td>4 800 р.</td></tr>
							<tr><td>Красноярск</td><td>Северное шоссе 5г26</td><td>5 000 р.</td></tr>
							<tr><td>Курск</td><td>ул. Литовская 12А</td><td>4 450 р.</td></tr>
							<tr><td>Липецк</td><td>ул. Ангарская 30</td><td>4 400 р.</td></tr>
							<tr><td>Магнитогорск</td><td>ул. 1-ая Северо-западная, 8/2</td><td>5 100 р.</td></tr>
							<tr><td>Набережные Челны</td><td>Производственный проезд 19</td><td>4 700 р.</td></tr>
							<tr><td>Нижний Новгород</td><td>ул. Геологов 1П</td><td>4 400 р.</td></tr>
							<tr><td>Новокузнецк</td><td>ул. Куйбышева 17х28</td><td>5 900 р.</td></tr>
							<tr><td>Новосибирск</td><td>ул. Станционная 80/2</td><td>5 600 р.</td></tr>
							<tr><td>Омск</td><td>пр-т Космический 109к1</td><td>5 400 р.</td></tr>
							<tr><td>Оренбург</td><td>Площадь 1-го Мая 1а</td><td>4 800 р.</td></tr>
							<tr><td>Пенза</td><td>ул. Измайлова 13</td><td>4 500 р.</td></tr>
							<tr><td>Пермь</td><td>ул. Промышленная 123</td><td>4 800 р.</td></tr>
							<tr><td>Ростов-на-Дону</td><td>ул. Каширская 5</td><td>4 700 р.</td></tr>
							<tr><td>Рязань</td><td>195 км Окружной дороли</td><td>4 500 р.</td></tr>
							<tr><td>Самара</td><td>ул. Демократическая 45А</td><td>4 700 р.</td></tr>
							<tr><td>Санкт-Петербург</td><td>2-й Верхний переулок, 15А</td><td>4 400 р.</td></tr>
							<tr><td>Саратов</td><td>ул. Соколовая гора, д. 5</td><td>4 600 р.</td></tr>
							<tr><td>Севастополь</td><td>Фиолентовское шоссе, 1/5</td><td>5 000 р.</td></tr>
							<tr><td>Симферополь</td><td>ул. Глинки, д. 67Г</td><td>6 000 р.</td></tr>
							<tr><td>Смоленск</td><td>ул. Старо-Комендантская 2</td><td>4 400 р.</td></tr>
							<tr><td>Сочи</td><td>ул. Гастелло, 23а</td><td>5 200 р.</td></tr>
							<tr><td>Ставрополь</td><td>ул. 2-я Промышленная, 33</td><td>4 700 р.</td></tr>
							<tr><td>Сургут</td><td>ул. Аграрная, д. 3</td><td>5 900 р.</td></tr>
							<tr><td>Тверь</td><td>Московское шоссе, д. 18, стр. 1</td><td>4 400 р.</td></tr>
							<tr><td>Тольятти</td><td>ул. Базовая, 1 стр.20</td><td>4 600 р.</td></tr>
							<tr><td>Томск</td><td>ул. Пролетарская, 38В, стр.1</td><td>5 900 р.</td></tr>
							<tr><td>Тула</td><td>ул. Чмутова, д.198 В</td><td>4 300 р.</td></tr>
							<tr><td>Тюмень</td><td>ул. Одесская 1, стр. 8</td><td>5 200 р.</td></tr>
							<tr><td>Улан-Удэ</td><td>ул. Ботаническая, д. 38/2</td><td>6 500 р.</td></tr>
							<tr><td>Ульяновск</td><td>Московское шоссе, д. 9Ак2</td><td>4 600 р.</td></tr>
							<tr><td>Уфа</td><td>ул. Сельская Богородская, 57</td><td>4 800 р.</td></tr>
							<tr><td>Хабаровск</td><td>ул. Тихоокеанская, д. 73к3</td><td>7 700 р.</td></tr>
							<tr><td>Чебоксары</td><td>ул. Гаражный пр-д, 3/1</td><td>4 500 р.</td></tr>
							<tr><td>Челябинск</td><td>Северный луч, д. 1а</td><td>5 000 р.</td></tr>
							<tr><td>Ярославль</td><td>Октября пр-пт, 93А</td><td>4 300 р.</td></tr>
						</tbody>
					</table>
				</div>
			</div>
		</section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include '../include/footer.html'; ?>
	</main>
</body>
</html>