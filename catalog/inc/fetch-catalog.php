<?php
// Настройки
define('SHEETS_API_KEY',  'AIzaSyCsG7dAlJsHkQflHRXdFRgdSFUQYpUIrHY');
define('SHEETS_ID',       '1xAUzMCM3qhb3YZHJvuQMD61qTEI3QoN7_RMIstP3xS4');
define('SHEETS_RANGE',    'stock');
define('CACHE_FILE',      __DIR__ . '/../cache/catalog.json');
define('CACHE_TTL',       1800); // 30 минут

/**
 * Возвращает данные каталога.
 * Сначала проверяет кеш, если устарел — тянет из Google Sheets.
 */
function get_catalog_data(): array {

	// Отдаём кеш если он свежий
	if (file_exists(CACHE_FILE) && (time() - filemtime(CACHE_FILE)) < CACHE_TTL) {
		$cached = file_get_contents(CACHE_FILE);
		if ($cached !== false) {
			return json_decode($cached, true) ?? [];
		}
	}

	// Запрос к Google Sheets API
	$url = sprintf(
		'https://sheets.googleapis.com/v4/spreadsheets/%s/values/%s?key=%s',
		SHEETS_ID,
		SHEETS_RANGE,
		SHEETS_API_KEY
	);

	$response = @file_get_contents($url);

	if ($response === false) {
		// Если запрос упал — отдаём старый кеш если есть
		if (file_exists(CACHE_FILE)) {
			return json_decode(file_get_contents(CACHE_FILE), true) ?? [];
		}
		return [];
	}

	$json = json_decode($response, true);

	if (empty($json['values'])) {
		return [];
	}

	// Парсим: первая строка — заголовки, остальные — данные
	$rows   = $json['values'];
	$header = array_shift($rows);
	$data   = [];

	foreach ($rows as $row) {
		// Дополняем строку пустыми значениями если колонок меньше чем заголовков
		$row    = array_pad($row, count($header), '');
		$data[] = array_combine($header, $row);
	}

	// Сохраняем кеш
	$cache_dir = dirname(CACHE_FILE);
	if (!is_dir($cache_dir)) {
		mkdir($cache_dir, 0755, true);
	}
	file_put_contents(CACHE_FILE, json_encode($data, JSON_UNESCAPED_UNICODE));

	return $data;
}