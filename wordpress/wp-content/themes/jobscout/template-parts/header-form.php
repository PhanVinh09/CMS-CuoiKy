<?php

/**
 * Custom homepage job search banner (HTML + CSS + PHP)
 * Uses uploaded image at /mnt/data/d339bc42-c127-4ea4-a751-4030f4da2428.png as banner background
 */

$find_a_job_link = get_option('job_manager_jobs_page_id', 0);
$action_page = $find_a_job_link ? get_permalink($find_a_job_link) : home_url('/');

// Background image (uploaded file path provided)
$banner_url = esc_url('/mnt/data/d339bc42-c127-4ea4-a751-4030f4da2428.png');
?>
<div class="job_search_banner" role="region" aria-label="<?php esc_attr_e('Job search banner', 'jobscout'); ?>">
  <form class="jobscout_job_filters" method="GET" action="<?php echo esc_url($action_page); ?>">
    <div class="job_search_row">

      <!-- KEYWORDS -->
      <div class="job_field search_keywords">
        <label for="search_keywords"><?php esc_html_e('Keywords', 'jobscout'); ?></label>
        <div class="input_with_icon">
          <img src="<?php echo get_template_directory_uri(); ?>/images/search-icon-orange.svg" alt="Search" class="icon">
          <input
            type="text"
            id="search_keywords"
            name="search_keywords"
            placeholder="<?php esc_attr_e('Tìm kiếm việc làm, công ty, kỹ năng', 'jobscout'); ?>"
            value="<?php echo isset($_GET['search_keywords']) ? esc_attr(wp_unslash($_GET['search_keywords'])) : ''; ?>">
        </div>
      </div>

      <!-- LOCATION (load distinct locations from postmeta) -->
      <div class="job_field search_location">
        <img src="<?php echo get_template_directory_uri(); ?>/images/map-icon.svg" alt="Map" class="icon">
        <label for="search_location"><?php esc_html_e('Location', 'jobscout'); ?></label>

        <?php
        global $wpdb;
        // Query distinct last part after comma (based on your hint). This SQL does not use user input.
        $table  = $wpdb->prefix . 'postmeta';
        $sql = "SELECT DISTINCT TRIM(SUBSTRING_INDEX(meta_value, ',', -1)) as location
                FROM {$table}
                WHERE meta_key LIKE '%location%'
                AND meta_value <> ''
                ORDER BY location ASC";
        $locations = $wpdb->get_results($sql);
        $current_location = isset($_GET['search_location']) ? sanitize_text_field(wp_unslash($_GET['search_location'])) : '';
        ?>
        <select id="search_location" name="search_location" aria-placeholder="<?php esc_attr_e('Location', 'jobscout'); ?>">
          <option value=""><?php esc_html_e('Tokyo', 'jobscout'); /* default shown in image */ ?></option>
          <?php if (! empty($locations)) : ?>
            <?php foreach ($locations as $loc) :
              // sanitize output
              $loc_val = isset($loc->location) ? trim($loc->location) : '';
              if ($loc_val === '') continue;
            ?>
              <option value="<?php echo esc_attr($loc_val); ?>" <?php selected($current_location, $loc_val); ?>>
                <?php echo esc_html($loc_val); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <!-- CATEGORY (optional) -->
      <?php if ($ed_job_category) :
        $current_cat = isset($_GET['search_category']) ? sanitize_text_field(wp_unslash($_GET['search_category'])) : '';
      ?>
        <div class="job_field search_categories custom_search_categories">
          <label for="search_category"><?php esc_html_e('Job Category', 'jobscout'); ?></label>
          <select id="search_category" name="search_category">
            <option value=""><?php esc_html_e('All categories', 'jobscout'); ?></option>
            <?php foreach (get_job_listing_categories() as $jobcat) :
              $cat_val = isset($jobcat->term_id) ? $jobcat->term_id : '';
            ?>
              <option value="<?php echo esc_attr($cat_val); ?>" <?php selected($current_cat, $cat_val); ?>>
                <?php echo esc_html($jobcat->name); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      <?php endif; ?>

      <!-- SUBMIT -->
      <div class="job_field search_submit">
        <input type="submit" value="<?php esc_attr_e('Tìm Việc', 'jobscout'); ?>" />
      </div>

    </div>
  </form>
</div>