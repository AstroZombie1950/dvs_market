<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Подбор двигателя — ДВС Маркет</title>
	<meta name="description" content="Подбор двигателя по марке, модели, поколению и параметрам автомобиля. Оставьте заявку — поможем выбрать подходящий вариант без риска ошибки." />
	<meta name="keywords" content="подбор двигателя, подобрать двигатель, совместимость двигателя, ДВС Маркет" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<!-- Open Graph -->
	<meta property="og:title" content="Подбор двигателя — ДВС Маркет" />
	<meta property="og:description" content="Подбор двигателя по марке, модели, поколению и параметрам автомобиля. Оставьте заявку — поможем выбрать подходящий вариант." />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="ru_RU" />
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/info.css" />
</head>
<body>
	<!-- ===================== HEADER ===================== -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/include/header.html'); ?>
	<main>
		<!-- ===================== PODBOR: INTRO ===================== -->
		<section class="partners-intro reveal reveal--fade">
			<div class="partners-intro__inner">
				<div class="partners-intro__label">Помощь с выбором</div>
				<h1 class="partners-intro__title">Подбор двигателя</h1>
				<p class="partners-intro__lead">Подбор двигателя — это важный этап перед покупкой. Даже если внешне двигатели похожи, у разных моделей, поколений и комплектаций могут быть отличия, которые влияют на совместимость.</p>
				<p class="partners-intro__lead">Если вы не уверены, какой именно двигатель нужен вашему автомобилю, оставьте заявку на подбор. Мы поможем сориентироваться по модели, поколению, объёму двигателя и другим параметрам, чтобы вы могли выбрать подходящий вариант без лишнего риска.</p>
				<div class="partners-intro__actions">
					<button type="button" class="partners-btn partners-btn--primary" onclick="openModal()">Оставить заявку</button>
					<a href="/contacts" class="partners-btn partners-btn--outline">Связаться с нами</a>
				</div>
			</div>
		</section>
		<!-- ===================== PODBOR: КОГДА НУЖЕН ПОДБОР ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Когда нужен подбор двигателя</h2>
					<p>Подбор особенно актуален в следующих случаях:</p>
				</div>
				<div class="partners-audience">
					<div class="partners-audience__item">
						<strong>Неизвестна точная модель</strong>
						<p>Если вы не знаете точную модель двигателя и хотите исключить ошибку перед покупкой.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Несколько вариантов моторов</strong>
						<p>Если автомобиль выпускался с разными моторами и нужно определить подходящий.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Сомнения по поколению или объёму</strong>
						<p>Если есть сомнения по поколению или объёму — лучше уточнить заранее, чем ошибиться при заказе.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Проверка совместимости</strong>
						<p>Если нужно уточнить совместимость перед покупкой и убедиться, что позиция подходит вашему автомобилю.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PODBOR: ЧТО УКАЗАТЬ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Что можно указать для подбора</h2>
					<p>Чтобы мы быстрее сориентировались, желательно сразу указать:</p>
				</div>
				<div class="partners-offer">
					<div class="partners-offer__row">
						<div class="partners-offer__text">
							<strong>Основные параметры автомобиля</strong>
							<p>Чем больше информации вы предоставите, тем точнее и быстрее мы сможем подобрать подходящий двигатель под ваш автомобиль.</p>
						</div>
						<div class="partners-offer__list">
							<ul>
								<li>Марка автомобиля</li>
								<li>Модель</li>
								<li>Поколение или год выпуска</li>
								<li>Объём двигателя</li>
								<li>Тип топлива</li>
								<li>Код двигателя или VIN (при наличии)</li>
								<li>Любые дополнительные сведения</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PODBOR: КАК ПРОХОДИТ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Как проходит подбор</h2>
					<p>Схема работы простая:</p>
				</div>
				<div class="partners-steps">
					<div class="partners-step">
						<div class="partners-step__num">01</div>
						<strong>Вы оставляете заявку</strong>
						<p>Передаёте информацию об автомобиле и описываете, что именно нужно подобрать.</p>
					</div>
					<div class="partners-step">
						<div class="partners-step__num">02</div>
						<strong>Мы уточняем детали</strong>
						<p>При необходимости задаём дополнительные вопросы, чтобы исключить ошибки и подобрать подходящий вариант.</p>
					</div>
					<div class="partners-step">
						<div class="partners-step__num">03</div>
						<strong>Предлагаем решение</strong>
						<p>После проверки предоставляем подходящие варианты двигателей и помогаем с дальнейшими шагами.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PODBOR: ПОЧЕМУ УТОЧНИТЬ ЗАРАНЕЕ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Почему лучше уточнить заранее</h2>
				</div>
				<div class="partners-offer">
					<div class="partners-offer__row">
						<div class="partners-offer__text">
							<strong>Избежать лишних расходов и потери времени</strong>
							<p>Неправильно подобранный двигатель — это потеря времени, дополнительные расходы и риск несовместимости. Поэтому перед покупкой лучше заранее проверить все основные параметры и убедиться, что выбранная позиция действительно подходит вашему автомобилю.</p>
							<p>Подбор помогает сократить риск ошибки и быстрее перейти к покупке нужного двигателя.</p>
						</div>
						<div class="partners-offer__list">
							<strong>Что вы получаете</strong>
							<p>После обращения по подбору вы получаете:</p>
							<ul>
								<li>помощь в определении подходящего двигателя;</li>
								<li>уточнение совместимости по вашему автомобилю;</li>
								<li>консультацию по основным параметрам;</li>
								<li>возможность быстрее перейти к оформлению заказа.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PODBOR: CTA ===================== -->
		<section class="partners-cta reveal reveal--fade">
			<div class="partners-cta__inner">
				<h2 class="partners-cta__title">Оставить заявку на подбор</h2>
				<p class="partners-cta__text">Если вам нужен подбор двигателя, свяжитесь с нами удобным способом или оставьте заявку через форму на сайте. В обращении желательно указать:</p>
				<ul class="partners-cta__list">
					<li>Марку и модель автомобиля</li>
					<li>Поколение или год выпуска</li>
					<li>Объём двигателя</li>
					<li>VIN или код двигателя, если он известен</li>
					<li>Ваш контактный номер для связи</li>
				</ul>
				<div class="partners-cta__bottom">
					<div class="partners-cta__contacts">
						<a href="tel:+79263124747">+7 (926) 312-47-47</a>
						<a href="tel:+79258042599">+7 (925) 804-25-99</a>
						<a href="mailto:market-dvs@yandex.ru">market-dvs@yandex.ru</a>
						<span>Telegram / WhatsApp</span>
					</div>
					<div class="partners-cta__actions">
						<button type="button" class="partners-btn partners-btn--primary" onclick="openModal()">Оставить заявку</button>
						<a href="/contacts" class="partners-btn partners-btn--outline">Контакты</a>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/include/footer.html'); ?>
	</main>
</body>
</html>