<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>ДВС Маркет — Двигатели, АКПП, Турбины</title>
	<meta name="description" content="ДВС Маркет — продажа новых и контрактных двигателей, АКПП, турбин и запчастей. Доставка по всей России и СНГ. Гарантия. Москва, ул. Бирюлевская 37 корп.1." />
	<meta name="keywords" content="двигатель купить, ДВС, контрактный двигатель, АКПП, турбина, запчасти, двигатель Москва" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<!-- favicon -->
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="manifest" href="/site.webmanifest">
	<!-- Open Graph -->
	<meta property="og:title" content="ДВС Маркет — Двигатели и запчасти" />
	<meta property="og:description" content="Продажа новых и контрактных двигателей, АКПП, турбин. Доставка по России и СНГ." />
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
	<!-- ===================== HEADER ===================== -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/include/header.html'); ?>
	<main>
		<!-- ===================== HERO ===================== -->
		<section class="hero">
			<div class="hero__slides">
				<div class="hero__slide active" style="background-image: url('/img/main/hero/1.png')"></div>
				<div class="hero__slide" style="background-image: url('/img/main/hero/2.png')"></div>
				<div class="hero__slide" style="background-image: url('/img/main/hero/3.png')"></div>
				<div class="hero__slide" style="background-image: url('/img/main/hero/4.png')"></div>
			</div>
			<div class="hero__overlay"></div>
			<div class="hero__inner">
				<div class="hero__content">
					<div class="hero__label">
						<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5zm-2-2c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1zm-10 0c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1z"/></svg>
						Доставка по всей России
					</div>
					<h1 class="hero__title">Продажа новых автомобильных двигателей</h1>
					<p class="hero__text">Мы поставляем оригинальные и аналоговые двигатели под заказ с гарантией. Это новые моторы, прошедшие заводские испытания и контроль качества. Двигатели в упаковке, без следов эксплуатации.</p>
					<button class="hero__btn" onclick="openModal()">
						Оставить заявку
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</button>
				</div>
			</div>
		</section>
		<!-- ===================== CTA MAIN ===================== -->
		<section class="cta-main">
			<div class="cta-main__inner reveal reveal--fade">
				<div class="cta-main__image">
					<img src="/img/main/mainpage_cta.png" alt="Двигатель" />
				</div>
				<div class="cta-main__body">
					<h2 class="cta-main__title">Оставьте заявку, мы подберем ДВС под Ваш автомобиль</h2>
					<form class="cta-main__form" onsubmit="handleFormSubmit(event, '/php/form_cta_main.php')">
						<div class="cta-main__row">
							<input type="text" name="name" id="ctam-name" placeholder="ФИО" required autocomplete="name" />
							<input type="tel" name="phone" id="ctam-phone" placeholder="+7 (___) ___-__-__" required autocomplete="tel" maxlength="18" />
						</div>
						<input type="text" name="city" id="ctam-city" placeholder="Город" autocomplete="address-level2" />
						<button type="submit">
							Отправить
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
						</button>
					</form>
				</div>
			</div>
		</section>
		<!-- ===================== ABOUT ===================== -->
		<section class="about">
			<div class="about__inner">
				<!-- левая колонка -->
				<div class="about__left reveal reveal--left">
					<div class="about__label">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
						О компании
					</div>
					<h2 class="about__title">Магазин двигателей<br>ДВС Маркет</h2>
					<p class="about__text">Данный сайт предназначен для тех, кто ищет новые двигатели для своих автомобилей — оставьте заявку, наши менеджеры подберут для Вас лучшее предложение!</p>
					<div class="about__founder">
						<img src="/img/main/ceo.png" alt="Руководитель ДВС Маркет" />
						<div class="about__founder-info">
							<span class="about__founder-name">Дмитрий Смирнов</span>
							<span class="about__founder-role">Основатель / руководитель</span>
						</div>
					</div>
				</div>
				<!-- центральное изображение -->
				<div class="about__image reveal reveal--fade">
					<img src="/img/main/mainpage_engine_frontal.png" alt="Двигатель ДВС Маркет" />
				</div>
				<!-- правая колонка -->
				<div class="about__right reveal reveal--right">
					<div class="about__feature">
						<div class="about__feature-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
						</div>
						<div class="about__feature-body">
							<h3>Большой опыт</h3>
							<p>Наша компания на рынке с 2020 г. Работаем по договору с гарантией на ДВС.</p>
						</div>
					</div>
					<div class="about__feature">
						<div class="about__feature-icon">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 4h6a4 4 0 0 1 0 8H7V4z"/><path d="M7 12h8"/><path d="M7 16h8"/><line x1="7" y1="4" x2="7" y2="20"/></svg>
						</div>
						<div class="about__feature-body">
							<h3>Конкурентные цены на ДВС</h3>
							<p>Мы следим за рынком и стремимся поддерживать доступную цену для покупателей.</p>
						</div>
					</div>
					<div class="about__feature">
						<div class="about__feature-icon">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
						</div>
						<div class="about__feature-body">
							<h3>Доставка по всей России</h3>
							<p>Наш офис находится в Москве, а склады разбросаны по всей стране.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== BRANDS ===================== -->
		<section class="brands">
			<div class="brands__bg"></div>
			<div class="brands__overlay"></div>
			<div class="brands__inner">
				<div class="brands__track-wrap">
					<div class="brands__track">
						<img src="/img/main/brands/china.png"      alt="China" />
						<img src="/img/main/brands/chery.png"      alt="Chery" />
						<img src="/img/main/brands/geely.png"      alt="Geely" />
						<img src="/img/main/brands/great-wall.png" alt="Great Wall" />
						<img src="/img/main/brands/hyundai.png"    alt="Hyundai" />
						<img src="/img/main/brands/kia.png"        alt="Kia" />
						<img src="/img/main/brands/wv.png"         alt="Volkswagen" />
						<!-- дубли для бесшовного лупа -->
						<img src="/img/main/brands/china.png"      alt="China" aria-hidden="true" />
						<img src="/img/main/brands/chery.png"      alt="Chery" aria-hidden="true" />
						<img src="/img/main/brands/geely.png"      alt="Geely" aria-hidden="true" />
						<img src="/img/main/brands/great-wall.png" alt="Great Wall" aria-hidden="true" />
						<img src="/img/main/brands/hyundai.png"    alt="Hyundai" aria-hidden="true" />
						<img src="/img/main/brands/kia.png"        alt="Kia" aria-hidden="true" />
						<img src="/img/main/brands/wv.png"         alt="Volkswagen" aria-hidden="true" />
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== DELIVERY PROMO ===================== -->
		<section class="delivery-promo">
			<div class="delivery-promo__inner">
				<div class="delivery-promo__image reveal reveal--left">
					<img src="/img/main/engine_disassembled.png" alt="Двигатель" />
				</div>
				<div class="delivery-promo__content reveal reveal--right">
					<div class="delivery-promo__label">
						<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.85 7h10.29l1.08 3.11H5.77L6.85 7zM19 17H5v-5h14v5zm-2-2c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1zm-10 0c.55 0 1-.45 1-1s-.45-1-1-1-1 .45-1 1 .45 1 1 1z"/></svg>
						Доставка
					</div>
					<h2 class="delivery-promo__title">Доставка ДВС по всем городам России!</h2>
					<p class="delivery-promo__text">У нас есть доставка по всем городам России, а также возможен самовывоз. По всем вопросам обращайтесь по телефону, наши менеджеры проконсультируют Вас и подберут оптимальное решение.</p>
					<p class="delivery-promo__text">Подробнее о ценах и городах доставки вы можете посмотреть в отдельной вкладке.</p>
					<a href="/delivery" class="delivery-promo__btn">
						Подробнее
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</a>
				</div>
			</div>
		</section>
		<!-- ===================== MECHANIC PROMO ===================== -->
		<section class="mechanic-promo">
			<div class="mechanic-promo__bg"></div>
			<div class="mechanic-promo__overlay"></div>
			<div class="mechanic-promo__inner">
				<div class="mechanic-promo__content reveal reveal--left">
					<h2 class="mechanic-promo__title">Не тратьте время на поиск двигателя!</h2>
					<p class="mechanic-promo__text">Заполните форму и Вам ответят в течение 15 минут, проконсультируют и подберут лучшее решение именно для Вас!</p>
					<button class="mechanic-promo__btn" onclick="openModal()">
						Оставить заявку
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
					</button>
				</div>
				<div class="mechanic-promo__image reveal reveal--right">
					<img src="/img/main/mechanic.png" alt="Менеджер ДВС Маркет" />
				</div>
			</div>
		</section>
		<!-- ===================== ENGINE REPLACE ===================== -->
		<section class="engine-replace">
			<div class="engine-replace__inner">
				<div class="engine-replace__image reveal reveal--fade">
					<img src="/img/main/engine_replace.jpg" alt="Установка двигателя" />
				</div>
				<div class="engine-replace__content reveal reveal--right">
					<h2 class="engine-replace__title">Можем установить Вам двигатель в партнерском автосервисе</h2>
					<p class="engine-replace__text">Замените агрегат целиком, вместо длительного ремонта. Мы предлагаем для Вас широкий ассортимент новых двигателей с заводской гарантией, номерные с пакетом документов.</p>
					<div class="engine-replace__divider"></div>
					<div class="engine-replace__stats">
						<div class="engine-replace__stat">
							<span class="engine-replace__num" data-target="7" data-suffix="">0</span>
							<span class="engine-replace__label">Лет на рынке</span>
						</div>
						<div class="engine-replace__stat">
							<span class="engine-replace__num" data-target="3000" data-suffix="+">0</span>
							<span class="engine-replace__label">ДВС доставлено для клиентов</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== CATEGORIES ===================== -->
		<section class="categories">
			<div class="categories__inner">
				<div class="categories__header reveal reveal--fade">
					<span class="categories__label">ДВС Маркет</span>
					<h2 class="categories__title">На Ваш выбор, есть новые ДВС — в наличии и под заказ</h2>
					<p class="categories__subtitle">В наличии на складе в Москве и под заказ. Каждый двигатель с гарантией и возможностью установки.</p>
				</div>
				<div class="categories__grid" style="display:flex; justify-content:center;">
					<div class="cat-card cat-card--light reveal reveal--up">
						<div class="cat-card__image">
							<img src="/img/main/engine_new.png" alt="Новые ДВС" />
						</div>
						<div class="cat-card__body">
							<h3 class="cat-card__title">Новые ДВС</h3>
							<ul class="cat-card__list">
								<li>Оплата всеми удобными для Вас способами</li>
								<li>Гарантия на все двигатели от 180 дней</li>
								<li>Можем установить Вам двигатель в партнерском автосервисе</li>
							</ul>
							<a href="/catalog" class="cat-card__btn cat-card__btn--orange">Перейти к новым ДВС</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PRODUCTS SLIDER ===================== -->
		<section class="products-slider reveal reveal--fade">
			<div class="products-slider__inner">
				<div class="products-slider__header">
					<span class="products-slider__label">Цены</span>
					<h2 class="products-slider__title">Новые двигатели под любой автомобиль</h2>
					<p class="products-slider__subtitle">Больше ассортимента двигателей во вкладке «Каталог»</p>
				</div>
				<!-- слайды -->
				<div class="products-slider__viewport">
					<!-- слайд 1 -->
					<div class="products-slider__slide active">
						<div class="products-slider__grid">
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4fa/1.jpg" alt="Двигатель G4FA" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4FA</h3>
									<span class="ps-card__price">84 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4fc/1.jpg" alt="Двигатель G4FC" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4FC</h3>
									<span class="ps-card__price">84 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4fg/1.jpg" alt="Двигатель G4FG" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4FG</h3>
									<span class="ps-card__price">88 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- слайд 2 -->
					<div class="products-slider__slide">
						<div class="products-slider__grid">
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4ke/1.jpg" alt="Двигатель G4KE" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4KE</h3>
									<span class="ps-card__price">133 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4kd/1.jpg" alt="Двигатель G4KD" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4KD</h3>
									<span class="ps-card__price">130 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4kj/1.jpg" alt="Двигатель G4KJ" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4KJ</h3>
									<span class="ps-card__price">220 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
						</div>
					</div>
					<!-- слайд 3 -->
					<div class="products-slider__slide">
						<div class="products-slider__grid">
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4gc/1.jpg" alt="Двигатель G4GC" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4GC</h3>
									<span class="ps-card__price">115 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-g4js/1.jpg" alt="Двигатель G4JS" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель G4JS</h3>
									<span class="ps-card__price">140 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
							<div class="ps-card">
								<div class="ps-card__img"><img src="/img/products/dvigatel-f16d4/1.jpg" alt="Двигатель F16D4" /></div>
								<div class="ps-card__body">
									<h3 class="ps-card__name">Двигатель F16D4</h3>
									<span class="ps-card__price">106 000 ₽</span>
									<button class="ps-card__btn" onclick="openModal()">
										<svg viewBox="0 0 24 24" fill="currentColor"><path d="M7 18c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-14.5-16h-.5a1 1 0 000 2h.18l2.73 8.18A2 2 0 007 14h10a2 2 0 001.94-1.5L21 6H5.21L4.5 2zm2.5 10l-1.33-4H19l-1.67 4H7z"/></svg>
										Связаться
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- точки -->
				<div class="products-slider__dots">
					<button class="ps-dot active" data-index="0"></button>
					<button class="ps-dot" data-index="1"></button>
					<button class="ps-dot" data-index="2"></button>
				</div>
				<!-- кнопка в каталог -->
				<div class="products-slider__footer">
					<a href="/catalog" class="products-slider__catalog-btn">Перейти в каталог</a>
				</div>
			</div>
		</section>
		<!-- ===================== HOW TO ORDER ===================== -->
		<section class="how-to-order">
			<div class="how-to-order__inner">
				<!-- левое изображение -->
				<div class="how-to-order__image reveal reveal--fade">
					<img src="/img/main/how_to_img.png" alt="Как заказать двигатель" />
					<div class="how-to-order__badge">
						<p>Мы даем лучшие цены и условия!</p>
						<a href="/catalog">
							Открыть каталог
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
						</a>
					</div>
				</div>
				<!-- правый контент -->
				<div class="how-to-order__content reveal reveal--right">
					<div class="how-to-order__label">
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
						Все консультации бесплатны
					</div>
					<h2 class="how-to-order__title">Как заказать?</h2>
					<p class="how-to-order__text">Если Вы не нашли свой двигатель, узнайте наличие у наших менеджеров.</p>
					<div class="how-to-order__steps">
						<div class="hto-step">
							<div class="hto-step__num">01</div>
							<div class="hto-step__body">
								<h3>Вы оставляете заявку на нашем на сайте</h3>
								<p>Напишите в мессенджерах или позвоните нам. Наши менеджеры свяжутся с Вами в течении 30 минут.</p>
							</div>
						</div>
						<div class="hto-step">
							<div class="hto-step__num">02</div>
							<div class="hto-step__body">
								<h3>Мы связываемся с Вами для уточнения деталей</h3>
								<p>Подбираем для Вас необходимый ДВС, рассчитываем доставку до Вашего региона. Возможен самовывоз.</p>
							</div>
						</div>
						<div class="hto-step">
							<div class="hto-step__num">03</div>
							<div class="hto-step__body">
								<h3>Составление договора и оплата</h3>
								<p>Оплата всеми удобными для Вас способами. Можем установить двигатель в партнерском автосервисе.</p>
							</div>
						</div>
					</div>
					<button class="how-to-order__btn" onclick="openModal()">Оставить заявку</button>
				</div>
			</div>
		</section>
		<!-- ===================== REVIEWS ===================== -->
		<section class="reviews">
			<div class="reviews__inner">
				<!-- шапка -->
				<div class="reviews__header reveal reveal--fade">
					<div class="reviews__header-left">
						<div class="reviews__label">
							<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg>
							Отзывы наших клиентов
						</div>
						<h2 class="reviews__title">Присоединяйтесь!</h2>
					</div>
					<div class="reviews__header-right">
						<p>Мы работаем на рынке уже более 9 лет и на протяжении всего времени нашего существования являемся ведущей компанией. Наши сотрудники — профессионалы с многолетним опытом. За всё время мы поставили в РФ более 1 000 двигателей.</p>
					</div>
				</div>
				<!-- карточки -->
				<div class="reviews__grid">
					<div class="review-card reveal reveal--up">
						<p class="review-card__text">Заказывал двигатель на Kia Rio. Получил подробную консультацию, менеджер всегда был на связи, общение очень вежливое. Сергей всё подробно объяснил, прислал фотографии двигателя — чувствуется честный и прозрачный подход. Мотор уже прошёл более 6 000 км, никаких дефектов не обнаружено. Рекомендую!</p>
						<div class="review-card__author">
							<img src="/img/main/reviews/1.png" alt="Евгений Н." />
							<span>Евгений Н.</span>
						</div>
					</div>
					<div class="review-card reveal reveal--up">
						<p class="review-card__text">Добрый день! Спасибо за мотор. Покупали двигатель на Хендай — работает отлично. Уже проехали 8 000 км без каких-либо проблем. Отдельная благодарность менеджеру Виктору и мастерам за профессионализм. Будем рекомендовать вас знакомым!</p>
						<div class="review-card__author">
							<img src="/img/main/reviews/2.png" alt="Мария К." />
							<span>Мария К.</span>
						</div>
					</div>
					<div class="review-card reveal reveal--up">
						<p class="review-card__text">Купил двигатель на Оптиму, установили — всё работает отлично, нареканий нет. Доставили быстро, упаковка целая, документы в порядке. Спасибо за помощь и профессиональный подход!</p>
						<div class="review-card__author">
							<img src="/img/main/reviews/3.png" alt="Денис Ф." />
							<span>Денис Ф.</span>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/include/footer.html'); ?>
	</main>
</body>
</html>