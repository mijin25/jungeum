<?php
/**
 * 알림 컴포넌트
 * 성공, 경고, 오류, 정보 메시지를 표시하는 알림
 */

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$type = $data['type'] ?? 'info'; // success, warning, error, info
$title = $data['title'] ?? '';
$message = $data['message'] ?? '';
$dismissible = $data['dismissible'] ?? true;
$icon = $data['icon'] ?? true;
$class = $data['class'] ?? '';
?>

<div class="alert alert--<?php echo htmlspecialchars($type); ?> <?php echo $dismissible ? 'alert--dismissible' : ''; ?> <?php echo htmlspecialchars($class); ?>" role="alert">
    
    <?php if ($icon): ?>
        <div class="alert__icon">
            <?php 
            switch($type) {
                case 'success':
                    echo '<span class="icon-success">✅</span>';
                    break;
                case 'warning':
                    echo '<span class="icon-warning">⚠️</span>';
                    break;
                case 'error':
                    echo '<span class="icon-error">❌</span>';
                    break;
                case 'info':
                default:
                    echo '<span class="icon-info">ℹ️</span>';
                    break;
            }
            ?>
        </div>
    <?php endif; ?>
    
    <div class="alert__content">
        <?php if ($title): ?>
            <h4 class="alert__title"><?php echo htmlspecialchars($title); ?></h4>
        <?php endif; ?>
        
        <?php if ($message): ?>
            <p class="alert__message"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>
        
        <?php if (isset($content)): ?>
            <div class="alert__body">
                <?php echo $content; ?>
            </div>
        <?php endif; ?>
    </div>
    
    <?php if ($dismissible): ?>
        <button class="alert__close" aria-label="알림 닫기">
            <span class="close-icon">×</span>
        </button>
    <?php endif; ?>
</div>
