<?php
/**
 * lib/mail_handler.php
 * 보안이 강화된 메일 처리 핸들러
 * XSS, CSRF, Header Injection 방어 포함
 */

// JSON 응답 헤더 설정
header('Content-Type: application/json; charset=utf-8');

// CORS 설정 (필요시)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// POST 요청만 허용
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// CSRF 토큰 검증 (세션 기반)
session_start();
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'CSRF token mismatch']);
    exit;
}

// 입력 데이터 검증 및 정제
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// 필수 필드 검증
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['ok' => false, 'error' => '필수 필드를 모두 입력해주세요.']);
    exit;
}

// 이메일 형식 검증
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['ok' => false, 'error' => '올바른 이메일 주소를 입력해주세요.']);
    exit;
}

// Header Injection 방어
$dangerous_headers = ["\r", "\n", "%0d", "%0a", "Content-Type:", "MIME-Version:", "X-Mailer:"];
foreach ([$name, $email, $phone, $subject, $message] as $field) {
    foreach ($dangerous_headers as $dangerous) {
        if (stripos($field, $dangerous) !== false) {
            echo json_encode(['ok' => false, 'error' => '잘못된 문자가 포함되어 있습니다.']);
            exit;
        }
    }
}

// XSS 방어: HTML 특수문자 이스케이프
$name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
$phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

// 이메일 내용 구성
$mail_subject = "[정음 문의] " . $subject;
$mail_body = "
문의자 정보:
- 이름: {$name}
- 이메일: {$email}
- 전화번호: {$phone}

제목: {$subject}

내용:
{$message}

---
이 메일은 정음 웹사이트 문의 폼을 통해 발송되었습니다.
발송 시간: " . date('Y-m-d H:i:s') . "
IP 주소: " . ($_SERVER['REMOTE_ADDR'] ?? 'Unknown') . "
";

// 이메일 발송 (실제 구현은 SMTP 라이브러리 사용 권장)
$to = 'info@jungeum.com'; // 운영자 이메일
$headers = [
    'From: noreply@jungeum.com',
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8'
];

// 메일 발송 시도
$mail_sent = mail($to, $mail_subject, $mail_body, implode("\r\n", $headers));

if ($mail_sent) {
    echo json_encode(['ok' => true, 'message' => '문의가 성공적으로 전송되었습니다.']);
} else {
    echo json_encode(['ok' => false, 'error' => '메일 발송에 실패했습니다. 잠시 후 다시 시도해주세요.']);
}
?>
