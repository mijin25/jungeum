<?php
// 헤더 컴포넌트
// 네비게이션과 로고를 포함한 사이트 헤더

// 컴포넌트 헬퍼 함수들 로드
require_once __DIR__ . '/../../lib/helpers.php';

// base_path는 항상 '../'로 설정 (pages 폴더에서 접근)
$base_path = '../';
?>
<header class="site-header">
    <!-- 네비게이션 -->
    <?php
    $nav_data = [
        'menu_items' => [
            '정음' => [
                'url' => 'story',
                'submenu_id' => 'jungeum',
                'submenu' => [
                    '정음 스토리' => 'story',
                    '언론 보도' => 'press'
                ]
            ],
            '전시' => 'exhibitions',
            '이벤트' => 'events',
            '공간' => [
                'url' => 'space-intro',
                'submenu_id' => 'space',
                'submenu' => [
                    '공간 소개' => 'space-intro',
                    '건축 소개' => 'space-intro'
                ]
            ],
            '오시는 길' => 'location',
            '문의' => 'contact'
        ],
        'current_page' => $current_page ?? '',
        'base_path' => $base_path
    ];
    $data = $nav_data;
    include realpath(__DIR__ . '/navigation/navbar.php');
    ?>
</header>
