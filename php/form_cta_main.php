<?php

/* ---- Разрешаем только POST ---- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo json_encode(['success' => false, 'message' => 'Method not allowed']);
	exit;
}

header('Content-Type: application/json; charset=utf-8');

/* ---- Получаем и чистим данные ---- */
$name  = trim($_POST['name']  ?? '');
$phone = trim($_POST['phone'] ?? '');
$city  = trim($_POST['city']  ?? '');

$name  = preg_replace('/[^a-zA-Zа-яА-ЯёЁ\s\-]/u', '', $name);
$phone = preg_replace('/[^\d+\-() ]/', '', $phone);
$city  = preg_replace('/[^a-zA-Zа-яА-ЯёЁ\s\-]/u', '', $city);

/* ---- Валидация имени ---- */
if (mb_strlen($name) < 2) {
	echo json_encode(['success' => false, 'message' => 'Введите корректное имя']);
	exit;
}

/* ---- Валидация телефона ---- */
$digits = preg_replace('/\D/', '', $phone);
if (str_starts_with($digits, '7') || str_starts_with($digits, '8')) {
	$digits = substr($digits, 1);
}

if (strlen($digits) !== 10) {
	echo json_encode(['success' => false, 'message' => 'Введите корректный номер телефона']);
	exit;
}

/* ---- Валидация города ---- */
if (mb_strlen($city) < 2) {
	echo json_encode(['success' => false, 'message' => 'Введите корректный город']);
	exit;
}

/* ---- Настройки письма ---- */
$to      = 'temp@mail.com';//<---------------------------------------------------------почта
$subject = 'Новая заявка ДВС Маркет';
$message = "Новая заявка с сайта (CTA на главной странице).\n\nИмя: {$name}\nТелефон: {$phone}\nГород: {$city}\n";
$headers = implode("\r\n", [
	'From: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Reply-To: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Content-Type: text/plain; charset=UTF-8',
	'X-Mailer: PHP/' . PHP_VERSION,
]);

/* ---- Отправляем ---- */
$sent = mail($to, $subject, $message, $headers);

if ($sent) {
	echo json_encode(['success' => true, 'message' => 'Спасибо! Мы свяжемся с вами в ближайшее время.']);
} else {
	http_response_code(500);
	echo json_encode(['success' => false, 'message' => 'Ошибка отправки. Попробуйте позже.']);
}