<?php
/**
 * 아코디언 컴포넌트
 * 접을 수 있는 콘텐츠 섹션을 표시하는 아코디언
 */

// 매개변수 설정 (기본값)
$items = $items ?? [];
$multiple = $multiple ?? false; // 여러 항목을 동시에 열 수 있는지
$class = $class ?? '';
$id = $id ?? 'accordion';
?>

<div class="accordion <?php echo htmlspecialchars($class); ?>" id="<?php echo htmlspecialchars($id); ?>" data-multiple="<?php echo $multiple ? 'true' : 'false'; ?>">
    
    <?php foreach ($items as $index => $item): ?>
        <div class="accordion__item">
            <button class="accordion__trigger" 
                    aria-expanded="false"
                    aria-controls="accordion-panel-<?php echo htmlspecialchars($id); ?>-<?php echo $index; ?>"
                    data-accordion-trigger>
                
                <span class="accordion__title"><?php echo htmlspecialchars($item['title']); ?></span>
                
                <?php if (isset($item['subtitle'])): ?>
                    <span class="accordion__subtitle"><?php echo htmlspecialchars($item['subtitle']); ?></span>
                <?php endif; ?>
                
                <span class="accordion__icon" aria-hidden="true">
                    <span class="accordion__icon--plus">+</span>
                    <span class="accordion__icon--minus">−</span>
                </span>
            </button>
            
            <div class="accordion__panel" 
                 id="accordion-panel-<?php echo htmlspecialchars($id); ?>-<?php echo $index; ?>"
                 aria-hidden="true">
                <div class="accordion__content">
                    <?php echo $item['content'] ?? ''; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
