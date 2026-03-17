<?php
/**
 * Строит дерево каталога из сырых строк таблицы.
 *
 * Результат:
 * [
 *   'Kia' => [
 *     'Rio' => [
 *       'II' => [
 *         ['slug' => '...', 'engine' => 'G4EE'],
 *         ...
 *       ],
 *     ],
 *   ],
 * ]
 */
function build_catalog_tree(array $data): array {
	$tree = [];

	foreach ($data as $row) {
		$brand      = trim($row['Марка авто']      ?? '');
		$model      = trim($row['Модель авто']     ?? '');
		$generation = trim($row['Поколение авто']  ?? '');
		$engine     = trim($row['Номер ДВС']       ?? '');
		$slug       = trim($row['SLUG']            ?? '');

		// Пропускаем строки без обязательных полей
		if (!$brand || !$model || !$generation || !$engine) {
			continue;
		}

		// Инициализируем уровни если ещё нет
		if (!isset($tree[$brand])) {
			$tree[$brand] = [];
		}
		if (!isset($tree[$brand][$model])) {
			$tree[$brand][$model] = [];
		}
		if (!isset($tree[$brand][$model][$generation])) {
			$tree[$brand][$model][$generation] = [];
		}

		// Добавляем двигатель в поколение
		$tree[$brand][$model][$generation][] = [
			'engine' => $engine,
			'slug'   => $slug,
		];
	}

	// Сортируем марки и модели по алфавиту
	ksort($tree);
	foreach ($tree as &$models) {
		ksort($models);
	}

	return $tree;
}

// Строку в URL-slug: "Santa Fe" -> "santa-fe", "III" -> "iii"
function to_slug(string $str): string {
	$str = mb_strtolower(trim($str));
	$str = str_replace(' ', '-', $str);
	// убираем всё кроме латиницы, цифр и дефиса
	$str = preg_replace('/[^a-z0-9\-]/u', '', $str);
	// убираем двойные дефисы
	$str = preg_replace('/-+/', '-', $str);
	return trim($str, '-');
}

// Ищет оригинальный ключ по его slug среди массива ключей
function from_slug(string $slug, array $keys): ?string {
	foreach ($keys as $key) {
		if (to_slug($key) === $slug) return $key;
	}
	return null;
}

/**
 * Рендерит HTML карточек для текущего уровня каталога.
 * Вызывается из index.php и вставляется в #catalog-grid.
 */
function render_catalog_html(array $tree, string $level, ?string $brand, ?string $model): string {
	$html = '';

	if ($level === 'brands') {
		$html .= render_brands($tree);
	} elseif ($level === 'generations' && $brand) {
		$html .= render_models($tree, $brand);
	} elseif ($level === 'engines' && $brand && $model) {
		$html .= render_generations($tree, $brand, $model);
	}

	if (!$html) {
		$html = '<p class="brand-grid__empty">Каталог пуст</p>';
	}

	return $html;
}

// Карточки марок с тегами моделей
function render_brands(array $tree): string {
	$html = '';
	foreach ($tree as $brand => $models) {
		$tags = '';
		foreach (array_keys($models) as $model) {
			$url   = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/';
			$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($model) . '</a></li>';
		}
		$html .= render_card(htmlspecialchars($brand), $tags);
	}
	return $html;
}

// Карточки моделей с тегами поколений
function render_models(array $tree, string $brand): string {
	$html   = '';
	$models = $tree[$brand] ?? [];
	foreach ($models as $model => $generations) {
		$tags = '';
		foreach (array_keys($generations) as $gen) {
			$url   = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/';
			$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($gen) . '</a></li>';
		}
		$html .= render_card(htmlspecialchars($model), $tags);
	}
	return $html;
}

// Карточки поколений с тегами двигателей
function render_generations(array $tree, string $brand, string $model): string {
	$html        = '';
	$generations = $tree[$brand][$model] ?? [];
	foreach ($generations as $gen => $engines) {
		$tags = '';
		foreach ($engines as $item) {
			if ($item['slug']) {
				$url   = '/product/index.php?slug=' . urlencode($item['slug']);
				$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($item['engine']) . '</a></li>';
			} else {
				$tags .= '<li><span class="brand-card__tag--soon">' . htmlspecialchars($item['engine']) . '</span></li>';
			}
		}
		$html .= render_card(htmlspecialchars($gen), $tags);
	}
	return $html;
}

// Шаблон одной карточки
function render_card(string $title, string $tags_html): string {
	return '
		<div class="brand-card">
			<div class="brand-card__top"></div>
			<div class="brand-card__body">
				<h2 class="brand-card__title">' . $title . '</h2>
				<ul class="brand-card__models">' . $tags_html . '</ul>
			</div>
		</div>
	';
}