<?php
/**
 * The template for displaying single job listings
 *
 * @package JobScout
 */

get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();
    
    // Include trực tiếp file template custom
    include( locate_template( 'job_manager/content-single-job_listing.php' ) );
    
endwhile;
?>

<?php get_footer();