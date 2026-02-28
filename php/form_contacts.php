<?php
/* ===== contact form handler ===== */

/* only POST allowed */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	http_response_code(405);
	exit('Method Not Allowed');
}

/* sanitize input */
$name    = trim(strip_tags($_POST['name']    ?? ''));
$email   = trim(strip_tags($_POST['email']   ?? ''));
$phone   = trim(strip_tags($_POST['phone']   ?? ''));
$message = trim(strip_tags($_POST['message'] ?? ''));

/* basic server-side validation */
if (strlen($name) < 2 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	http_response_code(422);
	exit('Invalid data');
}

$to      = 'temp@mail.com';//<--------------------------------------------почта
$subject = 'Новая заявка ДВС Маркет';
$headers = implode("\r\n", [
	'From: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Reply-To: noreply@' . ($_SERVER['HTTP_HOST'] ?? 'localhost'),
	'Content-Type: text/plain; charset=UTF-8',
	'X-Mailer: PHP/' . PHP_VERSION,
]);

/* plain-text body */
$body  = "Новая заявка с сайта (страница 'Контакты').\n";
$body  = "Имя: {$name}\n";
$body .= "Email: {$email}\n";
$body .= "Телефон: {$phone}\n";
$body .= "Сообщение:\n{$message}\n";

/* send */
$sent = mail($to, $subject, $body, $headers);

http_response_code($sent ? 200 : 500);