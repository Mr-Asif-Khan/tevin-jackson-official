<?php
/**
 * Template Name: Listings Page
 */
get_header(); 
?>

<style>
    @import url('https://fonts.cdnfonts.com/css/satoshi');
    body {
      background-color: #F2FAFF;
      font-family: 'Satoshi', sans-serif;
    }
</style>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="container" style="max-width: 1370px; padding: 0px;">
  <div class="propertie_title_filter_main">
    <div class="propertie_title_filter_inner">
      <div class="propertie_title">
        <h1>Properties</h1>
      </div>
      <div class="propertie_filter_divi">
        <div class="propertie_filter">
          <a href="#" class="filter_button" data-toggle="modal" data-target="#filterproperties"><img width="512" height="512" src="<?php echo get_template_directory_uri(); ?>/img/filter.png" class="propertie_filter_img" loading="lazy" data-ll-status="loaded">Filter Properties</a>
        </div>
        <div class="reset_filter">
          <a href="#" class="filter_button"><img width="260" height="260" src="<?php echo get_template_directory_uri(); ?>/img/reset-iconn.jpg" class="propertie_filter_img" loading="lazy" data-ll-status="loaded">Reset Properties</a> 
        </div>
      </div>
    </div>
  </div>
  <?php 
  $featured_args = array(
  'post_type'      => 'listing',
  'posts_per_page' => 1, 
  'paged'          => 1
  );
  $featured_query = new WP_Query($featured_args);
  $excluded_post_id = array();

  if ($featured_query->have_posts()) : 
    while ($featured_query->have_posts()) : $featured_query->the_post();
      $excluded_post_id[] = get_the_ID();
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
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/home.png" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>House Type</label>
                <span><?php echo esc_html($house_type); ?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/bed.png" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>Bedrooms</label>
                <span><?php echo esc_html($bedrooms); ?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/build.png" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>Year Built</label>
                <span><?php echo esc_html($year_built); ?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/ruler.png" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>Approx.SqFt.</label>
                <span><?php echo esc_html($square_footage); ?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/bathtub.png" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>Bathrooms</label>
                <span><?php echo esc_html($baths); ?></span>
              </div>
            </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/garage.svg" class="single_icon" loading="lazy" data-ll-status="loaded">
              <div class="single_detail">
                <label>Garage</label>
                <span><?php echo esc_html($garage); ?> Garage</span>
              </div>
              </div>
          </li>
          <li>
            <div class="single_detail_section">
              <img width="24" height="24" src="<?php echo get_template_directory_uri(); ?>/img/scale.png" class="single_icon" loading="lazy" data-ll-status="loaded">
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
  <?php 
    endwhile;
    endif;
    wp_reset_postdata()?>
  
  <div class="listinglist">
  <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array(
        'post_type'      => 'listing',
        'posts_per_page' => 4,
        'paged'          => $paged,
        'post__not_in'   => $excluded_post_id,
    );

    $listing_query = new WP_Query($args);

    if ($listing_query->have_posts()) : 
      while ($listing_query->have_posts()) : $listing_query->the_post();
        $price = get_post_meta(get_the_ID(), 'property_price', true);
        $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
        $baths = get_post_meta(get_the_ID(), 'bathrooms', true);
        $square_feet = get_post_meta(get_the_ID(), 'square_footage', true);
        $status = get_post_meta(get_the_ID(), 'property_status', true);
  ?>
    <div class="propertiess">
      <div class="propertiessub">
        <div class="feature_image_section">
          <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="propertie_image" loading="lazy">
              <?php endif; ?>
          </a>
          <div class="status_labels">
          <?php
            switch ($status) {
                case 'Sold':
                    $status_class = 'sold_label';
                    break;
                case 'Available':
                    $status_class = 'available_label';
                    break;
                case 'Pending':
                    $status_class = 'pending_label';
                    break;
                default:
                    $status_class = 'label';
                    $status = 'Unknown';
            }
            ?>
            <span class="<?php echo $status_class; ?>"><?php echo $status; ?></span>
          </div>
        </div>
        <div class="propertie_content">
            <a href="<?php the_permalink(); ?>">
                <h3 class="propertie_addresa"><?php the_title(); ?></h3>
            </a>
            <div class="propertie_price">
                <span class="price">$ <?php echo !empty($price) ? number_format($price) : 'N/A'; ?></span>
                <span class="single_detail_sec">
                    <?php echo !empty($bedrooms) ? $bedrooms . ' Bedrooms' : 'N/A'; ?> | 
                    <?php echo !empty($baths) ? $baths . ' Baths' : 'N/A'; ?> |  
                    <?php echo !empty($square_feet) ? number_format($square_feet) . ' ft' : 'N/A'; ?>
                </span>
            </div>
            <div class="propertie_view_detail_button">
              <a class="view_detail" href="<?php the_permalink(); ?>">View Details</a>
            </div>
        </div>
      </div>
    </div>
  <?php endwhile;
    endif;
    wp_reset_postdata();
  ?>
  </div>

  <?php if ($listing_query->max_num_pages > 1): ?>
      <div class="load-more-container">
          <button id="load-more" data-page="1" data-max="<?php echo $listing_query->max_num_pages; ?>">Load More</button>
      </div>
  <?php endif; ?>

  <div class="signup-loader">
      <div class="loader-div"></div>
  </div>
</div>



<script>
jQuery(document).ready(function($) {
    var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>"; 

    $("#load-more").click(function() {
        var button = $(this);
        var page = parseInt(button.attr("data-page")) + 1;
        var maxPages = parseInt(button.attr("data-max"));

        $(".signup-loader").css("display", "block");

        $.ajax({
            type: "POST",
            url: ajaxUrl,
            data: {
                action: "load_more_listings",
                paged: page
            },
            beforeSend: function() {
                button.text("Loading...");
            },
            success: function(response) {
              if ($.trim(response) != '') {
                $(".listinglist").append(response);
                button.attr("data-page", page);
                button.text("Load More");

                if (page >= maxPages) {
                    $(".load-more-container").remove();
                }
              } else {
                  $(".load-more-container").remove();
              }
            },
            complete: function() {
                $(".signup-loader").css("display", "none");
            }
        });
    });
});
</script>

<?php get_footer(); ?>

