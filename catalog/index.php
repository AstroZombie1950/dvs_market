<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Каталог двигателей — ДВС Маркет</title>
	<meta name="description" content="Каталог ДВС Маркет: новые и контрактные двигатели, АКПП, турбины, запчасти. Широкий выбор, доставка по России и СНГ, гарантия." />
	<meta name="keywords" content="каталог двигателей, купить двигатель, контрактный ДВС, АКПП купить, турбина купить, запчасти двигатель" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<!-- Open Graph -->
	<meta property="og:title" content="Каталог — ДВС Маркет" />
	<meta property="og:description" content="Новые и контрактные двигатели, АКПП, турбины. Доставка по России и СНГ." />
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
				<li><a href="/catalog" class="active">Каталог</a></li>
				<li><a href="/delivery">Доставка</a></li>
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
			<a href="/catalog" class="active">Каталог</a>
			<a href="/delivery">Доставка</a>
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
		<!-- ===== CATALOG HERO ===== -->
		<section class="cat-hero">
			<div class="cat-hero__bg"></div>
			<div class="cat-hero__inner">
				<nav class="breadcrumbs" aria-label="Хлебные крошки">
					<a href="/">Главная</a>
					<span class="breadcrumbs__sep"></span>
					<span class="breadcrumbs__current">Новые моторы</span>
				</nav>
				<h1 class="cat-hero__title">Новые моторы</h1>
			</div>
		</section>
		<!-- ===== CATALOG MAIN ===== -->
		<section class="catalog">
			<div class="catalog__inner">
				<!-- сетка товаров -->
				<div class="catalog__content">
					<p class="catalog__count" id="catalogCount">Отображение 1–13 из 13</p>
					<a href="#" id="filterReset" class="btn-cta" style="display:none; margin-bottom:16px; font-size:12px; padding:6px 16px;">✕ Показать все</a>
					<div class="catalog__grid">
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4fa" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4fa/1.jpg" alt="Двигатель G4FA" />
								<span class="product-card__badge">Распродажа!</span>
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4fa" class="product-card__name">Двигатель G4FA</a>
								<div class="product-card__price">
									<span class="product-card__price-old">94 000 ₽</span>
									84 000 ₽
								</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4fc" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4fc/1.jpg" alt="Двигатель G4FC" />
								<span class="product-card__badge">Распродажа!</span>
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4fc" class="product-card__name">Двигатель G4FC</a>
								<div class="product-card__price">
									<span class="product-card__price-old">94 000 ₽</span>
									84 000 ₽
								</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4fg" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4fg/1.jpg" alt="Двигатель G4FG" />
								<span class="product-card__badge">Распродажа!</span>
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4fg" class="product-card__name">Двигатель G4FG</a>
								<div class="product-card__price">
									<span class="product-card__price-old">98 000 ₽</span>
									88 000 ₽
								</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4ke" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4ke/1.jpg" alt="Двигатель G4KE" />
								<span class="product-card__badge">Распродажа!</span>
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4ke" class="product-card__name">Двигатель G4KE</a>
								<div class="product-card__price">
									<span class="product-card__price-old">148 000 ₽</span>
									133 000 ₽
								</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4kd" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4kd/1.jpg" alt="Двигатель G4KD" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4kd" class="product-card__name">Двигатель G4KD</a>
								<div class="product-card__price">130 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4kj" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4kj/1.jpg" alt="Двигатель G4KJ" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4kj" class="product-card__name">Двигатель G4KJ</a>
								<div class="product-card__price">220 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4gc" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4gc/1.jpg" alt="Двигатель G4GC" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4gc" class="product-card__name">Двигатель G4GC</a>
								<div class="product-card__price">115 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="hyundai kia">
							<a href="dvigatel-g4js" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-g4js/1.jpg" alt="Двигатель G4JS" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-g4js" class="product-card__name">Двигатель G4JS</a>
								<div class="product-card__price">140 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="chevrolet">
							<a href="dvigatel-f16d4" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-f16d4/1.jpg" alt="Двигатель F16D4" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-f16d4" class="product-card__name">Двигатель F16D4</a>
								<div class="product-card__price">106 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="chevrolet daewoo">
							<a href="dvigatel-f16d3" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-f16d3/1.jpg" alt="Двигатель F16D3" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-f16d3" class="product-card__name">Двигатель F16D3</a>
								<div class="product-card__price">101 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="chevrolet">
							<a href="dvigatel-f14d4" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-f14d4/1.jpg" alt="Двигатель F14D4" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-f14d4" class="product-card__name">Двигатель F14D4</a>
								<div class="product-card__price">110 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="opel">
							<a href="dvigatel-z16xer" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-z16xer/1.jpg" alt="Двигатель Z16XER" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-z16xer" class="product-card__name">Двигатель Z16XER</a>
								<div class="product-card__price">112 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
						<div class="product-card" data-brand="opel">
							<a href="dvigatel-z18xer" class="product-card__img-wrap">
								<img src="/img/products/dvigatel-z18xer/1.jpg" alt="Двигатель Z18XER" />
							</a>
							<div class="product-card__body">
								<a href="dvigatel-z18xer" class="product-card__name">Двигатель Z18XER</a>
								<div class="product-card__price">110 000 ₽</div>
								<a href="#" class="product-card__btn" onclick="openModal()">Связаться</a>
							</div>
						</div>
					</div>
					<!-- пагинация -->
					<nav class="catalog__pagination" aria-label="Страницы каталога">
						<a href="#" class="pagination__btn pagination__btn--active" aria-current="page">1</a>
					</nav>
				</div>
				<!-- сайдбар -->
				<aside class="catalog__sidebar">
					<div class="sidebar__block">
						<h3 class="sidebar__title">Фильтр по маркам авто</h3>
						<ul class="sidebar__list" id="brandFilter">
							<li><a href="#" data-brand="audi">Audi <span></span></a></li>
							<li><a href="#" data-brand="chery">Chery <span></span></a></li>
							<li><a href="#" data-brand="chevrolet">Chevrolet <span></span></a></li>
							<li><a href="#" data-brand="daewoo">Daewoo <span></span></a></li>
							<li><a href="#" data-brand="ford">Ford <span></span></a></li>
							<li><a href="#" data-brand="haval">Haval <span></span></a></li>
							<li><a href="#" data-brand="hyundai">Hyundai <span></span></a></li>
							<li><a href="#" data-brand="kia">Kia <span></span></a></li>
							<li><a href="#" data-brand="mitsubishi">Mitsubishi <span></span></a></li>
							<li><a href="#" data-brand="nissan">Nissan <span></span></a></li>
							<li><a href="#" data-brand="opel">Opel <span></span></a></li>
							<li><a href="#" data-brand="pontiac">Pontiac <span></span></a></li>
							<li><a href="#" data-brand="proton">Proton <span></span></a></li>
							<li><a href="#" data-brand="ravon">Ravon <span></span></a></li>
							<li><a href="#" data-brand="renault">Renault <span></span></a></li>
							<li><a href="#" data-brand="seat">Seat <span></span></a></li>
							<li><a href="#" data-brand="skoda">Skoda <span></span></a></li>
							<li><a href="#" data-brand="suzuki">Suzuki <span></span></a></li>
							<li><a href="#" data-brand="tagaz">Tagaz <span></span></a></li>
							<li><a href="#" data-brand="toyota">Toyota <span></span></a></li>
							<li><a href="#" data-brand="volkswagen">Volkswagen <span></span></a></li>
							<li><a href="#" data-brand="vortex">Vortex <span></span></a></li>
						</ul>
					</div>
					<!-- хит продаж -->
					<div class="sidebar__block">
						<h3 class="sidebar__title">Хит продаж</h3>
						<div class="sidebar__hits">
							<div class="hit-card">
								<a href="dvigatel-g4fa" class="hit-card__img-wrap">
									<img src="/img/products/dvigatel-g4fa/1.jpg" alt="Двигатель G4FA" />
								</a>
								<div class="hit-card__body">
									<a href="dvigatel-g4fa" class="hit-card__name">Двигатель G4FA</a>
									<div class="hit-card__price-wrap">
										<span class="hit-card__price-old">94 000 ₽</span>
										<span class="hit-card__price">84 000 ₽</span>
										<a href="#" class="hit-card__btn" onclick="openModal()">Связаться</a>
									</div>
								</div>
							</div>
							<div class="hit-card">
								<a href="dvigatel-g4fc" class="hit-card__img-wrap">
									<img src="/img/products/dvigatel-g4fc/1.jpg" alt="Двигатель G4FC" />
								</a>
								<div class="hit-card__body">
									<a href="dvigatel-g4fc" class="hit-card__name">Двигатель G4FC</a>
									<div class="hit-card__price-wrap">
										<span class="hit-card__price-old">94 000 ₽</span>
										<span class="hit-card__price">84 000 ₽</span>
										<a href="#" class="hit-card__btn" onclick="openModal()">Связаться</a>
									</div>
								</div>
							</div>
							<div class="hit-card">
								<a href="dvigatel-g4fg" class="hit-card__img-wrap">
									<img src="/img/products/dvigatel-g4fg/1.jpg" alt="Двигатель G4FG" />
								</a>
								<div class="hit-card__body">
									<a href="dvigatel-g4fg" class="hit-card__name">Двигатель G4FG</a>
									<div class="hit-card__price-wrap">
										<span class="hit-card__price-old">98 000 ₽</span>
										<span class="hit-card__price">88 000 ₽</span>
										<a href="#" class="hit-card__btn" onclick="openModal()">Связаться</a>
									</div>
								</div>
							</div>
							<div class="hit-card">
								<a href="dvigatel-g4ke" class="hit-card__img-wrap">
									<img src="/img/products/dvigatel-g4ke/1.jpg" alt="Двигатель G4KE" />
								</a>
								<div class="hit-card__body">
									<a href="dvigatel-g4ke" class="hit-card__name">Двигатель G4KE</a>
									<div class="hit-card__price-wrap">
										<span class="hit-card__price-old">148 000 ₽</span>
										<span class="hit-card__price">133 000 ₽</span>
										<a href="#" class="hit-card__btn" onclick="openModal()">Связаться</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</section>
		<!-- ===== КАК КУПИТЬ ДВИГАТЕЛЬ ===== -->
		<section class="how-to-buy">
			<div class="how-to-buy__inner">

				<!-- левый блок -->
				<div class="how-to-buy__lead reveal reveal--fade">
					<h2 class="how-to-buy__title">Как купить двигатель</h2>
					<p class="how-to-buy__text">Всего 4 шага для покупки нового мотора в нашей организации! <strong>Покупайте с уверенностью</strong> — документы в порядке!</p>
				</div>

				<!-- правая сетка шагов -->
				<div class="how-to-buy__steps">

					<div class="htb-step reveal reveal--up">
						<div class="htb-step__top"></div>
						<span class="htb-step__num">01</span>
						<h3 class="htb-step__title">Звонок</h3>
						<p class="htb-step__text"><strong>Закажите обратный звонок</strong> через форму на сайте или позвоните нам напрямую — мы всегда готовы ответить на ваши вопросы. График работы смотрите в шапке сайта.</p>
					</div>

					<div class="htb-step reveal reveal--up">
						<div class="htb-step__top"></div>
						<span class="htb-step__num">02</span>
						<h3 class="htb-step__title">Консультация</h3>
						<p class="htb-step__text"><strong>Наши специалисты</strong> с опытом работы помогут подобрать идеальную запчасть для вашего автомобиля — новую или б/у, и предоставят полную консультацию по её установке и эксплуатации.</p>
					</div>

					<div class="htb-step reveal reveal--up">
						<div class="htb-step__top"></div>
						<span class="htb-step__num">03</span>
						<h3 class="htb-step__title">Доставка</h3>
						<p class="htb-step__text"><strong>Гарантируем комфортную доставку:</strong> подберём оптимальный способ — любая транспортная компания или самовывоз. Перед отправкой проводим тщательную проверку запчасти и отправляем видеофиксацию заказчику.</p>
					</div>

					<div class="htb-step reveal reveal--up">
						<div class="htb-step__top"></div>
						<span class="htb-step__num">04</span>
						<h3 class="htb-step__title">Получение</h3>
						<p class="htb-step__text"><strong>Все запчасти</strong> поставляются с полным пакетом документов. Для двигателей предоставляем расширенный комплект документации для оформления в ГИБДД — никаких проблем с регистрацией!</p>
					</div>

				</div>
			</div>
		</section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include '../include/footer.html'; ?>
		<script src="/js/catalog_filter.js"></script>
		<!-- Стаггер для шагов КАК КУПИТЬ ДВИГАТЕЛЬ -->
		<script>
			(function () {
				const steps = document.querySelectorAll('.htb-step');
				if (!steps.length) return;

				const observer = new IntersectionObserver(
					(entries) => {
						entries.forEach((entry) => {
							if (entry.isIntersecting) {
								const idx = Array.from(steps).indexOf(entry.target);
								setTimeout(() => {
									entry.target.classList.add('visible');
								}, idx * 150);
								observer.unobserve(entry.target);
							}
						});
					},
					{ threshold: 0.15 }
				);

				steps.forEach((el) => observer.observe(el));
			})();
		</script>
	</main>
</body>
</html>