<?php
/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to
 * yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.0.0-custom
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $post;

// Meta job
$job_featured = get_post_meta( get_the_ID(), '_featured', true );
$company_name = get_post_meta( get_the_ID(), '_company_name', true );
?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr( $post->geolocation_lat ); ?>" data-latitude="<?php echo esc_attr( $post->geolocation_long ); ?>">

	<!-- 1. Hình ảnh công ty -->
	<figure class="company-logo">
		<?php the_company_logo( 'thumbnail' ); ?>
	</figure>

	<div class="job-title-wrap">

		<!-- 2. Tiêu đề công việc -->
		<h2 class="entry-title">
			<a href="<?php the_job_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>

		<!-- 3. Ngày tạo công việc -->
		<div class="job-date">
			<?php
			echo esc_html__( 'Ngày Tạo: Đã đăng', 'jobscout' ) . ' ';

			$posted_time = get_post_time( 'U', true );  // timestamp bài viết
			$now         = current_time( 'timestamp' ); // timestamp hiện tại (WP)
			$diff        = human_time_diff( $posted_time, $now );

			echo esc_html( $diff . ' trước' );
			?>
		</div>

		<div class="entry-meta">
			<?php
			// 4. Loại công việc (job type)
			do_action( 'job_listing_meta_start' );

			if ( get_option( 'job_manager_enable_types' ) ) {
				$types = wpjm_get_the_job_types();
				if ( ! empty( $types ) ) {
					foreach ( $types as $jobtype ) {
						?>
						<li class="job-type <?php echo esc_attr( sanitize_title( $jobtype->slug ) ); ?>">
							<?php echo esc_html( $jobtype->name ); ?>
						</li>
						<?php
					}
				}
			}

			do_action( 'job_listing_meta_end' );
			?>

			<!-- 5. Tên công ty -->
			<?php if ( ! empty( $company_name ) ) : ?>
				<div class="company-name">
					<?php the_company_name(); ?>
				</div>
			<?php endif; ?>

			<!-- 6. Khu vực tuyển dụng -->
			<div class="company-address">
				<?php the_job_location( true ); ?>
			</div>
		</div>
	</div>

	<!-- 7. Mô tả ngắn công việc -->
	<div class="job-excerpt">
		<?php the_excerpt(); ?>
	</div>

	<?php if ( $job_featured ) : ?>
		<div class="featured-label">
			<?php esc_html_e( 'Featured', 'jobscout' ); ?>
		</div>
	<?php endif; ?>

</article>
