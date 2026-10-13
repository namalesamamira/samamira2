<?php
header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'This endpoint only accepts POST requests.'
    ]);
    exit;
}

// Honeypot: real users never see or fill this field, bots usually do.
if (!empty($_POST['website'])) {
    echo json_encode([
        'success' => true,
        'message' => 'Your message was sent successfully. We will get back to you soon.'
    ]);
    exit;
}

function clean_value($value) {
    if (is_array($value)) {
        $value = implode(', ', array_map('clean_value', $value));
    }
    return trim((string) $value);
}

function format_label($key) {
    return ucwords(str_replace(['_', '-'], ' ', $key));
}

$fields = [];
foreach ($_POST as $key => $value) {
    if ($key === 'website') {
        continue;
    }
    $fields[$key] = clean_value($value);
}

$errors = [];
$reply_to = '';

foreach ($fields as $key => $value) {
    if (stripos($key, 'email') === false) {
        continue;
    }

    if ($key === 'email' && $value === '') {
        $errors[$key] = 'Please enter your email address.';
    } elseif ($value !== '' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $errors[$key] = 'Please enter a valid email address.';
    } elseif ($value !== '' && $reply_to === '') {
        $reply_to = $value;
    }
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address and try again.',
        'errors' => $errors
    ]);
    exit;
}

$to = 'namalesamamira@gmail.com';
$subject = 'New Aqueous form submission from website';

$body = "<html><body>\n<h2>New Aqueous form submission</h2>\n";
foreach ($fields as $key => $value) {
    $label = htmlspecialchars(format_label($key), ENT_QUOTES, 'UTF-8');
    $safe_value = nl2br(htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
    $body .= "<p><strong>{$label}:</strong> {$safe_value}</p>\n";
}
$body .= "</body></html>\n";

$headers = [
    'MIME-Version: 1.0',
    'Content-Type: text/html; charset=UTF-8',
    'From: Aqueous Website <noreply@aqueous.local>',
    'X-Mailer: PHP/' . phpversion()
];

if ($reply_to !== '') {
    $headers[] = 'Reply-To: ' . $reply_to;
}

$sent = mail($to, $subject, $body, implode("\r\n", $headers));

if ($sent) {
    echo json_encode([
        'success' => true,
        'message' => 'Your message was sent successfully. We will get back to you soon.'
    ]);
    exit;
}

http_response_code(500);
echo json_encode([
    'success' => false,
    'message' => 'There was a problem sending your message. Please try again or contact us directly.'
]);
