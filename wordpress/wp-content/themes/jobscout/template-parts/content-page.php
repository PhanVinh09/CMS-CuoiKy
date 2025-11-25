<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package JobScout
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if ( is_page( 'jobs' ) || is_page( 10 ) ) : ?>
        <!-- ===== BANNER CAREER WITH US ===== -->
        <section class="jobs-hero"
            style="background-image:url('<?php echo esc_url( get_stylesheet_directory_uri() . '/images/jobs-hero.jpg' ); ?>');">
            <div class="jobs-hero-inner">
                <h2>CAREER WITH US</h2>
            </div>
        </section>

        <!-- ===== ALL JOBS + DROPDOWN ===== -->
        <header class="entry-header jobs-header">
            <h1 class="entry-title">ALL JOBS</h1>

            <form class="jobs-sort-form" method="get">
                <?php
                $current_sort = isset( $_GET['sort'] )
                    ? sanitize_text_field( wp_unslash( $_GET['sort'] ) )
                    : 'latest';
                ?>
                <select name="sort" onchange="this.form.submit()">
                    <option value="latest" <?php selected( $current_sort, 'latest' ); ?>>
                        Mới nhất
                    </option>
                    <option value="oldest" <?php selected( $current_sort, 'oldest' ); ?>>
                        Cũ nhất
                    </option>
                </select>

                <?php
                // Giữ lại các query khác trên URL nếu có
                foreach ( $_GET as $key => $value ) {
                    if ( 'sort' === $key ) {
                        continue;
                    }
                    echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
                }
                ?>
            </form>
        </header>

        <!-- Nội dung page chứa shortcode [jobs] -->
        <div class="entry-content">
            <?php the_content(); ?>
        </div>

    <?php else : ?>

        <?php
        /**
         * Header + content mặc định cho các page khác
         */
        do_action( 'jobscout_before_page_entry_content' );
        do_action( 'jobscout_page_entry_content' );
        do_action( 'jobscout_after_page_content' );
        ?>

    <?php endif; ?>

</article><!-- #post-## -->
