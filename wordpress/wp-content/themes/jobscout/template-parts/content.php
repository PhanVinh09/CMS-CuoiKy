<?php
// Prevent duplicate rendering
if (defined('JOBSCOUT_BLOG_SECTION_RENDERED')) {
    return;
}
define('JOBSCOUT_BLOG_SECTION_RENDERED', true);

/**
 * Blog Banner (From Gutenberg Page)
 ------------------------------------------- */
$blog_page_id = get_option('page_for_posts');

if ($blog_page_id) {
    $blog_content = get_post_field('post_content', $blog_page_id);

    if (!empty($blog_content)) {
        echo '<div class="blog-banner-wrapper">';
        echo do_blocks($blog_content);
        echo '</div>';
    }
}
/**
 * Blog List Section
 ------------------------------------------- */

$blog_heading = get_theme_mod('blog_section_title', __('Latest Articles', 'jobscout'));
$sub_title    = get_theme_mod('blog_section_subtitle', __('We will help you find it. We are your first step to becoming everything you want to be.', 'jobscout'));
$hide_author  = get_theme_mod('ed_post_author', false);
$hide_date    = get_theme_mod('ed_post_date', false);
$ed_blog      = get_theme_mod('ed_blog', true);

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => -1,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query($args);

if ($ed_blog && $qry->have_posts()) { ?>
    <section id="blog-section" class="article-section">
        <div class="container">

            <div class="article-service-grid">
                <?php while ($qry->have_posts()) {
                    $qry->the_post(); ?>
                    <div class="service-item">
                        <div class="service-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                if (has_post_thumbnail()) the_post_thumbnail('large');
                                else jobscout_fallback_svg_image('large');
                                ?>
                            </a>
                        </div>

                        <div class="service-content">
                            <h3 class="service-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <p class="service-desc"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                            <a href="<?php the_permalink(); ?>" class="service-readmore">Read More</a>
                        </div>
                    </div>
                <?php }
                wp_reset_postdata(); ?>
            </div>

        </div>
    </section>
<?php } ?>

<style>
    .container {
        margin: 0 auto;
        max-width: 1170px;
    }

    section.article-section {
        margin-bottom: 50px;
    }

    section.article-section {
        padding: 0;
    }

    .blog-banner {
        position: relative;
        width: 100vw;
        max-width: none;
        top: -29px;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        box-sizing: border-box;
    }

    .blog-title {
        position: relative;
        width: 100vw;
        max-width: none;
        top: 20px;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        box-sizing: border-box;
    }

    .blog-title h2 {
        padding-top: 30px;
    }
</style>