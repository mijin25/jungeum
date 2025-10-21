<?php
/**
 * 섹션 컴포넌트
 * 페이지의 섹션을 구성하는 재사용 가능한 레이아웃
 */

// 매개변수 설정 (기본값)
$title = $title ?? '';
$subtitle = $subtitle ?? '';
$description = $description ?? '';
$class = $class ?? '';
$id = $id ?? '';
$background = $background ?? 'default'; // default, light, dark, accent
$padding = $padding ?? 'large'; // small, medium, large, xlarge
$container = $container ?? true;
?>

<section class="section section--<?php echo htmlspecialchars($background); ?> section--padding-<?php echo htmlspecialchars($padding); ?> <?php echo htmlspecialchars($class); ?>" 
         <?php echo $id ? 'id="' . htmlspecialchars($id) . '"' : ''; ?>>
    
    <?php if ($container): ?>
        <div class="container">
    <?php endif; ?>
    
        <?php if ($title || $subtitle || $description): ?>
            <div class="section__header">
                <?php if ($subtitle): ?>
                    <p class="section__subtitle"><?php echo htmlspecialchars($subtitle); ?></p>
                <?php endif; ?>
                
                <?php if ($title): ?>
                    <h2 class="section__title"><?php echo htmlspecialchars($title); ?></h2>
                <?php endif; ?>
                
                <?php if ($description): ?>
                    <p class="section__description"><?php echo htmlspecialchars($description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <div class="section__content">
            <?php echo $content ?? ''; ?>
        </div>
    
    <?php if ($container): ?>
        </div>
    <?php endif; ?>
</section>
