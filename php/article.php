<?php
$site_url = "https://market-dvs.ru";

/* редирект если slug пустой */
$slug = trim($_GET['slug'] ?? '');
if ($slug === '') {
	header('Location: /blog/');
	exit;
}

/* запрос к WP API */
$api_url  = $site_url . "/wp-json/wp/v2/posts?slug={$slug}&status=publish&_fields=date,title,excerpt,content,slug";
$response = @file_get_contents($api_url);

if ($response === false) {
	$error = 'Не удалось загрузить статью. Попробуйте позже.';
} else {
	$posts = json_decode($response, true);
	if (empty($posts)) {
		$error = 'Статья не найдена.';
	}
}

/* данные статьи */
if (empty($error)) {
	$post = $posts[0];

	$months = [
		1  => 'января',   2  => 'февраля',  3  => 'марта',
		4  => 'апреля',   5  => 'мая',      6  => 'июня',
		7  => 'июля',     8  => 'августа',  9  => 'сентября',
		10 => 'октября',  11 => 'ноября',   12 => 'декабря',
	];

	$timestamp = strtotime($post['date']);
	$date_fmt  = date('j', $timestamp) . ' ' . $months[(int)date('n', $timestamp)] . ' ' . date('Y', $timestamp);

	$title   = html_entity_decode(strip_tags($post['title']['rendered']), ENT_QUOTES, 'UTF-8');
	$excerpt = html_entity_decode(strip_tags($post['excerpt']['rendered']), ENT_QUOTES, 'UTF-8');
	$content = $post['content']['rendered'];
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?= !empty($error) ? 'Ошибка' : htmlspecialchars($title) ?> — Блог ДВС Маркет</title>
	<?php if (empty($error)): ?>
	<meta name="description" content="<?= htmlspecialchars($excerpt) ?>" />
	<meta name="robots" content="noindex, nofollow" />
	<link rel="canonical" href="<?= $site_url ?>/blog/?slug=<?= htmlspecialchars($slug) ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="<?= htmlspecialchars($title) ?>" />
	<meta property="og:description" content="<?= htmlspecialchars($excerpt) ?>" />
	<meta property="og:url" content="<?= $site_url ?>/blog/?slug=<?= htmlspecialchars($slug) ?>" />
	<meta property="og:locale" content="ru_RU" />
	<?php endif; ?>
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

	<?php if (!empty($error)): ?>

	<!-- ошибка -->
	<section class="partners-section">
		<div class="partners-section__inner">
			<p class="blog-empty"><?= $error ?></p>
		</div>
	</section>

	<?php else: ?>

	<!-- хлебные крошки -->
	<nav class="article-breadcrumbs">
		<div class="article-breadcrumbs__inner">
			<a href="/">Главная</a>
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
			<a href="/blog/">Блог</a>
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
			<span><?= htmlspecialchars($title) ?></span>
		</div>
	</nav>

	<!-- статья -->
	<section class="partners-section">
		<div class="partners-section__inner">
			<div class="article">
				<div class="article__meta">
					<time class="article__date"><?= $date_fmt ?></time>
				</div>
				<h1 class="article__title"><?= htmlspecialchars($title) ?></h1>
				<div class="article__content">
					<?= $content ?>
				</div>
			</div>

			<!-- CTA -->
			<div class="article__cta">
				<h2 class="article__cta-title">Остались вопросы?</h2>
				<p class="article__cta-text">Свяжитесь с нами — поможем подобрать двигатель и ответим на все вопросы.</p>
				<div class="partners-intro__actions">
					<button type="button" class="partners-btn partners-btn--primary" onclick="openModal()">Оставить заявку</button>
					<a href="/contacts/" class="partners-btn partners-btn--outline">Контакты</a>
				</div>
			</div>
		</div>
	</section>

	<?php endif; ?>

	<?php include get_template_directory() . '/include/footer.php'; ?>
	<?php wp_footer(); ?>
</body>
</html>