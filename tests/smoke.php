<?php
/**
 * tests/smoke.php
 * 프로젝트 구조 검증 스모크 테스트
 * JSON 파싱과 필수 파일 존재 여부를 빠르게 점검
 */

echo "=== 정음 웹사이트 스모크 테스트 ===\n\n";

$errors = [];
$success = [];

// 1. JSON 데이터 파일 검증
echo "1. JSON 데이터 파일 검증...\n";
$json_files = [
    'data/exhibitions.json',
    'data/events.json', 
    'data/press.json',
    'data/space.json'
];

foreach ($json_files as $file) {
    if (!file_exists($file)) {
        $errors[] = "JSON 파일 누락: $file";
        continue;
    }
    
    $content = file_get_contents($file);
    $data = json_decode($content, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        $errors[] = "JSON 파싱 오류: $file - " . json_last_error_msg();
    } else {
        $success[] = "✓ $file 파싱 성공 (" . count($data) . "개 항목)";
    }
}

// 2. 필수 라이브러리 파일 검증
echo "\n2. 필수 라이브러리 파일 검증...\n";
$lib_files = [
    'lib/SVGCache.php',
    'lib/helpers.php',
    'lib/mail_handler.php'
];

foreach ($lib_files as $file) {
    if (!file_exists($file)) {
        $errors[] = "라이브러리 파일 누락: $file";
    } else {
        $success[] = "✓ $file 존재";
    }
}

// 3. 컴포넌트 구조 검증
echo "\n3. 컴포넌트 구조 검증...\n";
$component_dirs = [
    'components/layout',
    'components/ui',
    'components/cards',
    'components/forms'
];

foreach ($component_dirs as $dir) {
    if (!is_dir($dir)) {
        $errors[] = "컴포넌트 디렉토리 누락: $dir";
    } else {
        $success[] = "✓ $dir 디렉토리 존재";
    }
}

// 4. CSS 파일 검증
echo "\n4. CSS 파일 검증...\n";
$css_files = [
    'css/base.css',
    'css/utilities.css',
    'css/design-system.css',
    'css/webfonts.css'
];

foreach ($css_files as $file) {
    if (!file_exists($file)) {
        $errors[] = "CSS 파일 누락: $file";
    } else {
        $success[] = "✓ $file 존재";
    }
}

// 5. 페이지 파일 검증
echo "\n5. 페이지 파일 검증...\n";
$page_files = [
    'pages/index.php',
    'pages/exhibitions.php',
    'pages/events.php',
    'pages/press.php',
    'pages/space-intro.php',
    'pages/location.php',
    'pages/component-preview.php'
];

foreach ($page_files as $file) {
    if (!file_exists($file)) {
        $errors[] = "페이지 파일 누락: $file";
    } else {
        $success[] = "✓ $file 존재";
    }
}

// 6. 핵심 컴포넌트 파일 검증
echo "\n6. 핵심 컴포넌트 파일 검증...\n";
$core_components = [
    'components/layout/header.php',
    'components/layout/footer.php',
    'components/ui/buttons/button.php',
    'components/cards/event-card.php',
    'components/forms/contact-form.php'
];

foreach ($core_components as $file) {
    if (!file_exists($file)) {
        $errors[] = "핵심 컴포넌트 누락: $file";
    } else {
        $success[] = "✓ $file 존재";
    }
}

// 결과 출력
echo "\n=== 테스트 결과 ===\n";

if (empty($errors)) {
    echo "🎉 모든 테스트 통과!\n";
    echo "성공: " . count($success) . "개 항목\n";
} else {
    echo "❌ 오류 발견: " . count($errors) . "개\n";
    foreach ($errors as $error) {
        echo "  - $error\n";
    }
    echo "\n성공: " . count($success) . "개 항목\n";
}

echo "\n=== 성공 항목 ===\n";
foreach ($success as $item) {
    echo "$item\n";
}

echo "\n=== 테스트 완료 ===\n";
?>
