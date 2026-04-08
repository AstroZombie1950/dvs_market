<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Партнёрам — ДВС Маркет</title>
	<meta name="description" content="Партнёрская программа ДВС Маркет. Сотрудничество с автосервисами, магазинами и дилерами двигателей." />
	<meta name="keywords" content="партнёрам, сотрудничество, ДВС Маркет, дилер двигателей" />
	<meta name="author" content="ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<!-- favicon -->
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="manifest" href="/site.webmanifest">
	<!-- Open Graph -->
	<meta property="og:title" content="Партнёрам — ДВС Маркет" />
	<meta property="og:description" content="Партнёрская программа ДВС Маркет. Сотрудничество с автосервисами, магазинами и дилерами двигателей." />
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
		<!-- ===================== PARTNERS: INTRO ===================== -->
		<section class="partners-intro reveal reveal--fade">
			<div class="partners-intro__inner">
				<div class="partners-intro__label">Сотрудничество с бизнесом</div>
				<h1 class="partners-intro__title">Партнёрам</h1>
				<p class="partners-intro__lead">Мы открыты к сотрудничеству с автосервисами, магазинами автозапчастей, установочными мастерскими и региональными партнёрами, которым нужны новые двигатели, понятные условия работы и помощь с подбором под конкретный запрос клиента.</p>
				<div class="partners-intro__actions">
					<button type="button" class="partners-btn partners-btn--primary" onclick="openModal()">Оставить заявку</button>
					<a href="/contacts" class="partners-btn partners-btn--outline">Связаться с нами</a>
				</div>
				<div class="partners-intro__meta">
					<span>Автосервисы и СТО</span>
					<span>Магазины автозапчастей</span>
					<span>Установочные мастерские</span>
					<span>Региональные партнёры</span>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: С КЕМ МЫ РАБОТАЕМ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">С кем мы работаем</h2>
					<p>Рассматриваем сотрудничество с компаниями и специалистами, которым нужен надёжный поставщик двигателей, живая коммуникация по заявкам и понятный рабочий процесс без лишней бюрократии.</p>
				</div>
				<div class="partners-audience">
					<div class="partners-audience__item">
						<strong>Автосервисы и СТО</strong>
						<p>Для сервисов, которым важно быстро закрывать запрос клиента и подбирать подходящий двигатель без долгого самостоятельного поиска.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Магазины автозапчастей</strong>
						<p>Для партнёров, которым нужен понятный ассортимент, консультация по совместимости и сопровождение заказа под клиента.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Установочные мастерские</strong>
						<p>Для специалистов, которые работают с заменой двигателей и ищут удобный канал поставки под регулярные задачи.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Региональные партнёры</strong>
						<p>Для компаний и частных специалистов из разных городов, которым нужна поставка двигателей по России с понятной коммуникацией.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Частные специалисты</strong>
						<p>Для тех, кто работает с подбором, ремонтом и заказами под конкретный автомобиль и ценит удобный рабочий контакт.</p>
					</div>
					<div class="partners-audience__item">
						<strong>Корпоративные клиенты</strong>
						<p>Для компаний, которым нужны двигатели под регулярные запросы и спокойное сопровождение по каждой позиции.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: ЧТО МЫ ПРЕДЛАГАЕМ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Что мы предлагаем</h2>
					<p>Работа строится не только вокруг наличия двигателя, но и вокруг подбора, проверки совместимости, документов и сопровождения заказа до результата.</p>
				</div>
				<div class="partners-offer">
					<div class="partners-offer__row">
						<div class="partners-offer__text">
							<strong>Понятный ассортимент и помощь с подбором</strong>
							<p>Мы работаем с востребованными марками и моделями, которые чаще всего нужны в ремонте и продаже. Если по заявке есть вопросы, помогаем подобрать подходящий двигатель по марке, модели, поколению, объёму и другим важным параметрам.</p>
						</div>
						<div class="partners-offer__list">
							<ul>
								<li>Подбор под конкретный запрос клиента</li>
								<li>Уточнение совместимости по автомобилю</li>
								<li>Работа с популярными направлениями каталога</li>
							</ul>
						</div>
					</div>
					<div class="partners-offer__row">
						<div class="partners-offer__text">
							<strong>Документы, сопровождение и поставка</strong>
							<p>По двигателям предоставляется комплект документов. Остаёмся на связи по заявке, уточняем детали и помогаем довести заказ до получения. При необходимости согласовываем удобный формат доставки по России.</p>
						</div>
						<div class="partners-offer__list">
							<ul>
								<li>Документы на двигатель</li>
								<li>Сопровождение заказа на всех этапах</li>
								<li>Поставка по России</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: ФОРМАТЫ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Форматы сотрудничества</h2>
					<p>В зависимости от задач партнёра можно работать как по разовым заказам, так и в регулярном формате. Для нестандартных запросов условия обсуждаются отдельно.</p>
				</div>
				<div class="partners-formats">
					<div class="partners-format">
						<h3>Разовые заказы</h3>
						<p>Подходят для сервисов, магазинов и специалистов, которым нужен двигатель под конкретный запрос клиента.</p>
						<ul>
							<li>Подбор под отдельную заявку</li>
							<li>Уточнение совместимости</li>
							<li>Сопровождение по сделке</li>
						</ul>
					</div>
					<div class="partners-format">
						<h3>Регулярные поставки</h3>
						<p>Для партнёров, которые постоянно работают с двигателями и хотят иметь стабильный канал поставки.</p>
						<ul>
							<li>Постоянная коммуникация</li>
							<li>Работа по повторяющимся запросам</li>
							<li>Удобный формат взаимодействия</li>
						</ul>
					</div>
					<div class="partners-format">
						<h3>Индивидуальные запросы</h3>
						<p>Если нужна позиция под нестандартную задачу или требуется обсудить особые условия сотрудничества.</p>
						<ul>
							<li>Редкие и сложные запросы</li>
							<li>Отдельное согласование деталей</li>
							<li>Персональный подход к задаче</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: КАК НАЧАТЬ ===================== -->
		<section class="partners-section reveal reveal--fade">
			<div class="partners-section__inner">
				<div class="partners-section__head">
					<h2 class="partners-section__title">Как начать сотрудничество</h2>
					<p>Схема работы простая: вы оставляете заявку, мы обсуждаем детали и после согласования переходим к подбору и поставке двигателей под ваши задачи.</p>
				</div>
				<div class="partners-steps">
					<div class="partners-step">
						<div class="partners-step__num">01</div>
						<strong>Оставляете заявку</strong>
						<p>Сообщаете, чем занимаетесь, какие марки или модели вас интересуют и какой формат сотрудничества рассматриваете.</p>
					</div>
					<div class="partners-step">
						<div class="partners-step__num">02</div>
						<strong>Обсуждаем детали</strong>
						<p>Уточняем объёмы, направление работы, особенности заявок и удобный способ взаимодействия с вашей стороны.</p>
					</div>
					<div class="partners-step">
						<div class="partners-step__num">03</div>
						<strong>Переходим к работе</strong>
						<p>После согласования начинаем подбор и поставку двигателей под ваши запросы в удобном рабочем формате.</p>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: CTA ===================== -->
		<section class="partners-cta reveal reveal--fade" id="partners-cta">
			<div class="partners-cta__inner">
				<h2 class="partners-cta__title">Оставить заявку на сотрудничество</h2>
				<p class="partners-cta__text">Если вы хотите обсудить партнёрство, оставьте заявку через форму на сайте или свяжитесь с нами напрямую. В заявке желательно указать:</p>
				<ul class="partners-cta__list">
					<li>Название компании или имя</li>
					<li>Сферу деятельности</li>
					<li>Город</li>
					<li>Интересующие марки или модели</li>
					<li>Формат сотрудничества</li>
				</ul>
				<div class="partners-cta__bottom">
					<div class="partners-cta__contacts">
						<a href="tel:+79263124747">+7 (926) 312-47-47</a>
						<a href="tel:+79258042599">+7 (925) 804-25-99</a>
						<a href="mailto:star-motor@mail.ru">star-motor@mail.ru</a>
						<span>Telegram / WhatsApp</span>
					</div>
					<div class="partners-cta__actions">
						<button type="button" class="partners-btn partners-btn--primary" onclick="openModal()">Оставить заявку</button>
						<a href="/contacts" class="partners-btn partners-btn--outline">Контакты</a>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== PARTNERS: FAQ ===================== -->
		<section class="faq reveal reveal--fade">
			<div class="faq__inner">
				<div class="faq__header">
					<h2 class="faq__title">Часто задаваемые вопросы</h2>
					<p class="faq__subtitle">Ниже — базовые вопросы по работе с партнёрами. Остальные детали можно обсудить напрямую после заявки.</p>
				</div>
				<div class="faq__list">
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>С кем вы работаете?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Мы рассматриваем сотрудничество с автосервисами, магазинами автозапчастей, установочными мастерскими, региональными продавцами и другими партнёрами, которым нужны новые двигатели и понятный рабочий процесс.</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Можно ли работать по разовым запросам?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Да, можно обращаться как по единичным заказам, так и по регулярным поставкам. Формат зависит от ваших задач и характера запросов.</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Помогаете ли вы с подбором двигателя?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Да, мы помогаем подобрать двигатель по марке, модели, поколению, объёму и другим параметрам, которые важны перед оформлением заказа.</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Есть ли доставка по России?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Да, отправка по России возможна. Детали доставки согласовываются индивидуально в зависимости от позиции и региона.</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Нужно ли заключать договор?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Вопрос документального оформления обсуждается отдельно в зависимости от формата сотрудничества и задач партнёра.</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- ===================== FOOTER no faq blocks ===================== -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/include/footer_no_faq.html'); ?>
	</main>
</body>
</html>