<?php
/**
 * 카페24 서버 환경 설정
 * 개발 환경과 프로덕션 환경을 구분하기 위한 설정
 */

// 서버 환경 감지
$is_production = (strpos($_SERVER['HTTP_HOST'], 'cafe24') !== false || 
                  strpos($_SERVER['HTTP_HOST'], 'jungeum.org') !== false);

// 환경별 설정
if ($is_production) {
    // 프로덕션 환경 (카페24)
    define('SERVER_ENV', 'production');
    define('ERROR_REPORTING', 0);
    define('DISPLAY_ERRORS', 0);
    define('DEBUG_MODE', false);
} else {
    // 개발 환경 (로컬)
    define('SERVER_ENV', 'development');
    define('ERROR_REPORTING', 1);
    define('DISPLAY_ERRORS', 1);
    define('DEBUG_MODE', true);
}

// 공통 설정
define('CHARSET', 'UTF-8');
define('ASSETS_PATH', 'assets/');
define('CSS_PATH', 'css/');
define('JS_PATH', 'js/');
define('DATA_PATH', 'data/');
define('COMPONENTS_PATH', 'components/');

// 에러 리포팅 설정
error_reporting(ERROR_REPORTING);
ini_set('display_errors', DISPLAY_ERRORS);

// 문자 인코딩 설정 (카페24 기본 설정)
mb_internal_encoding(CHARSET);
mb_http_output(CHARSET);

// 세션 설정 (보안 강화)
if (SERVER_ENV === 'production') {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
    ini_set('session.use_strict_mode', 1);
}

// 개발 환경에서만 디버그 정보 출력
if (DEBUG_MODE) {
    echo "<!-- 개발 환경: " . SERVER_ENV . " -->\n";
}
?>
