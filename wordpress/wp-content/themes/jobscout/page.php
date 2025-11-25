<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
    while ( have_posts() ) : the_post();

        // Nếu là trang Jobs (ID = 10 hoặc slug = jobs)
        if ( is_page( 'jobs' ) || is_page( 10 ) ) :
            $current_sort = isset( $_GET['sort'] )
                ? sanitize_text_field( $_GET['sort'] )
                : 'latest';
            ?>
            <header class="entry-header jobs-header">
                <h1 class="entry-title">ALL JOBS</h1>

                <form class="jobs-sort-form" method="get">
                    <select name="sort" onchange="this.form.submit()">
                        <option value="latest" <?php selected( $current_sort, 'latest' ); ?>>
                            Mới nhất
                        </option>
                        <option value="oldest" <?php selected( $current_sort, 'oldest' ); ?>>
                            Cũ nhất
                        </option>
                    </select>

                    <?php
                    // Giữ lại các query trên URL nếu có (search, filter…)
                    foreach ( $_GET as $key => $value ) {
                        if ( 'sort' === $key ) {
                            continue;
                        }
                        echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $value ) . '">';
                    }
                    ?>
                </form>
            </header>
            <?php
        else :
            // Header mặc định cho các page khác
            do_action( 'jobscout_before_page_entry_content' );
        endif;

        // Nội dung page (gồm shortcode [jobs])
        do_action( 'jobscout_page_entry_content' );

        do_action( 'jobscout_after_page_content' );

    endwhile;
    ?>

</article>


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
