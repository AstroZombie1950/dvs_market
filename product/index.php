<?php
/* ===================== ЗАГРУЗКА ДАННЫХ ===================== */
require_once __DIR__ . '/inc/fetch-product.php';

/* Получаем slug из URL */
$slug = trim($_GET['slug'] ?? '');

/* Ищем товар */
$product = $slug ? get_product_by_slug($slug) : null;

/* 404 если не найден */
if (!$product) {
	http_response_code(404);
	include $_SERVER['DOCUMENT_ROOT'] . '/include/header.html';
	echo '<main><section class="product-hero"><div class="product-hero__inner">';
	echo '<h1 style="padding:60px 0;text-align:center;">Товар не найден</h1>';
	echo '<p style="text-align:center;margin-bottom:40px;"><a href="/catalog/">Вернуться в каталог</a></p>';
	echo '</div></section></main>';
	include $_SERVER['DOCUMENT_ROOT'] . '/include/footer_no_faq.html';
	exit;
}

/* Строим массив замен */
$replacements = build_replacements($product);

/* ===================== ШАБЛОН ===================== */
/* Используем output buffering: рендерим HTML, потом заменяем INSERT_* */
ob_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>INSERT_TITLE</title>
	<meta name="description" content="INSERT_META_DESC"/>
	<meta name="keywords" content="INSERT_KEYWORDS"/>
	<meta name="author" content="ДВС Маркет"/>
	<meta name="robots" content="index, follow"/>
	<!-- favicon -->
	<link rel="icon" href="/favicon.ico" sizes="any">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="manifest" href="/site.webmanifest">
	<!-- Open Graph -->
	<meta property="og:title" content="INSERT_TITLE" />
	<meta property="og:description" content="INSERT_OG_DESC" />
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
		<!-- hero -->
        <section class="product-hero">
            <div class="product-hero__inner">
                <nav class="breadcrumbs product_page_bc">
                    <a href="/">Главная</a>
                    <span class="breadcrumbs__sep"></span>
                    <a href="/catalog/">Каталог</a>
                    <span class="breadcrumbs__sep"></span>
                    <a href="BREADCRUMB_BRAND_URL">INSERT_CAR_BRAND</a>
                    <span class="breadcrumbs__sep"></span>
                    <a href="BREADCRUMB_MODEL_URL">INSERT_CAR_MODEL</a>
                    <span class="breadcrumbs__sep"></span>
                    <a href="BREADCRUMB_GEN_URL">INSERT_CAR_GENERATION</a>
                    <span class="breadcrumbs__sep"></span>
                    <span class="breadcrumbs__current">Двигатель INSERT_ENGINE_MODEL_NAME</span>
                </nav>
            </div>
        </section>
		<!-- основной блок -->
        <section class="product">
            <div class="product__inner">
                <div class="product-gallery">
                    <div class="product-gallery__main">
                        <img id="mainImg" src="INSERT_ENGINE_IMG_1" alt="Двигатель INSERT_ENGINE_MODEL_NAME" />
						<button class="product-gallery__zoom" onclick="openLightbox()" aria-label="Увеличить">
							<svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/><path d="M11 8v6M8 11h6"/></svg>
						</button>
                    </div>
                    <div class="product-gallery__thumbs">
                        <div class="product-gallery__thumb active" onclick="setImg(this, 'INSERT_ENGINE_IMG_1')">
                            <img src="INSERT_ENGINE_IMG_1" alt="Двигатель INSERT_ENGINE_MODEL_NAME" />
                        </div>
                        <div class="product-gallery__thumb" onclick="setImg(this, 'INSERT_ENGINE_IMG_2')">
                            <img src="INSERT_ENGINE_IMG_2" alt="INSERT_ENGINE_MODEL_NAME мотор" />
                        </div>
                        <div class="product-gallery__thumb" onclick="setImg(this, 'INSERT_ENGINE_IMG_3')">
                            <img src="INSERT_ENGINE_IMG_3" alt="INSERT_CAR_MODEL INSERT_ENGINE_MODEL_NAME" />
                        </div>
                        <div class="product-gallery__thumb" onclick="setImg(this, 'INSERT_ENGINE_IMG_4')">
                            <img src="INSERT_ENGINE_IMG_4" alt="INSERT_ENGINE_MODEL_NAME INSERT_CAR_MODEL" />
                        </div>
                    </div>
                    <div class="product-gallery__price-block">
                        <div class="product-gallery__price">INSERT_PRICE ₽</div>
						<div class="product-gallery__actions">
							<div class="qty">
								<button class="qty__btn" onclick="changeQty(-1)">−</button>
								<input class="qty__input" id="qtyInput" type="number" value="1" min="1" max="99" />
								<button class="qty__btn" onclick="changeQty(1)">+</button>
							</div>
							<a href="#" class="product-gallery__cta" onclick="openModal()">Уточнить наличие</a>
						</div>
						<div class="product-gallery__messengers">
							<a href="https://t.me/+79263124747" target="_blank" aria-label="Telegram">
								<svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L7.17 13.23l-2.965-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.983.329z"/></svg>
							</a>
							<a href="https://wa.me/79263124747" target="_blank" aria-label="WhatsApp">
								<svg viewBox="0 0 24 24"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91c0 1.75.46 3.45 1.32 4.95L2 22l5.25-1.38c1.45.79 3.08 1.21 4.79 1.21 5.46 0 9.91-4.45 9.91-9.91S17.5 2 12.04 2zm5.52 14.15c-.23.65-1.35 1.24-1.85 1.32-.47.07-1.07.1-1.72-.11-.4-.13-.91-.3-1.56-.59-2.74-1.18-4.53-3.96-4.67-4.14-.14-.18-1.11-1.48-1.11-2.82 0-1.34.7-2 .95-2.27.23-.25.5-.31.67-.31.17 0 .34.002.49.009.16.008.37-.062.58.44.23.53.77 1.87.84 2.01.07.14.12.3.02.48-.09.18-.14.29-.28.45-.14.16-.29.36-.42.48-.14.13-.28.28-.12.54.16.26.72 1.19 1.55 1.93 1.07.95 1.97 1.25 2.24 1.39.27.14.43.12.59-.07.16-.19.68-.8.86-1.07.18-.27.36-.23.61-.14.25.09 1.58.75 1.85.88.27.14.45.2.52.31.06.12.06.69-.17 1.34z"/></svg>
							</a>
						</div>
                    </div>
					<!-- преимущества -->
					<div class="product-gallery__features">
						<div class="feature-row">
							<div class="feature-row__icon">
								<svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/><path d="M7 15h2M12 15h5"/></svg>
							</div>
							<span class="feature-row__text">Оплата всеми удобными для Вас способами</span>
						</div>
						<div class="feature-row">
							<div class="feature-row__icon">
								<svg viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 17l-6.2 4.3 2.4-7.4L2 9.4h7.6z"/></svg>
							</div>
							<span class="feature-row__text">Гарантия на все двигатели 180 дней</span>
						</div>
						<div class="feature-row">
							<div class="feature-row__icon">
								<svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/></svg>
							</div>
							<span class="feature-row__text">Все ДВС проходят комплексную проверку</span>
						</div>
						<div class="feature-row">
							<div class="feature-row__icon">
								<svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
							</div>
							<span class="feature-row__text">Можем установить Вам двигатель в партнерском автосервисе</span>
						</div>
					</div>
                </div>
                <div class="product-info">
					<h1 class="product-info__title">Двигатель INSERT_CAR_BRAND INSERT_CAR_MODEL INSERT_CAR_GENERATION, INSERT_ENGINE_VOLUME л, INSERT_ENGINE_MODEL_NAME</h1>
                    <div class="product-info__specs">
                        <p class="product-info__spec">Двигатель INSERT_ENGINE_MODEL_NAME</p>
                        <p class="product-info__spec">Объём — INSERT_ENGINE_VOLUME</p>
                        <p class="product-info__spec">Мощность — INSERT_ENGINE_HP л.с.</p>
                        <p class="product-info__spec">Тип двигателя — INSERT_ENGINE_TYPE</p>
                        <p class="product-info__spec"><strong>Стоимость двигатель под заказ — по запросу, по наличию — по запросу.</strong></p>
                        <p class="product-info__spec">Новый двигатель БЕЗ ПРОБЕГА, с заводской ГАРАНТИЕЙ и с ДОКУМЕНТАМИ!</p>
						<p class="product-info__spec">INSERT_ENGINE_SHORT_DESC</p>
                    </div>
					<div class="product-info__desc">
						<h2 class="product-description__title">Описание</h2>
						<p class="product-description__text">INSERT_ENGINE_DESC</p>
					</div>
					<div class="product-info__block">
						<h3 class="product-info__block-title">Доставка</h3>
						<ul class="check-list">
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Самовывоз: Бесплатно
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Курьером по Москве
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Доставка в регионы: 3–4 дня
							</li>
						</ul>
					</div>
					<div class="product-info__block" style="border-bottom:none; margin-bottom:0; padding-bottom:0;">
						<h3 class="product-info__block-title">Наши преимущества</h3>
						<ul class="check-list">
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Лучшие цены
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Проверка каждого ДВС перед отправкой на специальном стенде (горячий запуск)
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Видео запуска каждого ДВС
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Доставка по всем городам РФ
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Гарантия на ДВС
							</li>
							<li>
								<svg viewBox="0 0 24 24" width="18" height="18"><circle cx="12" cy="12" r="12" fill="#e77b3d"/><path d="M7 12.5l3.5 3.5 6.5-7" stroke="#111" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>
								Большой ассортимент новых ДВС
							</li>
						</ul>
					</div>
                </div>
            </div>
        </section>
		<!-- описание + таблица -->
        <section class="product-description">
            <div class="product-description__inner">
				<h3 class="product-description__title" style="font-size:16px; margin-bottom:12px;">Марки/модели автомобилей</h3>
                <table class="spec-table" style="margin-bottom:8px;">
                    <tr><td>INSERT_CAR_BRAND / INSERT_CAR_MODEL / INSERT_CAR_GENERATION</td><td>INSERT_ENGINE_MODEL_NAME</td></tr>
                </table>
				<p style="font-size:13px; color:#666; margin-bottom:32px;">Точное соответствие зависит от года выпуска и комплектации — проверим по VIN.</p>
                <h3 class="product-description__title" style="font-size:16px; margin-bottom:12px;">Характеристики</h3>
                <table class="spec-table">
                    <tr><td>Тип</td><td>INSERT_ENGINE_TYPE</td></tr>
                    <tr><td>Кол-во клапанов</td><td>INSERT_ENGINE_NUM_VALVES</td></tr>
                    <tr><td>Точный объём</td><td>INSERT_ENGINE_VALUE_EXT см³</td></tr>
                    <tr><td>Диаметр цилиндра</td><td>INSERT_ENG_CYL_DIA мм</td></tr>
                    <tr><td>Ход поршня</td><td>INSERT_ENGINE_PISTON_STROKE мм</td></tr>
                    <tr><td>Система питания</td><td>INSERT_ENGINE_POWER_TYPE</td></tr>
                    <tr><td>Мощность</td><td>INSERT_ENGINE_HP л.с.</td></tr>
                    <tr><td>Крутящий момент</td><td>INSERT_ENGINE_TORQUE Нм</td></tr>
                    <tr><td>Степень сжатия</td><td>INSERT_ENGINE_COMP_RATIO</td></tr>
                    <tr><td>Тип топлива</td><td>INSERT_ENGINE_FUEL_TYPE</td></tr>
                    <tr><td>Экологические нормы</td><td>INSERT_ENGINE_ECO_TYPE</td></tr>
                </table>
            </div>
        </section>
		<!-- лайтбокс -->
		<div class="lightbox" id="lightbox" onclick="closeLightbox(event)">
			<img class="lightbox__img" id="lightboxImg" src="" alt="Фото двигателя" />
			<button class="lightbox__close" onclick="closeLightbox()" aria-label="Закрыть">
				<svg viewBox="0 0 24 24"><path d="M18 6L6 18M6 6l12 12"/></svg>
			</button>
		</div>
		<!-- ===== FAQ ===== -->
        <section class="faq">
            <div class="faq__inner">
				<div class="faq__header reveal reveal--fade">
					<h2 class="faq__title">Часто задаваемые вопросы</h2>
					<p class="faq__subtitle">По всем интересующим Вас вопросам, обращайтесь по телефону или в мессенджерах</p>
				</div>
				<div class="faq__list">
					<!-- вопросы из таблицы -->
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>На какие автомобили подходит двигатель INSERT_ENGINE_MODEL_NAME?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">INSERT_ANSWER_1</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Какие документы идут вместе с двигателем INSERT_ENGINE_MODEL_NAME?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">INSERT_ANSWER_2</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Какая гарантия на новый двигатель INSERT_ENGINE_MODEL_NAME и как проходит доставка?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">INSERT_ANSWER_3</div>
						</div>
					</div>
					<!-- типовые вопросы -->
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Я нашел ДВС дешевле, почему стоит брать именно у Вас?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">
								В 90% случаев это двигатели, которые не соответствуют нашим требованиям качества. Такие двигатели либо приобретаются на разборках или являются контрактными, но не НОВЫМИ. Мы же предлагаем реальный новый агрегат со всеми документами напрямую от завода производителя.
							</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Что входит в стоимость нового ДВС?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">
								В стоимость НОВОГО агрегата входят: таможенные расходы, расходы на доставку до нашего склада. Также нужно учитывать расходы на доставку до Вашего адреса, которую Вам помогут рассчитать наши менеджеры.
							</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Смогу ли я поставить авто на учет с Вашим новым ДВС?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">
								Никаких проблем не возникнет, ведь мы предоставляем все необходимые документы для постановки на учет в комплекте с двигателем: договор купли-продажи, грузовую таможенную декларацию, диагностическую карту.
							</div>
						</div>
					</div>
					<div class="faq__item reveal reveal--left">
						<button class="faq__question" aria-expanded="false">
							<span>Есть ли у Вас моторы в наличии?</span>
							<svg class="faq__icon" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"/></svg>
						</button>
						<div class="faq__answer">
							<div class="faq__answer-inner">Да, конечно, на нашем складе имеются моторы, которые можно посмотреть и купить в тот же день.</div>
						</div>
					</div>
				</div>
            </div>
        </section>
		<!-- ===================== FOOTER blocks ===================== -->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/include/footer_no_faq.html'); ?>
		<script src="/js/product_page.js"></script>
	</main>
</body>
</html>
<?php
/* ===================== ПОДСТАНОВКА ===================== */
$html = ob_get_clean();

/* Заменяем все INSERT_* и BREADCRUMB_* плейсхолдеры */
$html = str_replace(array_keys($replacements), array_values($replacements), $html);

echo $html;