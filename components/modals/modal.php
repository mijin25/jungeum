<?php
/**
 * 모달 컴포넌트
 * 팝업, 다이얼로그 등을 위한 재사용 가능한 모달
 */

// 매개변수 설정 (기본값)
$id = $id ?? 'modal';
$title = $title ?? '';
$size = $size ?? 'medium'; // small, medium, large, fullscreen
$closable = $closable ?? true;
$backdrop = $backdrop ?? true;
$class = $class ?? '';
?>

<div class="modal" id="<?php echo htmlspecialchars($id); ?>" 
     data-backdrop="<?php echo $backdrop ? 'true' : 'false'; ?>"
     style="display: none;">
    
    <div class="modal__backdrop"></div>
    
    <div class="modal__container modal__container--<?php echo htmlspecialchars($size); ?>">
        <div class="modal__content <?php echo htmlspecialchars($class); ?>">
            
            <?php if ($title || $closable): ?>
                <div class="modal__header">
                    <?php if ($title): ?>
                        <h3 class="modal__title"><?php echo htmlspecialchars($title); ?></h3>
                    <?php endif; ?>
                    
                    <?php if ($closable): ?>
                        <button class="modal__close" aria-label="모달 닫기">
                            <span class="close-icon">×</span>
                        </button>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <div class="modal__body">
                <?php echo $content ?? ''; ?>
            </div>
            
            <?php if (isset($footer)): ?>
                <div class="modal__footer">
                    <?php echo $footer; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
