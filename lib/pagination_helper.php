<?php
// lib/pagination_helper.php
// 페이지네이션 헬퍼 함수 (데이터 중심 접근 방식)

/**
 * 페이지네이션 데이터 계산
 * @param array $data 전체 데이터 배열
 * @param int $current_page 현재 페이지
 * @param int $items_per_page 페이지당 아이템 수
 * @return array 페이지네이션 정보
 */
function calculatePagination($data, $current_page = 1, $items_per_page = 6) {
    $total_items = count($data);
    $total_pages = ceil($total_items / $items_per_page);
    
    // 현재 페이지 유효성 검사
    $current_page = max(1, min($current_page, $total_pages));
    
    // 시작 인덱스 계산
    $start_index = ($current_page - 1) * $items_per_page;
    
    // 현재 페이지에 표시할 데이터 추출
    $current_page_data = array_slice($data, $start_index, $items_per_page);
    
    return [
        'current_page' => $current_page,
        'total_pages' => $total_pages,
        'total_items' => $total_items,
        'items_per_page' => $items_per_page,
        'start_index' => $start_index,
        'end_index' => $start_index + count($current_page_data) - 1,
        'current_page_data' => $current_page_data,
        'has_previous' => $current_page > 1,
        'has_next' => $current_page < $total_pages,
        'previous_page' => max(1, $current_page - 1),
        'next_page' => min($total_pages, $current_page + 1)
    ];
}

/**
 * 페이지네이션 URL 생성
 * @param string $base_url 기본 URL
 * @param int $page 페이지 번호
 * @param array $additional_params 추가 파라미터
 * @return string 완성된 URL
 */
function generatePaginationUrl($base_url, $page, $additional_params = []) {
    $params = array_merge(['page' => $page], $additional_params);
    $query_string = http_build_query($params);
    
    // 기존 URL에 파라미터가 있는지 확인
    if (strpos($base_url, '?') !== false) {
        return $base_url . '&' . $query_string;
    } else {
        return $base_url . '?' . $query_string;
    }
}

/**
 * 페이지네이션 컴포넌트 데이터 준비
 * @param array $pagination_info calculatePagination() 결과
 * @param string $base_url 기본 URL
 * @param array $additional_params 추가 파라미터
 * @return array 페이지네이션 컴포넌트용 데이터
 */
function preparePaginationData($pagination_info, $base_url, $additional_params = []) {
    return [
        'current_page' => $pagination_info['current_page'],
        'total_pages' => $pagination_info['total_pages'],
        'base_url' => $base_url,
        'additional_params' => $additional_params,
        'has_previous' => $pagination_info['has_previous'],
        'has_next' => $pagination_info['has_next'],
        'previous_url' => generatePaginationUrl($base_url, $pagination_info['previous_page'], $additional_params),
        'next_url' => generatePaginationUrl($base_url, $pagination_info['next_page'], $additional_params)
    ];
}
?>
