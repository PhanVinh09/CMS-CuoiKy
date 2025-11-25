<?php

/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta(get_the_ID(), '_job_salary', true);
$job_featured = get_post_meta(get_the_ID(), '_featured', true);
$company_name = get_post_meta(get_the_ID(), '_company_name', true);

?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr($post->geolocation_lat); ?>" data-latitude="<?php echo esc_attr($post->geolocation_long); ?>">

	<!-- 1. Hình ảnh công ty -->
	<figure class="company-logo">
		<?php the_company_logo('thumbnail'); ?>
	</figure>

	<div class="job-title-wrap">

		<!-- 2. Tiêu đề công việc -->
		<h2 class="entry-title">
			<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
		</h2>

		<!-- 3. Ngày tạo công việc -->
		<div class="job-date">
			<?php
			$post_date = get_the_date('U'); // lấy timestamp
			$formatted_date = date('M d, Y', $post_date); // ví dụ: Oct 20, 2022
			echo 'Created: ' . $formatted_date;
			?>
		</div>


		<div class="meta-line">

			<!-- 4. Job Type -->
			<?php
			if (get_option('job_manager_enable_types')) {
				$types = wpjm_get_the_job_types();
				if (! empty($types)) :
					foreach ($types as $jobtype) : ?>
						<span class="meta-badge badge-type">
							<?php echo esc_html($jobtype->name); ?>
						</span>
			<?php
					endforeach;
				endif;
			}
			?>

			<!-- 5. Category Name -->
			<?php
			$categories = get_the_terms(get_the_ID(), 'job_listing_category');

			if ($categories && ! is_wp_error($categories)) {
				echo '<span class="meta-badge badge-category">' . esc_html($categories[0]->name) . '</span>';
			} else {
				echo '<span class="meta-badge badge-category">No Category</span>';
			}
			?>


			<!-- 6. Job Location -->
			<span class="meta-badge badge-location">
				<?php echo wp_strip_all_tags(get_the_job_location()); ?>
			</span>

		</div>

	</div>
	<!-- 7. Mô tả ngắn công việc -->
	<div class="job-excerpt">
		<?php the_excerpt(); ?>
	</div>

	<?php if ($job_featured) { ?>
		<div class="featured-label"><?php esc_html_e('Featured', 'jobscout'); ?></div>
	<?php } ?>

</article>