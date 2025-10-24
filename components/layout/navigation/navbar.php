<?php
// 네비게이션 바 컴포넌트 (GitHub 참고 버전)
// components/layout/navigation/navbar.php

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$menu_items = $data['menu_items'] ?? [];
$current_page = $data['current_page'] ?? '';
$base_path = $data['base_path'] ?? '';
?>
<!-- 네비게이션 바 -->
<nav class="navbar" id="navbar">
    <!-- 메인 메뉴 바 -->
    <div class="navbar-container">
        <!-- 로고 -->
        <a href="<?php echo $base_path; ?>index.php" class="navbar-logo">
            <img src="<?php echo $base_path; ?>assets/images/common/logo-jungeum.svg" alt="정음" style="height: 24px;">
        </a>
        
        <!-- 데스크톱 메뉴 -->
        <ul class="navbar-menu">
            <?php foreach ($menu_items as $label => $item): ?>
                <?php 
                // $item이 배열이면 서브메뉴가 있는 메뉴, 문자열이면 일반 메뉴
                $has_submenu = is_array($item);
                $page = $has_submenu ? $item['url'] : $item;
                $submenu_id = $has_submenu ? $item['submenu_id'] ?? '' : '';
                ?>
                <li class="navbar-menu-item <?php echo $has_submenu ? 'has-submenu' : ''; ?>" <?php echo $has_submenu ? 'data-submenu="' . htmlspecialchars($submenu_id) . '"' : ''; ?>>
                    <a href="<?php echo htmlspecialchars($page . '.php'); ?>" 
                       class="<?php echo $current_page === $page ? 'active' : ''; ?>">
                        <?php echo htmlspecialchars($label); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- 모바일 메뉴 토글 버튼 -->
        <button class="navbar-toggle" id="navbar-toggle" aria-label="메뉴 열기">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    
    <!-- 서브메뉴 영역 (전체 너비) -->
    <?php foreach ($menu_items as $label => $item): ?>
        <?php 
        $has_submenu = is_array($item);
        $submenu_id = $has_submenu ? ($item['submenu_id'] ?? '') : '';
        $submenu = $has_submenu ? ($item['submenu'] ?? []) : [];
        ?>
        <?php if ($has_submenu && !empty($submenu)): ?>
            <div class="navbar-submenu-group" data-parent="<?php echo htmlspecialchars($submenu_id); ?>">
                <div class="navbar-submenu-items">
                    <?php foreach ($submenu as $sub_label => $sub_url): ?>
                        <a href="<?php echo htmlspecialchars($sub_url . '.php'); ?>" class="navbar-submenu-item">
                            <?php echo htmlspecialchars($sub_label); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    
    <!-- 모바일 메뉴 -->
    <div class="navbar-mobile-menu" id="navbar-mobile-menu">
        <ul class="navbar-mobile-list">
            <?php foreach ($menu_items as $label => $item): ?>
                <?php 
                $has_submenu = is_array($item);
                $page = $has_submenu ? $item['url'] : $item;
                $submenu = $has_submenu ? ($item['submenu'] ?? []) : [];
                ?>
                <li class="navbar-mobile-item">
                    <a href="<?php echo htmlspecialchars($page . '.php'); ?>">
                        <?php echo htmlspecialchars($label); ?>
                    </a>
                    <?php if ($has_submenu && !empty($submenu)): ?>
                        <ul class="navbar-mobile-submenu">
                            <?php foreach ($submenu as $sub_label => $sub_url): ?>
                                <li>
                                    <a href="<?php echo htmlspecialchars($sub_url . '.php'); ?>">
                                        <?php echo htmlspecialchars($sub_label); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- SNS 링크 -->
        <div class="navbar-mobile-sns">
            <?php
            $svgcache_path = realpath(__DIR__ . '/../../lib/SVGCache.php');
            if ($svgcache_path) {
                require_once $svgcache_path;
            }
            ?>
            <a href="#" aria-label="인스타그램">
                <?php echo SVGCache::get('common/icon-social-instagram.svg', ['width' => '24', 'height' => '24']); ?>
            </a>
            <a href="#" aria-label="페이스북">
                <?php echo SVGCache::get('common/icon-social-facebook.svg', ['width' => '24', 'height' => '24']); ?>
            </a>
            <a href="#" aria-label="유튜브">
                <?php echo SVGCache::get('common/icon-social-youtube.svg', ['width' => '24', 'height' => '24']); ?>
            </a>
        </div>
    </div>
</nav>

