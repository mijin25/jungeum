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
        'current' => '현재 전시',
        'upcoming' => '예정 전시'
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
    <p class="status-tag__text"><?php echo htmlspecialchars($tag_text); ?></p>
</div>

<style>
/* 태그 컴포넌트 스타일 - 피그마 디자인 기반 */
.status-tag {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 6px 16px;
    border-radius: 9999px;
    font-family: "JASOSansRegular", "Pretendard Variable", -apple-system, BlinkMacSystemFont, 'Apple SD Gothic Neo', 'Malgun Gothic', 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.2;
    letter-spacing: -0.56px;
    text-align: center;
    color: #FFFFFF;
    white-space: nowrap;
    transition: all 0.3s ease;
}

/* 전시 태그 스타일 */
.status-tag--exhibition {
    width: 64px;
    height: 64px;
    flex-direction: column;
    gap: 4px;
}

/* 이벤트 태그 스타일 */
.status-tag--event {
    min-width: auto;
    height: auto;
}

/* 현재 상태 스타일 */
.status-tag--current {
    background-color: #FF624C; /* jungeum/orange */
}

/* 예정 상태 스타일 */
.status-tag--upcoming {
    background-color: #F2A32A; /* jungeum/yellow */
}

/* 이미지 오버레이 위치 */
.status-tag--image-over {
    position: absolute;
    top: 16px;
    right: 16px;
    z-index: 10;
}

/* 태그 텍스트 */
.status-tag__text {
    margin: 0;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.2;
    letter-spacing: -0.56px;
    color: inherit;
}

/* 반응형 디자인 */
@media (max-width: 768px) {
    .status-tag {
        font-size: 12px;
        padding: 4px 12px;
    }
    
    .status-tag--exhibition {
        width: 56px;
        height: 56px;
    }
    
    .status-tag--image-over {
        top: 12px;
        right: 12px;
    }
}

@media (max-width: 480px) {
    .status-tag {
        font-size: 11px;
        padding: 3px 10px;
    }
    
    .status-tag--exhibition {
        width: 48px;
        height: 48px;
    }
}
</style>