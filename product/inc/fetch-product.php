<?php
/**
 * Загрузка данных товара по slug.
 * Переиспользует get_catalog_data() и общий кеш из каталога.
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/catalog/inc/fetch-catalog.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/catalog/inc/build-catalog.php';

/**
 * Ищет товар по slug в данных каталога.
 * Возвращает ассоциативный массив строки или null.
 */
function get_product_by_slug(string $slug): ?array {
	$data = get_catalog_data();

	foreach ($data as $row) {
		if (isset($row['SLUG']) && trim($row['SLUG']) === $slug) {
			return $row;
		}
	}

	return null;
}

/**
 * Строит массив подстановок INSERT_* → значения из строки таблицы.
 * Возвращает ['INSERT_TITLE' => '...', 'INSERT_CAR_BRAND' => '...', ...]
 */
function build_replacements(array $row): array {
	/* Изображения: разбиваем строку через запятую */
	$images_raw = trim($row['Изображения (список)'] ?? '');
	$images = $images_raw
		? array_map('trim', explode(',', $images_raw))
		: [];

	/* Placeholder если картинок нет */
	$placeholder = '/img/product-placeholder.png';

	/* Хлебные крошки — URL-и через to_slug() */
	$brand      = trim($row['Марка авто'] ?? '');
	$model      = trim($row['Модель авто'] ?? '');
	$generation = trim($row['Поколение авто'] ?? '');

	$brand_slug = to_slug($brand);
	$model_slug = to_slug($model);
	$gen_slug   = to_slug($generation);

	return [
		/* meta / head */
		'INSERT_TITLE'        => trim($row['Заголовок'] ?? ''),
		'INSERT_META_DESC'    => trim($row['МЕТА-описание'] ?? ''),
		'INSERT_KEYWORDS'     => trim($row['МЕТА-ключевые'] ?? ''),
		'INSERT_OG_DESC'      => trim($row['OG-описание'] ?? ''),

		/* изображения */
		'INSERT_ENGINE_IMG_1' => $images[0] ?? $placeholder,
		'INSERT_ENGINE_IMG_2' => $images[1] ?? $placeholder,
		'INSERT_ENGINE_IMG_3' => $images[2] ?? $placeholder,
		'INSERT_ENGINE_IMG_4' => $images[3] ?? $placeholder,

		/* авто */
		'INSERT_CAR_BRAND'      => htmlspecialchars($brand),
		'INSERT_CAR_MODEL'      => htmlspecialchars($model),
		'INSERT_CAR_GENERATION' => htmlspecialchars($generation),

		/* двигатель */
		'INSERT_ENGINE_MODEL_NAME'   => htmlspecialchars(trim($row['Номер ДВС'] ?? '')),
		'INSERT_ENGINE_SHORT_DESC'   => htmlspecialchars(trim($row['Короткое описание'] ?? '')),
		'INSERT_ENGINE_DESC'         => nl2br(htmlspecialchars(trim($row['Описание'] ?? ''))),
		'INSERT_PRICE'               => trim($row['Цена'] ?? ''),
		'INSERT_ENGINE_VOLUME'       => trim($row['Объем (в литрах)'] ?? ''),
		'INSERT_ENGINE_VALUE_EXT'    => trim($row['Объем (в см^3)'] ?? ''),
		'INSERT_ENGINE_HP'           => trim($row['Мощность (л.с.)'] ?? ''),
		'INSERT_ENGINE_TYPE'         => htmlspecialchars(trim($row['Тип ДВС'] ?? '')),
		'INSERT_ENGINE_NUM_VALVES'   => trim($row['Кол-во клапанов'] ?? ''),
		'INSERT_ENG_CYL_DIA'         => trim($row['Диаметр цилиндра (мм)'] ?? ''),
		'INSERT_ENGINE_PISTON_STROKE'=> trim($row['Ход поршня (мм)'] ?? ''),
		'INSERT_ENGINE_POWER_TYPE'   => htmlspecialchars(trim($row['Система питания'] ?? '')),
		'INSERT_ENGINE_TORQUE'       => trim($row['Крутящий момент (Hm)'] ?? ''),
		'INSERT_ENGINE_COMP_RATIO'   => trim($row['Степень сжатия'] ?? ''),
		'INSERT_ENGINE_FUEL_TYPE'    => htmlspecialchars(trim($row['Тип топлива'] ?? '')),
		'INSERT_ENGINE_ECO_TYPE'     => htmlspecialchars(trim($row['Экологические нормы'] ?? '')),

		/* FAQ-ответы */
		'INSERT_ANSWER_1' => htmlspecialchars(trim($row['Вопрос 1 (На какие автомобили подходит двигатель ХХХ?)'] ?? '')),
		'INSERT_ANSWER_2' => htmlspecialchars(trim($row['Вопрос 2 (Какие документы идут вместе с двигателем ХХХ?)'] ?? '')),
		'INSERT_ANSWER_3' => htmlspecialchars(trim($row['Вопрос 3 (Какая гарантия на новый двигатель ХХХ и как проходит доставка?)'] ?? '')),

		/* хлебные крошки — URL */
		'BREADCRUMB_BRAND_URL' => '/catalog/' . $brand_slug . '/',
		'BREADCRUMB_MODEL_URL' => '/catalog/' . $brand_slug . '/' . $model_slug . '/',
		'BREADCRUMB_GEN_URL'   => '/catalog/' . $brand_slug . '/' . $model_slug . '/' . $gen_slug . '/',
	];
}