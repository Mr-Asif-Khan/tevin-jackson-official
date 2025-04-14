<?php
$price = get_post_meta(get_the_ID(), 'property_price', true);
$bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
$baths = get_post_meta(get_the_ID(), 'bathrooms', true);
$lot_size = get_post_meta(get_the_ID(), 'lot_size', true);
$square_footage = get_post_meta(get_the_ID(), 'square_footage', true);
$house_type = get_post_meta(get_the_ID(), 'house_type', true);
$year_built = get_post_meta(get_the_ID(), 'year_built', true);
$garage = get_post_meta(get_the_ID(), 'garage', true);
?>


<div class="featurepropertiess">
  <div class="propertiessub">
    <div class="feature_image_section">
      <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url('large'); ?>" class="propertie_image" loading="lazy" data-ll-status="loaded" alt="<?php the_title(); ?>">
        <?php endif; ?>
      </a>
    </div>
    <div class="propertie_content">
      <a href="<?php the_permalink(); ?>">
        <h3 class="propertie_addresa"><?php the_title(); ?></h3>
      </a>
      <div class="propertie_price">
        <span class="price">$<?php echo !empty($price) ? number_format($price) : 'N/A'; ?></span>
      </div>
      <ul class="propertie_details">
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/home.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>House Type</label>
              <span><?php echo esc_html($house_type); ?></span>
            </div>
          </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/bed.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Bedrooms</label>
              <span><?php echo esc_html($bedrooms); ?></span>
            </div>
          </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/build.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Year Built</label>
              <span><?php echo esc_html($year_built); ?></span>
            </div>
          </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/ruler.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Approx.SqFt.</label>
              <span><?php echo esc_html($square_footage); ?></span>
            </div>
          </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/bathtub.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Bathrooms</label>
              <span><?php echo esc_html($baths); ?></span>
            </div>
          </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/garage.svg" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Garage</label>
              <span><?php echo esc_html($garage); ?> Garage</span>
            </div>
            </div>
        </li>
        <li>
          <div class="single_detail_section">
            <img width="30" height="30" src="<?php echo get_template_directory_uri(); ?>/img/scale.png" class="single_icon" loading="lazy" data-ll-status="loaded">
            <div class="single_detail">
              <label>Lot size SqFt.</label>
              <span><?php echo esc_html($lot_size); ?></span>
            </div>
          </div>
        </li>
      </ul>
      <div class="propertie_view_detail_button">
        <a class="view_detail" href="<?php the_permalink(); ?>">View Details</a>
      </div>
    </div>
  </div>
</div>