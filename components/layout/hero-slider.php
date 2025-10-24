<?php
// components/layout/hero-slider.php
// 히어로 슬라이더 컴포넌트

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$slides = $data['slides'] ?? [];
$current_slide = $data['current_slide'] ?? 0;
?>

<section class="hero-slider">
    <div class="hero-slider__slides">
        <?php foreach ($slides as $index => $slide): ?>
            <div class="hero-slide <?php echo $index === $current_slide ? 'hero-slide--active' : ''; ?>">
                <div class="hero-slide__image">
                    <picture>
                        <?php if (isset($slide['mobile_image'])): ?>
                            <source media="(max-width: 768px)" srcset="<?php echo htmlspecialchars($slide['mobile_image']); ?>">
                        <?php endif; ?>
                        <img src="<?php echo htmlspecialchars($slide['desktop_image']); ?>" alt="<?php echo htmlspecialchars($slide['alt'] ?? ''); ?>" <?php echo $index === 0 ? 'loading="eager"' : 'loading="lazy"'; ?>>
                    </picture>
                </div>
                <div class="hero-slide__content">
                    <div class="container">
                        <div class="hero-slide__info">
                            <?php if (isset($slide['title'])): ?>
                                <h1 class="hero-slide__title display-1"><?php echo htmlspecialchars($slide['title']); ?></h1>
                            <?php endif; ?>
                            <?php if (isset($slide['date'])): ?>
                                <p class="hero-slide__date heading-h4"><?php echo htmlspecialchars($slide['date']); ?></p>
                            <?php endif; ?>
                            <?php if (isset($slide['badge_image'])): ?>
                                <img src="<?php echo htmlspecialchars($slide['badge_image']); ?>" alt="한불수교 140주년" class="hero-slide__badge">
                            <?php endif; ?>
                        </div>
                        <?php if (isset($slide['show_category']) && $slide['show_category']): ?>
                            <span class="hero-slide__category heading-h4">전시</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- 슬라이더 컨트롤 -->
    <div class="hero-slider__controls">
        <div class="hero-slider__btns">
            <!-- 이전 버튼 -->
            <?php
            require_once __DIR__ . '/../../lib/SVGCache.php';
            $left_icon = SVGCache::get('common/icon-arrow-left.svg', ['width' => '32', 'height' => '32']);
            $prev_button_data = [
                'type' => 'control',
                'size' => 'large',
                'icon_svg' => $left_icon,
                'disabled' => false
            ];
            $data = $prev_button_data;
            echo '<div class="hero-slider__btn-wrapper hero-slider__btn-wrapper--prev">';
            include __DIR__ . '/../ui/buttons/button.php';
            echo '</div>';
            ?>
            
            <!-- 다음 버튼 -->
            <?php
            $right_icon = SVGCache::get('common/icon-arrow-right.svg', ['width' => '32', 'height' => '32']);
            $next_button_data = [
                'type' => 'control',
                'size' => 'large',
                'icon_svg' => $right_icon,
                'disabled' => false
            ];
            $data = $next_button_data;
            echo '<div class="hero-slider__btn-wrapper hero-slider__btn-wrapper--next">';
            include __DIR__ . '/../ui/buttons/button.php';
            echo '</div>';
            ?>
        </div>
    </div>
    
    <!-- 슬라이더 인디케이터 (숫자) -->
    <div class="hero-slider__indicator">
        <?php
        $indicator_data = [
            'current_page' => $current_slide + 1,
            'total_pages' => count($slides),
            'type' => 'numbers'
        ];
        $data = $indicator_data;
        include __DIR__ . '/navigation/page-indicator.php';
        ?>
    </div>
</section>

