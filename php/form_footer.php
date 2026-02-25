<?php

/* ---- Разрешаем только POST ---- */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	echo json_encode(['success' => false, 'message' => 'Method not allowed']);
	exit;
}

header('Content-Type: application/json; charset=utf-8');

/* ---- Получаем и чистим номер ---- */
$phone = trim($_POST['phone'] ?? '');
$phone = preg_replace('/[^\d+\-() ]/', '', $phone);

/* ---- Проверяем: ровно 10 цифр после кода страны ---- */
$digits = preg_replace('/\D/', '', $phone);
if (str_starts_with($digits, '7') || str_starts_with($digits, '8')) {
	$digits = substr($digits, 1);
}

if (strlen($digits) !== 10) {
	echo json_encode(['success' => false, 'message' => 'Некорректный номер телефона']);
	exit;
}

/* ---- Настройки письма ---- */
$to      = 'temp@mail.com';//<---------------------------------------------------------почта
$subject = 'Новая заявка ДВС Маркет';
$message = "Пользователь оставил заявку на обратный звонок.\n\nТелефон: {$phone}\n";
$headers = implode("\r\n", [
	'From: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Reply-To: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Content-Type: text/plain; charset=UTF-8',
	'X-Mailer: PHP/' . PHP_VERSION,
]);

/* ---- Отправляем ---- */
$sent = mail($to, $subject, $message, $headers);

if ($sent) {
	echo json_encode(['success' => true, 'message' => 'Спасибо! Мы перезвоним вам в ближайшее время.']);
} else {
	http_response_code(500);
	echo json_encode(['success' => false, 'message' => 'Ошибка отправки. Попробуйте позже.']);
}