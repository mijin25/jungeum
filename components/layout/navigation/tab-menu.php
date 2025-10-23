<?php
// components/navigation/tab-menu.php
// 피그마 디자인에 맞는 탭 메뉴 컴포넌트

// 필요한 변수: $tabs (배열), $active_tab (기본 0)
// $tabs = [
//     ['label' => '현재 & 예정 전시', 'url' => 'exhibitions.php?status=current'],
//     ['label' => '과거 전시', 'url' => 'exhibitions.php?status=past'],
// ];
$tabs = $tabs ?? [];
$active_tab = $active_tab ?? 0; // 0부터 시작하는 인덱스

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
