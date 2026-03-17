<?php
/**
 * Строит дерево каталога из сырых строк таблицы.
 *
 * Результат:
 * [
 *   'Марка' => [
 *     'Модель' => [
 *       'Поколение' => [
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