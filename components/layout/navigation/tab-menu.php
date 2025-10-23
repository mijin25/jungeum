<?php
// components/navigation/tab-menu.php
// 피그마 디자인에 맞는 탭 메뉴 컴포넌트

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$tabs = $data['tabs'] ?? [];
$active_tab = $data['active_tab'] ?? 0; // 0부터 시작하는 인덱스

if (empty($tabs)) {
    return; // 탭이 없으면 아무것도 렌더링하지 않음
}
?>

<div class="tab-menu">
    <div class="tab-menu__container">
        <?php foreach ($tabs as $index => $tab): ?>
            <a
                href="<?php echo htmlspecialchars($tab['url']); ?>"
                class="tab-menu__item <?php echo $index === $active_tab ? 'tab-menu__item--active' : ''; ?>"
                aria-current="<?php echo $index === $active_tab ? 'page' : 'false'; ?>"
            >
                <?php echo htmlspecialchars($tab['label']); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
