<?php
/**
 * Single Job Listing Template V3
 * Copy to: your-theme/wp-job-manager/content-single-job_listing.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;
global $post;
?>

<style>
/* Hide default WordPress job listing elements */
.single-job_listing .entry-header {
	display: none !important;
}

.single-job_listing .entry-title {
	display: none !important;
}

.single-job_listing .job-type {
	display: none !important;
}

.single-job_listing article > header {
	display: none !important;
}

/* Reset container widths */
.single-job_listing #primary,
.single-job_listing .content-area,
.single-job_listing .site-main,
.single-job_listing .entry-content {
	max-width: 100% !important;
	width: 100% !important;
	margin: 0 !important;
}

/* Main Container */
.job-single-v3 {
	width: 100%;
	max-width: 1200px;
	margin: 0 auto;
	padding: 30px 20px;
	background: #f8f8f8;
	font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
	line-height: 1.6;
}

.job-single-v3 * {
	box-sizing: border-box;
}

/* Breadcrumb */
.jsv3-breadcrumb {
	font-size: 14px;
	color: #999;
	margin-bottom: 25px;
}

.jsv3-breadcrumb a {
	color: #ff6b35;
	text-decoration: none;
}

.jsv3-breadcrumb a:hover {
	text-decoration: underline;
}

/* Two Column Grid */
.jsv3-grid {
	display: grid;
	grid-template-columns: 1fr 320px;
	gap: 25px;
	margin-bottom: 50px;
}

/* Job Header Card */
.jsv3-header {
	background: #fff;
	padding: 30px;
	border-radius: 0;
	box-shadow: none;
	border-top: 1px solid #e0e0e0;
	border-bottom: 1px solid #e0e0e0;
	margin-bottom: 25px;
}

.jsv3-header-flex {
	display: flex;
	justify-content: space-between;
	align-items: flex-start;
	gap: 25px;
}

.jsv3-header-left {
	display: flex;
	gap: 20px;
	flex: 1;
}

.jsv3-logo img {
	width: 90px;
	height: 90px;
	object-fit: contain;
	display: block;
}

.jsv3-info h1 {
	font-size: 26px;
	font-weight: 700;
	color: #222;
	margin: 0 0 10px 0;
	line-height: 1.3;
}

.jsv3-posted {
	font-size: 13px;
	color: #999;
	margin-bottom: 15px;
}

.jsv3-meta {
	display: flex;
	flex-wrap: wrap;
	gap: 10px;
}

.jsv3-badge {
	display: inline-block;
	padding: 6px 14px;
	background: #f5f5f5;
	border: 1px solid #e0e0e0;
	border-radius: 4px;
	font-size: 13px;
	color: #555;
}

/* Application in Header */
.jsv3-apply-wrapper {
	width: 100%;
}

.jsv3-apply-wrapper .job_application {
	margin: 0;
}

.jsv3-apply-wrapper .application_button {
	width: 100%;
	padding: 12px 28px;
	background: #ff6b35;
	color: #fff;
	border: none;
	font-size: 14px;
	font-weight: 600;
	cursor: pointer;
	border-radius: 0;
	transition: all 0.2s;
	text-align: center;
	text-transform: uppercase;
}

.jsv3-apply-wrapper .application_button:hover {
	background: #e55a25;
}

.jsv3-apply-wrapper .application_details {
	position: absolute;
	background: #fff;
	border: 1px solid #e0e0e0;
	border-radius: 5px;
	padding: 20px;
	margin-top: 10px;
	box-shadow: 0 4px 12px rgba(0,0,0,0.15);
	z-index: 100;
	min-width: 300px;
	right: 0;
}

.jsv3-actions {
	display: flex;
	flex-direction: column;
	gap: 12px;
	position: relative;
}

.jsv3-btn {
	padding: 12px 28px;
	border: 1px solid #ff6b35;
	background: #fff;
	color: #ff6b35;
	font-size: 14px;
	font-weight: 600;
	cursor: pointer;
	border-radius: 0;
	transition: all 0.2s;
	text-align: center;
	white-space: nowrap;
	text-transform: uppercase;
}

.jsv3-btn:hover {
	background: #ff6b35;
	color: #fff;
}

