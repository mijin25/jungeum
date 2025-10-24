<?php
// components/layout/navigation/main-navigation.php
// 메인 네비게이션 컴포넌트 (피그마 디자인 기반)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$menu_items = $data['menu_items'] ?? [];
$current_page = $data['current_page'] ?? '';
?>

<nav class="main-navigation" role="navigation" aria-label="메인 네비게이션">
    <ul class="nav-list">
        <?php foreach ($menu_items as $label => $item): ?>
            <?php 
            // $item이 배열이면 서브메뉴가 있는 메뉴, 문자열이면 일반 메뉴
            $has_submenu = is_array($item);
            $page = $has_submenu ? $item['url'] : $item;
            $submenu = $has_submenu ? ($item['submenu'] ?? []) : [];
            ?>
            <li class="nav-item <?php echo $has_submenu ? 'nav-item--has-submenu' : ''; ?>">
                <a 
                    href="<?php echo htmlspecialchars($page . '.php'); ?>" 
                    class="nav-link <?php echo $current_page === $page ? 'nav-link--active' : ''; ?>"
                    <?php echo $current_page === $page ? 'aria-current="page"' : ''; ?>
                >
                    <?php echo htmlspecialchars($label); ?>
                </a>
                
                <?php if ($has_submenu && !empty($submenu)): ?>
                    <ul class="nav-submenu">
                        <?php foreach ($submenu as $sub_label => $sub_url): ?>
                            <li class="nav-submenu__item">
                                <a href="<?php echo htmlspecialchars($sub_url . '.php'); ?>" class="nav-submenu__link">
                                    <?php echo htmlspecialchars($sub_label); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

