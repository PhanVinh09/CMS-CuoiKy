<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package JobScout
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    // Đây là trang Jobs? (ID = 10 hoặc slug = jobs)
    $is_jobs_page = is_page( 10 ) || is_page( 'jobs' );

    if ( $is_jobs_page && function_exists( 'jobscout_is_wp_job_manager_activated' ) && jobscout_is_wp_job_manager_activated() ) :

        // ---- SORT: latest | oldest ----
        $current_sort = isset( $_GET['sort'] )
            ? sanitize_text_field( wp_unslash( $_GET['sort'] ) )
            : 'latest';

        // Chọn order cho shortcode
        $order = ( 'oldest' === $current_sort ) ? 'ASC' : 'DESC';
        ?>

        <!-- ========= HERO ========= -->
        <section class="jobs-hero"
                 style="background-image:url('<?php echo esc_url( get_stylesheet_directory_uri() . '/images/jobs-hero.jpg' ); ?>');">
            <div class="jobs-hero-inner">
                <h2>CAREER WITH US</h2>
            </div>
        </section>

        <div class="jobs-wrapper-container">

            <!-- ========= ALL JOBS + SORT DROPDOWN ========= -->
            <header class="entry-header jobs-header">
                <h1 class="entry-title">ALL JOBS</h1>

                <form class="jobs-sort-form" method="get">
                    <?php
                    // Giữ lại các query khác (page_id, search...) khi đổi sort
                    foreach ( $_GET as $key => $value ) {
                        if ( 'sort' === $key ) {
                            continue;
                        }
                        echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
                    }
                    ?>
                    <select name="sort" class="job-sort-dropdown" onchange="this.form.submit()">
                        <option value="latest" <?php selected( $current_sort, 'latest' ); ?>>Mới nhất</option>
                        <option value="oldest" <?php selected( $current_sort, 'oldest' ); ?>>Cũ nhất</option>
                    </select>
                </form>
            </header>

            <!-- ========= KHỐI JOB LISTINGS MỚI ========= -->
            <section id="job-posting-section" class="top-job-section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            // Shortcode jobs: sắp xếp theo ngày đăng
                            echo do_shortcode(
                                '[jobs show_filters="true" post_status="publish" per_page="10" orderby="date" order="' . $order . '"]'
                            );
                            ?>
                        </div>
                    </div>
                </div>
            </section>

        </div><!-- .jobs-wrapper-container -->

    <?php
    // Các page KHÁC (không phải Jobs) dùng layout mặc định
    else :
        do_action( 'jobscout_before_page_entry_content' );
        do_action( 'jobscout_page_entry_content' );
        do_action( 'jobscout_after_page_content' );
    endif;
    ?>

</article><!-- #post-## -->
