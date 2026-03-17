<?php
require_once __DIR__ . '/inc/fetch-catalog.php';
require_once __DIR__ . '/inc/build-catalog.php';

// Получаем данные и строим дерево
$raw  = get_catalog_data();
$tree = build_catalog_tree($raw);

// Передаём дерево в JS как JSON
$tree_json = json_encode($tree, JSON_UNESCAPED_UNICODE);
?>
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
	<!-- ===================== HEADER ===================== -->
	<?php include($_SERVER['DOCUMENT_ROOT'].'/include/header.html'); ?>
	<main>
		<!-- ===== CATALOG HERO ===== -->
		<section class="cat-hero">
			<div class="cat-hero__bg"></div>
			<div class="cat-hero__inner">
				<!-- крошки — обновляются через JS -->
				<nav class="breadcrumbs" aria-label="Хлебные крошки" id="breadcrumbs">
					<a href="/">Главная</a>
					<span class="breadcrumbs__sep"></span>
					<span class="breadcrumbs__current">Каталог</span>
				</nav>
				<h1 class="cat-hero__title">Новые моторы</h1>
			</div>
		</section>
		<!-- ===== CATALOG MAIN ===== -->
		<section class="catalog">
			<div class="catalog__inner">
				<div class="catalog__content">
					<!-- сетка карточек — заполняется через JS -->
					<div class="brand-grid" id="catalog-grid"></div>
				</div>
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
		<?php include($_SERVER['DOCUMENT_ROOT'].'/include/footer.html'); ?>
		
		<!-- Дерево каталога из Google Sheets -->
		<script>const CATALOG = <?= $tree_json ?>;</script>
		<!-- Скрипт навигации по каталогу -->
		<script src="/catalog/js/catalog-nav.js"></script>
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