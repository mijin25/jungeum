<?php
// components/ui/tag.php
// 피그마 디자인에 맞는 태그 컴포넌트 (데이터 중심)

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$type = $data['type'] ?? 'exhibition'; // exhibition, event
$state = $data['state'] ?? 'current'; // current, upcoming
$position = $data['position'] ?? 'default'; // default, image-over

// 태그 텍스트 설정 (디자인 시스템 기반)
$tag_texts = [
    'exhibition' => [
        'current' => '현재\n전시',
        'upcoming' => '예정\n전시'
    ],
    'event' => [
        'current' => '현재',
        'upcoming' => '예정'
    ]
];

$tag_text = $tag_texts[$type][$state] ?? '';

// 태그 스타일 클래스 설정
$tag_classes = 'status-tag';
if ($position === 'image-over') {
    $tag_classes .= ' status-tag--image-over';
}
if ($type === 'exhibition') {
    $tag_classes .= ' status-tag--exhibition';
} else {
    $tag_classes .= ' status-tag--event';
}
if ($state === 'current') {
    $tag_classes .= ' status-tag--current';
} else {
    $tag_classes .= ' status-tag--upcoming';
}
?>

<div class="<?php echo htmlspecialchars($tag_classes); ?>">
    <?php if ($type === 'exhibition'): ?>
        <div class="status-tag__content">
            <p class="status-tag__line1"><?php echo htmlspecialchars(explode('\n', $tag_text)[0]); ?></p>
            <p class="status-tag__line2"><?php echo htmlspecialchars(explode('\n', $tag_text)[1]); ?></p>
        </div>
    <?php else: ?>
        <p class="status-tag__text"><?php echo htmlspecialchars($tag_text); ?></p>
    <?php endif; ?>
</div>