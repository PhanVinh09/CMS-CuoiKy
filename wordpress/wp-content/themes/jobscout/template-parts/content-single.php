<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */

?>

<?php
/**
 * Template part for displaying posts
 *
 * @package JobScout
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-wrapper'); ?>>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <a href="<?php echo home_url(); ?>">Home </a><span>></span>
        <a href="<?php echo get_post_type_archive_link('post'); ?>">News </a><span>></span>
        <span>News Detail</span>
    </div>

    <!-- Post Header -->
    <div class="single-post-header">

        <!-- Thumbnail bên trái -->
        <div class="thumb-small">
            <?php the_post_thumbnail('medium'); ?>
        </div>

        <!-- Info bên phải -->
        <div class="info-box">
            <h1 class="post-title"><?php the_title(); ?></h1>
            <div class="post-date">
                <span class="date-tag">Ngày Đăng: <?php echo get_the_date(); ?></span>
            </div>
            <div class="post-meta">
                <span class="meta-tag">Category: <?php the_category(', '); ?></span>
                <span class="meta-tag">Tác giả: <?php the_author(); ?></span>
            </div>
        </div>

        <!-- Share -->
        <button class="share-btn">Chia sẻ</button>

    </div>

    <!-- Content -->
    <div class="single-content">
        <?php the_content(); ?>
    </div>


    <!-- ==============================
     BLOG SECTION BÊN DƯỚI SINGLE (NO BANNER, NO TITLE)
=============================== -->
    <?php
    // Prevent duplicate rendering
    if (!defined('JOBSCOUT_BLOG_SECTION_RENDERED')) {
        define('JOBSCOUT_BLOG_SECTION_RENDERED', true);

        /**
         * Blog List Only (NO BANNER, NO TITLE)
         */
        $args = array(
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => -1,
            'ignore_sticky_posts' => true
        );

        $qry = new WP_Query($args);

        if ($qry->have_posts()) { ?>
            <section id="blog-section" class="article-section">
                <h2 class="blog-title">Bài viết mới nhất</h2>
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
                                    <p class="service-desc">
                                        <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
                                    </p>
                                    <a href="<?php the_permalink(); ?>" class="service-readmore">Read More</a>
                                </div>
                            </div>
                        <?php }
                        wp_reset_postdata(); ?>
                    </div>

                </div>
            </section>
    <?php }
    } ?>

</article>


<!-- #post-<?php the_ID(); ?> -->
<style>
    .single-post-wrapper {
        width: 70%;
        margin: 10px 0 0 0;
    }

    .breadcrumb {
        margin-top: 50px;
        margin-bottom: 15px;
        font-size: 14px;
        opacity: 0.7;
    }

    .breadcrumb a {
        color: #ff6b35;
    }

    .breadcrumb a:hover {
        text-decoration: underline;
        color: #ff6b35;
    }

    .breadcrumb span {
        color: #999;
    }

    .single-post-header {
        width: 1200px;
        margin-bottom: 25px;
    }

    .single-post-header .post-title {
        font-size: 28px;
        font-weight: 700;
    }

    .single-thumbnail img {
        width: 100%;
        border-radius: 6px;
        margin: 20px 0;
    }

    .single-content {
        background-color: #fff;
        width: 900px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 50px;
    }

    .single-content p {
        line-height: 1.8;
        margin-bottom: 20px;
    }

    .related-title {
        margin-top: 60px;
        font-size: 22px;
        text-align: center;
        font-weight: bold;
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-top: 20px;
    }

    .related-item img {
        width: 100%;
        border-radius: 6px;
    }

    .subscribe-section {
        background: #ff8a00;
        padding: 30px;
        text-align: center;
        margin-top: 60px;
        border-radius: 8px;
        color: #fff;
    }

    .subscribe-form {
        margin-top: 10px;
        display: flex;
        justify-content: center;
    }

    .subscribe-form input {
        width: 300px;
        padding: 8px;
        border-radius: 4px 0 0 4px;
        border: none;
    }

    .subscribe-form button {
        padding: 8px 20px;
        border: none;
        background: #000;
        color: #fff;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
    }

    /* === Ẩn comment và link chuyển page === */
    .post-navigation {
        display: none;
    }

    .comments-area {
        display: none;
    }

    /* ===== WRAPPER BOX (giống HÌNH 1) ===== */
    .single-post-header {
        background: #fff;
        padding: 25px;
        border-radius: 2px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        display: flex;
        align-items: center;
        gap: 25px;
    }

    /* == Thumbnail bên trái == */
    .single-post-header .thumb-small {
        width: 130px;
        height: 130px;
        flex-shrink: 0;
    }

    .single-post-header .thumb-small img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* == Vùng nội dung bên phải ảnh == */
    .single-post-header .info-box {
        flex-grow: 1;
    }

    /* == Title == */
    .single-post-header .post-title {
        font-size: 22px;
        font-weight: 700;
        margin: 0 0 10px 0;
    }

    /* == Meta date == */
    .post-date {
        /*  */
    }

    .post-date .date-tag {
        padding: 6px 12px;
        color: gray;
        font-size: 15px;
    }

    /* == Meta line == */
    .single-post-header .post-meta {
        font-size: 14px;
        opacity: 0.7;
        margin-bottom: 10px;
    }

    .meta-tag{
        display: inline-block;
        background: #f5f5f5;
        padding: 6px 12px;
        font-size: 13px;
    }
    .meta-tag a{
        color: #333;
    }
    .meta-tag a:hover{
        color: #007bffff;
    }

    /* == Nút share == */
    .share-btn {
        border: 1px solid #333;
        padding: 10px 25px;
        background: transparent;
        font-weight: 600;
        cursor: pointer;
        transition: 0.2s;
        color: black;
    }

    .share-btn:hover {
        background: #333;
        color: #fff;
    }

    .service-item {
        width: 565px;
    }

    section.article-section {
        padding: 0;
        margin-bottom: 50px;
    }

    .blog-title {
        position: relative;
        width: 100vw;
        max-width: none;
        top: 20px;
        left: 72%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        box-sizing: border-box;
    }
</style>