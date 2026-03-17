<?php
if (!empty($_GET['slug'])) {
	include get_template_directory() . '/php/article.php';
	exit;
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Блог — ДВС Маркет</title>
	<meta name="description" content="Полезные статьи о двигателях, подборе, совместимости и покупке ДВС. Советы от ДВС Маркет." />
	<meta name="keywords" content="блог, статьи, двигатели, подбор двигателя, ДВС Маркет" />
	<meta name="robots" content="index, follow" />
	<link rel="canonical" href="https://market-dvs.ru/blog" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Блог — ДВС Маркет" />
	<meta property="og:description" content="Полезные статьи о двигателях, подборе, совместимости и покупке ДВС." />
	<meta property="og:url" content="https://market-dvs.ru/blog" />
	<meta property="og:locale" content="ru_RU" />
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" href="/css/main.css" />
	<link rel="stylesheet" href="/css/info.css" />
	<?php wp_head(); ?>
</head>
<body>
	<?php include get_template_directory() . '/include/header.php'; ?>
	<!-- ===================== BLOG INTRO ===================== -->
	<section class="partners-intro reveal reveal--fade">
		<div class="partners-intro__inner">
			<div class="partners-intro__label">Полезные материалы</div>
			<h1 class="partners-intro__title">Блог</h1>
			<p class="partners-intro__lead">Статьи о двигателях, подборе, совместимости и покупке ДВС. Помогаем разобраться перед заказом.</p>
		</div>
	</section>
	<!-- ===================== BLOG GRID ===================== -->
	<section class="partners-section">
		<div class="partners-section__inner">
			<div class="blog-grid">
				<?php include get_template_directory() . '/php/blog-api.php'; ?>
			</div>
		</div>
	</section>
	<?php include get_template_directory() . '/include/footer.php'; ?>
	<?php wp_footer(); ?>
</body>
</html>