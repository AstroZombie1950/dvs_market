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