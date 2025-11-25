<?php
/**
 * Filter to modify functionality of WP Job Manager plugin.
 *
 * @package JobScout
 */

/**
 * Cho taxonomy job_listing_type có thể public.
 */
if ( ! function_exists( 'job_board_taxonomy_publicview_modified_filter' ) ) {
    function job_board_taxonomy_publicview_modified_filter( $public ) {
        $public['public'] = true;
        return $public;
    }
}
add_filter( 'register_taxonomy_job_listing_type_args', 'job_board_taxonomy_publicview_modified_filter' );

/**
 * Sắp xếp job listing theo latest / oldest.
 * Hook vào query WP_Query mà WP Job Manager tạo ra.
 */
function jobscout_jobs_sort_by_date_query_args( $query_args, $args ) {

    // Không can thiệp trong admin.
    if ( is_admin() ) {
        return $query_args;
    }

    // Lấy sort từ request (GET/POST, kể cả AJAX)
    $sort = isset( $_REQUEST['sort'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['sort'] ) ) : 'latest';

    // DEBUG: ghi log để biết hàm có chạy hay không
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
        error_log( 'JOB SORT: sort=' . $sort );
    }

    // Override lại orderby cho chắc
    if ( 'oldest' === $sort ) {
        // Cũ nhất trước
        $query_args['orderby'] = array( 'date' => 'ASC' );
    } else {
        // Mới nhất trước (mặc định)
        $query_args['orderby'] = array( 'date' => 'DESC' );
    }

    return $query_args;
}
add_filter( 'get_job_listings_query_args', 'jobscout_jobs_sort_by_date_query_args', 20, 2 );
