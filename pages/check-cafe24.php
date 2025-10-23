<?php
/**
 * 카페24 서버 호환성 체크
 * 배포 전 서버 환경을 확인하는 스크립트
 */

// 서버 환경 설정 로드
require_once '../config/server.php';
// 컴포넌트 헬퍼 함수들 로드
require_once '../components/helpers.php';

echo "<h1>카페24 서버 호환성 체크</h1>";

// PHP 버전 확인
echo "<h2>PHP 버전</h2>";
echo "현재 PHP 버전: " . phpversion() . "<br>";
echo "카페24 요구 버전: PHP 8.4<br>";

if (version_compare(phpversion(), '8.4.0', '>=')) {
    echo "<span style='color: green;'>✅ PHP 버전 호환</span><br>";
} else {
    echo "<span style='color: red;'>❌ PHP 버전 불일치</span><br>";
}

// 문자 인코딩 확인
echo "<h2>문자 인코딩</h2>";
echo "내부 인코딩: " . mb_internal_encoding() . "<br>";
echo "HTTP 출력 인코딩: " . mb_http_output() . "<br>";

if (mb_internal_encoding() === 'UTF-8') {
    echo "<span style='color: green;'>✅ UTF-8 인코딩 설정됨</span><br>";
} else {
    echo "<span style='color: red;'>❌ UTF-8 인코딩 설정 필요</span><br>";
}

// 필수 확장 모듈 확인
echo "<h2>필수 확장 모듈</h2>";
$required_extensions = ['mbstring', 'json', 'fileinfo', 'openssl'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "<span style='color: green;'>✅ $ext</span><br>";
    } else {
        echo "<span style='color: red;'>❌ $ext (필요)</span><br>";
    }
}

// 파일 권한 확인
echo "<h2>파일 권한</h2>";
$check_files = [
    'css/design-system.css' => 'CSS 파일',
    'css/webfonts.css' => '웹폰트 파일',
    'js/main.js' => 'JavaScript 파일',
    'data/events.json' => '이벤트 데이터',
    'data/exhibitions.json' => '전시 데이터',
    'data/press.json' => '보도 데이터',
    'data/space.json' => '공간 데이터',
    'components/header.php' => '헤더 컴포넌트',
    'components/footer.php' => '푸터 컴포넌트'
];

foreach ($check_files as $file => $description) {
    if (file_exists($file)) {
        if (is_readable($file)) {
            echo "<span style='color: green;'>✅ $description ($file)</span><br>";
        } else {
            echo "<span style='color: red;'>❌ $description ($file) - 읽기 권한 없음</span><br>";
        }
    } else {
        echo "<span style='color: red;'>❌ $description ($file) - 파일 없음</span><br>";
    }
}

// JSON 파일 유효성 확인
echo "<h2>JSON 파일 유효성</h2>";
$json_files = ['data/events.json', 'data/exhibitions.json', 'data/press.json', 'data/space.json'];
foreach ($json_files as $json_file) {
    if (file_exists($json_file)) {
        $json_content = file_get_contents($json_file);
        $json_data = json_decode($json_content, true);
        
        if (json_last_error() === JSON_ERROR_NONE) {
            echo "<span style='color: green;'>✅ $json_file - 유효한 JSON</span><br>";
        } else {
            echo "<span style='color: red;'>❌ $json_file - JSON 오류: " . json_last_error_msg() . "</span><br>";
        }
    }
}

// 보안 설정 확인
echo "<h2>보안 설정</h2>";
if (ini_get('expose_php') === '0' || ini_get('expose_php') === '') {
    echo "<span style='color: green;'>✅ PHP 버전 노출 비활성화</span><br>";
} else {
    echo "<span style='color: orange;'>⚠️ PHP 버전 노출 활성화 (보안상 비활성화 권장)</span><br>";
}

// 세션 설정 확인
echo "<h2>세션 설정</h2>";
echo "세션 쿠키 HTTP Only: " . (ini_get('session.cookie_httponly') ? '활성화' : '비활성화') . "<br>";
echo "세션 쿠키 Secure: " . (ini_get('session.cookie_secure') ? '활성화' : '비활성화') . "<br>";

echo "<hr>";
echo "<p><strong>체크 완료!</strong> 위의 모든 항목이 ✅ 상태여야 카페24 서버에서 정상 작동합니다.</p>";
?>
