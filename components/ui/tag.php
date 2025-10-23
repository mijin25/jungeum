<?php
// components/ui/tag.php
// 피그마 디자인에 맞는 태그 컴포넌트

// 데이터 중심 접근: $data 배열에서 모든 값 추출
$text = $data['text'] ?? '현재\n전시';
$type = $data['type'] ?? 'current'; // current, upcoming, past, image-over
$size = $data['size'] ?? 'medium'; // small, medium, large

$tag_classes = ['tag'];
$tag_classes[] = 'tag--' . htmlspecialchars($type);
$tag_classes[] = 'tag--' . htmlspecialchars($size);
?>

<span class="<?php echo implode(' ', $tag_classes); ?>">
    <span class="tag__text"><?php echo nl2br(htmlspecialchars($text)); ?></span>
</span>