.jsv3-btn-primary {
	background: #ff6b35;
	color: #fff;
}

.jsv3-btn-primary:hover {
	background: #e55a25;
}

/* Content Sections */
.jsv3-section {
	background: #fff;
	padding: 30px;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
	margin-bottom: 25px;
}

.jsv3-section h2 {
	font-size: 20px;
	font-weight: 700;
	color: #222;
	margin: 0 0 18px 0;
}

.jsv3-section h3 {
	font-size: 18px;
	font-weight: 600;
	color: #222;
	margin: 20px 0 12px 0;
}

.jsv3-section p {
	font-size: 15px;
	line-height: 1.8;
	color: #555;
	margin: 0 0 15px 0;
}

.jsv3-section ul {
	margin: 15px 0;
	padding-left: 28px;
	list-style: disc;
}

.jsv3-section li {
	font-size: 15px;
	line-height: 1.8;
	color: #555;
	margin-bottom: 10px;
}

.jsv3-section strong {
	color: #222;
	font-weight: 600;
}

.jsv3-section hr {
	border: none;
	border-top: 1px solid #e5e5e5;
	margin: 20px 0;
}

/* Application Button Styling */
.jsv3-section .job_application {
	margin: 0;
	padding: 0;
}

.jsv3-section .application_button {
	background: #ff6b35;
	color: #fff;
	border: none;
	padding: 15px 40px;
	font-size: 16px;
	font-weight: 700;
	cursor: pointer;
	border-radius: 5px;
	transition: background 0.2s;
}

.jsv3-section .application_button:hover {
	background: #e55a25;
}

/* Sidebar */
.jsv3-sidebar {
	display: flex;
	flex-direction: column;
	gap: 25px;
}

