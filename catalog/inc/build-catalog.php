<?php
/**
 * Строит дерево каталога из сырых строк таблицы.
 *
 * Результат:
 * [
 *   'Марка' => [
 *     'Модель' => [
 *       'Поколение' => [
 *         ['slug' => '...', 'engine' => 'G4FA'],
 *         ...
 *       ],
 *     ],
 *   ],
 * ]
 */
function build_catalog_tree(array $data): array {
	$tree = [];

	foreach ($data as $row) {
		$brand      = trim($row['Марка авто']     ?? '');
		$model      = trim($row['Модель авто']    ?? '');
		$generation = trim($row['Поколение авто'] ?? '');
		$engine     = trim($row['Номер ДВС']      ?? '');
		$slug       = trim($row['SLUG']           ?? '');

		// Пропускаем строки без обязательных полей
		if (!$brand || !$model || !$generation || !$engine) {
			continue;
		}

		if (!isset($tree[$brand]))                        $tree[$brand] = [];
		if (!isset($tree[$brand][$model]))                $tree[$brand][$model] = [];
		if (!isset($tree[$brand][$model][$generation]))   $tree[$brand][$model][$generation] = [];

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
	$str = preg_replace('/[^a-z0-9\-]/u', '', $str);
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
 * Рендерит HTML карточек для текущего уровня.
 * Вставляется в #catalog-grid в index.php.
 *
 * Уровни:
 * brands       → /catalog/               карточки марок,     теги = модели
 * brands_detail → /catalog/kia/          карточки моделей,   теги = поколения
 * models       → /catalog/kia/rio/       карточки поколений, теги = двигатели
 * generations  → /catalog/kia/rio/iii/   карточки двигателей → /product/
 */
function render_catalog_html(array $tree, string $level, ?string $brand, ?string $model, ?string $generation): string {
	$html = '';

	if ($level === 'brands') {
		$html = render_brands($tree);
	} elseif ($level === 'brands_detail' && $brand) {
		$html = render_models($tree, $brand);
	} elseif ($level === 'models' && $brand && $model) {
		$html = render_generations($tree, $brand, $model);
	} elseif ($level === 'generations' && $brand && $model && $generation) {
		$html = render_engines($tree, $brand, $model, $generation);
	}

	return $html ?: '<p class="brand-grid__empty">Каталог пуст</p>';
}

// /catalog/ — карточки марок, теги = модели (ведут на /catalog/марка/модель/)
function render_brands(array $tree): string {
	$html = '';
	foreach ($tree as $brand => $models) {
		$tags = '';
		foreach (array_keys($models) as $model) {
			$url   = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/';
			$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($model) . '</a></li>';
		}
		$brand_url = '/catalog/' . to_slug($brand) . '/';
		$html .= render_card(htmlspecialchars($brand), $tags, $brand_url);
	}
	return $html;
}

// /catalog/марка/ — карточки моделей, теги = поколения (ведут на /catalog/марка/модель/поколение/)
function render_models(array $tree, string $brand): string {
	$html   = '';
	$models = $tree[$brand] ?? [];
	foreach ($models as $model => $generations) {
		$tags = '';
		foreach (array_keys($generations) as $gen) {
			$url   = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/' . to_slug($gen) . '/';
			$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($gen) . '</a></li>';
		}
		$model_url = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/';
		$html .= render_card(htmlspecialchars($model), $tags, $model_url);
	}
	return $html;
}

// /catalog/марка/модель/ — карточки поколений, теги = двигатели (ведут на /product/)
function render_generations(array $tree, string $brand, string $model): string {
	$html        = '';
	$generations = $tree[$brand][$model] ?? [];
	foreach ($generations as $gen => $engines) {
		$tags = '';
		foreach ($engines as $item) {
			if ($item['slug']) {
				$url = '/product/' . $item['slug'];
				$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($item['engine']) . '</a></li>';
			} else {
				$tags .= '<li><span class="brand-card__tag--soon">' . htmlspecialchars($item['engine']) . '</span></li>';
			}
		}
		$gen_url = '/catalog/' . to_slug($brand) . '/' . to_slug($model) . '/' . to_slug($gen) . '/';
		$html .= render_card(htmlspecialchars($gen), $tags, $gen_url);
	}
	return $html;
}

// /catalog/марка/модель/поколение/ — карточки двигателей → /product/
function render_engines(array $tree, string $brand, string $model, string $generation): string {
	$html    = '';
	$engines = $tree[$brand][$model][$generation] ?? [];
	foreach ($engines as $item) {
		$tags = '';
		if ($item['slug']) {
			$url = '/product/' . $item['slug'];
			$tags .= '<li><a href="' . $url . '">' . htmlspecialchars($item['engine']) . '</a></li>';
		} else {
			$tags .= '<li><span class="brand-card__tag--soon">Скоро в наличии</span></li>';
		}
		$html .= render_card(htmlspecialchars($item['engine']), $tags, $item['slug'] ? '/product/' . $item['slug'] : '');
	}
	return $html;
}

// Шаблон одной карточки
function render_card(string $title, string $tags_html, string $link_url = ''): string {
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