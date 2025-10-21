<?php
/**
 * 문의 폼 컴포넌트
 * 문의하기 페이지에서 사용하는 완전한 폼
 */

// CSRF 토큰 생성
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 폼 데이터 처리
$form_data = [
    'name' => $_POST['name'] ?? '',
    'email' => $_POST['email'] ?? '',
    'subject' => $_POST['subject'] ?? '',
    'message' => $_POST['message'] ?? ''
];

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF 토큰 검증
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $errors['general'] = '보안 토큰이 유효하지 않습니다.';
    } else {
        // 입력값 검증
        if (empty($form_data['name'])) {
            $errors['name'] = '이름을 입력해주세요.';
        }
        
        if (empty($form_data['email'])) {
            $errors['email'] = '이메일을 입력해주세요.';
        } elseif (!filter_var($form_data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = '유효한 이메일 주소를 입력해주세요.';
        }
        
        if (empty($form_data['subject'])) {
            $errors['subject'] = '제목을 입력해주세요.';
        }
        
        if (empty($form_data['message'])) {
            $errors['message'] = '메시지를 입력해주세요.';
        }
        
        // 오류가 없으면 이메일 발송
        if (empty($errors)) {
            $to = "info@jungeum.org";
            $subject = "문의: " . $form_data['subject'];
            $message = "이름: " . $form_data['name'] . "\n";
            $message .= "이메일: " . $form_data['email'] . "\n";
            $message .= "제목: " . $form_data['subject'] . "\n";
            $message .= "메시지:\n" . $form_data['message'] . "\n";
            
            $headers = "From: " . $form_data['name'] . " <" . $form_data['email'] . ">\r\n";
            $headers .= "Reply-To: " . $form_data['email'] . "\r\n";
            $headers .= "Content-type: text/plain; charset=UTF-8\r\n";
            
            if (mail($to, $subject, $message, $headers)) {
                $success = true;
                $form_data = ['name' => '', 'email' => '', 'subject' => '', 'message' => ''];
            } else {
                $errors['general'] = '메일 발송에 실패했습니다. 다시 시도해주세요.';
            }
        }
    }
}
?>

<div class="contact-form">
    <div class="contact-form__header">
        <h2 class="contact-form__title">문의하기</h2>
        <p class="contact-form__description">
            궁금한 점이 있으시면 언제든지 문의해주세요. 빠른 시일 내에 답변드리겠습니다.
        </p>
    </div>
    
    <?php if ($success): ?>
        <div class="contact-form__success">
            <div class="success-message">
                <span class="success-icon">✅</span>
                <span class="success-text">문의가 성공적으로 전송되었습니다. 빠른 시일 내에 답변드리겠습니다.</span>
            </div>
        </div>
    <?php endif; ?>
    
    <?php if (isset($errors['general'])): ?>
        <div class="contact-form__error">
            <div class="error-message">
                <span class="error-icon">⚠️</span>
                <span class="error-text"><?php echo htmlspecialchars($errors['general']); ?></span>
            </div>
        </div>
    <?php endif; ?>
    
    <form class="contact-form__form" method="POST" action="">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
        
        <div class="form-row">
            <div class="form-col form-col--6">
                <?php include 'components/forms/input.php'; 
                $name = 'name';
                $label = '이름';
                $type = 'text';
                $required = true;
                $value = $form_data['name'];
                $error = $errors['name'] ?? '';
                ?>
            </div>
            <div class="form-col form-col--6">
                <?php 
                $name = 'email';
                $label = '이메일';
                $type = 'email';
                $required = true;
                $value = $form_data['email'];
                $error = $errors['email'] ?? '';
                include 'components/forms/input.php';
                ?>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col">
                <?php 
                $name = 'subject';
                $label = '제목';
                $type = 'text';
                $required = true;
                $value = $form_data['subject'];
                $error = $errors['subject'] ?? '';
                include 'components/forms/input.php';
                ?>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col">
                <?php 
                $name = 'message';
                $label = '메시지';
                $type = 'textarea';
                $required = true;
                $value = $form_data['message'];
                $error = $errors['message'] ?? '';
                $placeholder = '문의 내용을 자세히 작성해주세요.';
                include 'components/forms/input.php';
                ?>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-col">
                <div class="form-actions">
                    <button type="submit" class="btn btn--primary btn--large">
                        <span class="btn__text">문의 보내기</span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