/* Sidebar Widgets */
.jsv3-widget {
	background: #fff;
	padding: 25px;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.jsv3-widget h3 {
	font-size: 18px;
	font-weight: 700;
	color: #222;
	margin: 0 0 18px 0;
}

/* Make photos widget fill remaining space */
.jsv3-widget.photos-widget {
	display: flex;
	flex-direction: column;
}

/* Staff Rating */
.jsv3-rating {
	display: flex;
	align-items: center;
	gap: 15px;
}

.jsv3-stars {
	display: flex;
	gap: 4px;
}

.jsv3-star {
	font-size: 22px;
	color: #ddd;
}

.jsv3-star.filled {
	color: #ff6b35;
}

.jsv3-rating-num {
	font-size: 26px;
	font-weight: 700;
	color: #222;
}

/* Company Photos Grid */
.jsv3-photos {
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	gap: 10px;
}

.jsv3-photo {
	width: 100%;
	padding-bottom: 100%;
	background: #f0f0f0;
	border-radius: 5px;
}

/* Other Jobs Section */
.jsv3-other {
	margin: 60px 0 50px;
}

.jsv3-other-title {
	text-align: center;
	font-size: 28px;
	font-weight: 700;
	color: #222;
	margin: 0 0 35px 0;
	text-transform: uppercase;
	letter-spacing: 1.5px;
}

.jsv3-jobs-grid {
	display: grid;
	grid-template-columns: repeat(2, 1fr);
	gap: 25px;
}

.jsv3-job-card {
	background: #fff;
	padding: 25px;
	border-radius: 8px;
	box-shadow: 0 2px 8px rgba(0,0,0,0.08);
	transition: all 0.3s;
}

.jsv3-job-card:hover {
	transform: translateY(-4px);
	box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

.jsv3-card-header {
	display: flex;
	gap: 15px;
	margin-bottom: 15px;
}

.jsv3-card-logo img {
	width: 55px;
	height: 55px;
	object-fit: contain;
}

.jsv3-card-title {
	font-size: 16px;
	font-weight: 700;
	margin: 0 0 6px 0;
}

.jsv3-card-title a {
	color: #222;
	text-decoration: none;
}

.jsv3-card-title a:hover {
	color: #ff6b35;
}

.jsv3-card-date {
	font-size: 12px;
	color: #999;
	margin-bottom: 10px;
}

.jsv3-card-meta {
	display: flex;
	flex-wrap: wrap;
	gap: 6px;
}

.jsv3-card-meta .jsv3-badge {
	font-size: 11px;
	padding: 4px 10px;
}

.jsv3-card-desc {
	font-size: 14px;
	color: #555;
	line-height: 1.6;
}

.jsv3-card-desc p {
	margin: 15px 0 0 0;
}

.jsv3-card-desc ul {
	margin: 15px 0 0 0;
	padding-left: 20px;
	list-style: disc;
}

.jsv3-card-desc li {
	font-size: 14px;
	color: #555;
	margin-bottom: 6px;
	line-height: 1.6;
}

/* Newsletter */
.jsv3-newsletter {
	background: linear-gradient(135deg, #ff6b35 0%, #ff8c5a 100%);
	padding: 40px;
	border-radius: 8px;
	margin: 50px 0;
}

.jsv3-newsletter-wrap {
	max-width: 750px;
	margin: 0 auto;
	display: flex;
	align-items: center;
	gap: 30px;
}

.jsv3-newsletter h3 {
	font-size: 24px;
	font-weight: 700;
	color: #fff;
	line-height: 1.3;
	margin: 0;
}

.jsv3-newsletter-form {
	display: flex;
	gap: 12px;
	flex: 1;
}

.jsv3-newsletter input {
	flex: 1;
	padding: 14px 20px;
	border: none;
	border-radius: 5px;
	font-size: 14px;
}

.jsv3-newsletter button {
	padding: 14px 30px;
	background: #fff;
	color: #ff6b35;
	border: none;
	font-weight: 700;
	font-size: 14px;
	cursor: pointer;
	border-radius: 5px;
	white-space: nowrap;
	transition: all 0.2s;
}

.jsv3-newsletter button:hover {
	background: #f5f5f5;
}

/* Social Icons */
.jsv3-social {
	display: flex;
	justify-content: center;
	gap: 15px;
	margin: 40px 0;
}

.jsv3-social-icon {
	width: 42px;
	height: 42px;
	display: flex;
	align-items: center;
	justify-content: center;
	border-radius: 50%;
	color: #fff;
	text-decoration: none;
	font-weight: 700;
	font-size: 17px;
	transition: transform 0.2s;
}

.jsv3-social-icon:hover {
	transform: scale(1.1);
}

.jsv3-fb { background: #3b5998; }
.jsv3-gg { background: #dd4b39; }
.jsv3-ln { background: #00c300; }
.jsv3-tw { background: #1da1f2; }

/* Responsive Design */
@media (max-width: 1024px) {
	.jsv3-grid {
		grid-template-columns: 1fr;
	}
	
	.jsv3-jobs-grid {
		grid-template-columns: 1fr;
	}
}

@media (max-width: 768px) {
	.jsv3-header-flex {
		flex-direction: column;
	}
	
	.jsv3-actions {
		width: 100%;
		flex-direction: row;
	}
	
	.jsv3-btn {
		flex: 1;
	}
	
	.jsv3-newsletter-wrap {
		flex-direction: column;
		text-align: center;
	}
	
	.jsv3-newsletter-form {
		width: 100%;
		flex-direction: column;
	}
}

@media (max-width: 600px) {
	.job-single-v3 {
		padding: 20px 15px;
	}
	
	.jsv3-header,
	.jsv3-section,
	.jsv3-widget {
		padding: 20px;
	}
	
	.jsv3-header-left {
		flex-direction: column;
		align-items: center;
		text-align: center;
	}
	
	.jsv3-photos {
		grid-template-columns: repeat(2, 1fr);
	}
}
.single-job .site-content {
    margin-top: 0;
    background: #f8f8f8 !important;
}
.job_listing {
    display: flex;
    padding: 0px !important;
    background: #fff;
    border-radius: 6px;
    margin-bottom: 20px;
    align-items: flex-start;
}
.site-content {
    margin-bottom: 0 !important;
}
</style>

<div class="job-single-v3">
	
	<!-- Breadcrumb -->
	<div class="jsv3-breadcrumb">
		<a href="<?php echo home_url(); ?>">Home</a> &gt; 
		<a href="<?php echo get_post_type_archive_link('job_listing'); ?>">All Jobs</a> &gt; 
		<span>Job Detail</span>
	</div>

	<!-- Job Header Card - Full Width -->
	<div class="jsv3-header">
		<div class="jsv3-header-flex">
			<div class="jsv3-header-left">
				<div class="jsv3-logo">
					<?php the_company_logo(); ?>
				</div>
				<div class="jsv3-info">
					<h1><?php the_title(); ?></h1>
					<div class="jsv3-posted">
						<?php
						$post_date = get_the_date('U'); // lấy timestamp
						$formatted_date = date('M d, Y', $post_date); // ví dụ: Oct 20, 2022
						echo 'Created: ' . $formatted_date;
						?>
					</div>
					<div class="jsv3-meta">
						<?php
						$types = wpjm_get_the_job_types();
						if ($types) {
							foreach ($types as $type) {
								echo '<span class="jsv3-badge">' . esc_html($type->name) . '</span>';
							}
						}
						?>
						<span class="jsv3-badge"><?php the_company_name(); ?></span>
						<span class="jsv3-badge"><?php the_job_location(false); ?></span>
					</div>
				</div>
			</div>
			<div class="jsv3-actions">
				<button class="jsv3-btn">SHARE</button>
				<div class="jsv3-apply-wrapper">
					<?php get_job_manager_template('job-application.php'); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Two Column Grid -->
	<div class="jsv3-grid">
		
		<!-- Main Content Column -->
		<div class="jsv3-main">
			
			<!-- Job Description Section - All Content Combined -->
			<div class="jsv3-section">
				<h2>Why You'll Love Working Here</h2>
				<?php wpjm_the_job_description(); ?>
			</div>

		</div>

		<!-- Sidebar Column -->
		<div class="jsv3-sidebar">
			
			<!-- Staff Rating Widget - MOVED TO TOP -->
			<div class="jsv3-widget">
				<h3>Staff Rating</h3>
				<div class="jsv3-rating">
					<div class="jsv3-stars">
						<span class="jsv3-star filled">★</span>
						<span class="jsv3-star filled">★</span>
						<span class="jsv3-star filled">★</span>
						<span class="jsv3-star filled">★</span>
						<span class="jsv3-star">★</span>
					</div>
					<span class="jsv3-rating-num">4.0</span>
				</div>
			</div>

			<!-- Company Photos Widget -->
			<div class="jsv3-widget photos-widget">
				<h3>Company Photos</h3>
				<div class="jsv3-photos">
					<?php for($i=0; $i<6; $i++): ?>
						<div class="jsv3-photo"></div>
					<?php endfor; ?>
				</div>
			</div>

		</div>
	</div>

	<!-- Other Jobs Section -->
	<div class="jsv3-other">
		<h2 class="jsv3-other-title">OTHER JOBS</h2>
		<div class="jsv3-jobs-grid">
			<?php
			$related = new WP_Query(array(
				'post_type' => 'job_listing',
				'posts_per_page' => 6,
				'post__not_in' => array($post->ID),
				'orderby' => 'date',
				'order' => 'DESC'
			));
			
			if ($related->have_posts()):
				while($related->have_posts()): $related->the_post();
			?>
			<div class="jsv3-job-card">
				<div class="jsv3-card-header">
					<div class="jsv3-card-logo">
						<?php the_company_logo('thumbnail'); ?>
					</div>
					<div class="jsv3-card-info">
						<h3 class="jsv3-card-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="jsv3-card-date">
							<?php
							$post_date = get_the_date('U'); // lấy timestamp
							$formatted_date = date('M d, Y', $post_date); // ví dụ: Oct 20, 2022
							echo 'Created: ' . $formatted_date;
							?>
						</div>
						<div class="jsv3-card-meta">
							<?php
							$types = wpjm_get_the_job_types();
							if ($types) {
								foreach ($types as $type) {
									echo '<span class="jsv3-badge">' . esc_html($type->name) . '</span>';
								}
							}
							?>
							<span class="jsv3-badge"><?php the_company_name(); ?></span>
							<span class="jsv3-badge"><?php the_job_location(false); ?></span>
						</div>
					</div>
				</div>
				<div class="jsv3-card-desc">
					<?php if (has_excerpt()): ?>
						<?php the_excerpt(); ?>
					<?php else: ?>
						<p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php 
				endwhile;
			endif;
			wp_reset_postdata(); 
			?>
		</div>
	</div>

</div>