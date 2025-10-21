<?php
// 문의 페이지
// PHP 8.4, UTF-8 인코딩

// 폼 처리 로직
$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // CSRF 토큰 검증 (간단한 구현)
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== 'contact_form_token') {
        $error = '잘못된 요청입니다.';
    } else {
        // 입력 데이터 검증 및 정리
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $phone = trim($_POST['phone'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message_content = trim($_POST['message'] ?? '');
        
        // 필수 필드 검증
        if (empty($name) || empty($email) || empty($subject) || empty($message_content)) {
            $error = '모든 필수 필드를 입력해주세요.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = '올바른 이메일 주소를 입력해주세요.';
        } else {
            // XSS 방지를 위한 HTML 이스케이프
            $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
            $subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
            $message_content = htmlspecialchars($message_content, ENT_QUOTES, 'UTF-8');
            
            // 이메일 발송
            $to = 'info@jungeum.com';
            $email_subject = '[정음 문의] ' . $subject;
            $email_body = "
문의자: {$name}
이메일: {$email}
전화번호: {$phone}
제목: {$subject}

메시지:
{$message_content}

---
이 메시지는 정음 웹사이트 문의 폼을 통해 발송되었습니다.
발송 시간: " . date('Y-m-d H:i:s') . "
";
            
            $headers = [
                'From: ' . $email,
                'Reply-To: ' . $email,
                'X-Mailer: PHP/' . phpversion(),
                'Content-Type: text/plain; charset=UTF-8'
            ];
            
            if (mail($to, $email_subject, $email_body, implode("\r\n", $headers))) {
                $message = '문의가 성공적으로 전송되었습니다. 빠른 시일 내에 답변드리겠습니다.';
                // 폼 초기화
                $name = $email = $phone = $subject = $message_content = '';
            } else {
                $error = '메일 발송에 실패했습니다. 다시 시도해주세요.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문의 - 정음</title>
    <meta name="description" content="정음에 대한 문의사항을 남겨주세요.">
    
    <!-- 웹폰트 로드 -->
    <link rel="stylesheet" href="css/webfonts.css">
    
    <!-- 기본 스타일시트 -->
    <link rel="stylesheet" href="css/main.css">
    
    <!-- 파비콘 -->
    <link rel="icon" type="image/svg+xml" href="assets/images/common/logo-jungeum.svg">
</head>
<body>
    <!-- 헤더 컴포넌트 -->
    <?php include 'components/header.php'; ?>
    
    <!-- 메인 콘텐츠 영역 -->
    <main class="main-content">
        <!-- 페이지 헤더 -->
        <section class="page-header">
            <div class="container">
                <h1 class="page-title">문의하기</h1>
                <p class="page-description">정음에 대한 문의사항이나 제안사항이 있으시면 언제든지 연락주세요.</p>
            </div>
        </section>
        
        <!-- 문의 폼 섹션 -->
        <section class="contact-form-section">
            <div class="container">
                <div class="contact-form-wrapper">
                    <!-- 성공/오류 메시지 -->
                    <?php if ($message): ?>
                        <div class="alert alert-success">
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($error): ?>
                        <div class="alert alert-error">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- 문의 폼 -->
                    <form class="contact-form" method="POST" action="">
                        <input type="hidden" name="csrf_token" value="contact_form_token">
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name" class="form-label">이름 *</label>
                                <input type="text" id="name" name="name" class="form-input" 
                                       value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                                       required>
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">이메일 *</label>
                                <input type="email" id="email" name="email" class="form-input" 
                                       value="<?php echo htmlspecialchars($email ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                                       required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="form-label">전화번호</label>
                            <input type="tel" id="phone" name="phone" class="form-input" 
                                   value="<?php echo htmlspecialchars($phone ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">제목 *</label>
                            <input type="text" id="subject" name="subject" class="form-input" 
                                   value="<?php echo htmlspecialchars($subject ?? '', ENT_QUOTES, 'UTF-8'); ?>" 
                                   required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message" class="form-label">메시지 *</label>
                            <textarea id="message" name="message" class="form-textarea" rows="6" 
                                      required><?php echo htmlspecialchars($message_content ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">문의 보내기</button>
                            <button type="reset" class="btn">초기화</button>
                        </div>
                    </form>
                </div>
                
                <!-- 연락처 정보 -->
                <div class="contact-info">
                    <h3 class="contact-info-title">연락처 정보</h3>
                    <div class="contact-info-grid">
                        <div class="contact-info-item">
                            <h4>주소</h4>
                            <p>서울특별시 강남구 테헤란로 123</p>
                        </div>
                        <div class="contact-info-item">
                            <h4>전화</h4>
                            <p>02-1234-5678</p>
                        </div>
                        <div class="contact-info-item">
                            <h4>이메일</h4>
                            <p>info@jungeum.com</p>
                        </div>
                        <div class="contact-info-item">
                            <h4>운영시간</h4>
                            <p>화-일 10:00 - 18:00<br>(월요일 휴관)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
    <!-- 푸터 컴포넌트 -->
    <?php include 'components/footer.php'; ?>
    
    <!-- JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>

<style>
/* 문의 페이지 스타일 */
.page-header {
    padding: 6rem 0 4rem;
    background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
    text-align: center;
}

.page-title {
    font-size: 3rem;
    margin-bottom: 1rem;
    color: #333;
}

.page-description {
    font-size: 1.25rem;
    color: #666;
    max-width: 600px;
    margin: 0 auto;
}

.contact-form-section {
    padding: 4rem 0;
}

.contact-form-wrapper {
    max-width: 800px;
    margin: 0 auto;
    background-color: #fff;
    padding: 3rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

/* 알림 메시지 */
.alert {
    padding: 1rem;
    margin-bottom: 2rem;
    border-radius: 8px;
    font-weight: 500;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* 폼 스타일 */
.contact-form {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-label {
    font-family: "JASOSansBold", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-weight: 700;
    font-size: 1rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.form-input,
.form-textarea {
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 1rem;
    font-family: "JASOSansRegular", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    transition: border-color 0.3s ease;
}

.form-input:focus,
.form-textarea:focus {
    outline: none;
    border-color: #333;
}

.form-textarea {
    resize: vertical;
    min-height: 120px;
}

.form-actions {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
}

/* 연락처 정보 */
.contact-info {
    margin-top: 4rem;
    text-align: center;
}

.contact-info-title {
    font-size: 2rem;
    margin-bottom: 2rem;
    color: #333;
}

.contact-info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    max-width: 800px;
    margin: 0 auto;
}

.contact-info-item h4 {
    font-size: 1.25rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.contact-info-item p {
    color: #666;
    line-height: 1.6;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
    .page-title {
        font-size: 2.5rem;
    }
    
    .page-description {
        font-size: 1.1rem;
    }
    
    .contact-form-wrapper {
        padding: 2rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .contact-info-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .page-header {
        padding: 4rem 0 2rem;
    }
    
    .page-title {
        font-size: 2rem;
    }
    
    .contact-form-wrapper {
        padding: 1.5rem;
    }
}
</style>
