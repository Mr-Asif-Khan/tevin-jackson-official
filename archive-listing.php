<?php get_header(); ?>
<style>
    body{
      font-family: "Poppins", sans-serif;
    }
    body.modal-open {
      overflow: auto !important;
    }
    .reset_filter.show{
      display: block;
    }
    .reset_filter.hide{
      display: none;
    }
    .bedrooms-fields, .bathroom-fields, .status-fields{
      display: flex;
      justify-content: flex-start;
      align-items: baseline;
      width: 100%;
      margin-bottom: 30px;
      padding: 0px 15px;
    }
    .bedrooms-fields > label, .bathroom-fields > label, .status-fields label{
      max-width: 30%;
      width: 100%;
      margin-bottom: 0;
      font-size: 14px;
      font-weight: 500;
    }
    .bedrooms-fields > div, .bathroom-fields> div{
      display: flex;
      max-width: 70%;
      width: 100%;
      align-items: baseline;
    }
    .status-fields div{
      max-width: 70%;
      width: 100%;
      align-items: baseline;
    }
    .property-filter-form input[type=number] {
      margin: 0;
      border: 1px solid #e5e5e5;
      outline: none;
      padding-left: 10px;
      text-align: left;
      padding: 5px 10px;
      font-size: 14px;
      border-radius: 5px;
      width: 100%;
      height: 40px;
      margin: 0 10px;
    }
    .modelbtn {
      display: flex;
      max-width: 100%;
      width: 100%;
      justify-content: center;
      align-items: center;
      margin-bottom: 0;
      padding-top: 16px;
      border-top: 1px solid #f2f2f2;
    }
    .modelbtn button:nth-child(1) {
      font-family: "Poppins", sans-serif;
      font-size: 14px !important;
      font-weight: 500 !important;
      font-style: normal;
      line-height: normal;
      color: #000;
    }
    .modelbtn button:nth-child(2) {
      font-family: "Poppins", sans-serif;
      font-size: 14px !important;
      font-weight: 500 !important;
      font-style: normal;
      line-height: normal;
      color: #fff;
      background-color: #1b4965;
      border-radius: 3px;
      padding: 8px 37px;
    }
    span.noproperty{
      margin-bottom: 40px;
      text-align: center;
      display: block;
      color: #036464;
      font-weight: 600;
      font-size: 22px;
      padding: 20px 10px;
      border: 2px dashed #036464;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<div class="propertie_title_filter_main">
  <div class="container" style="max-width: 1440px; padding: 0px;">
    <div class="propertie_title_filter_inner">
      <div class="propertie_title">
        <h1>Properties</h1>
      </div>
      <div class="propertie_filter_divi">
        <div class="propertie_filter">
          <a href="#" class="filter_button filter-button" data-toggle="modal" data-target="#filterproperties"><img width="512" height="512" src="<?php echo get_template_directory_uri(); ?>/img/filter-white.png" class="propertie_filter_img" loading="lazy" data-ll-status="loaded">Filter Properties</a>
        </div>
        <div class="reset_filter">
          <a href="#" class="filter_button"><img width="260" height="260" src="<?php echo get_template_directory_uri(); ?>/img/reset-iconn.jpg" class="propertie_filter_img" loading="lazy" data-ll-status="loaded">Reset Properties</a> 
        </div>
      </div>
    </div>
  </div>
</div>



<?php 
$bedrooms_min = isset($_GET['bedrooms_min']) ? $_GET['bedrooms_min'] : '';
$bedrooms_max = isset($_GET['bedrooms_max']) ? $_GET['bedrooms_max'] : '';
$bathrooms_min = isset($_GET['bathrooms_min']) ? $_GET['bathrooms_min'] : '';
$bathrooms_max = isset($_GET['bathrooms_max']) ? $_GET['bathrooms_max'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>


<div class="container" style="max-width: 1440px; padding: 0px;">
  <?php 
  $featured_args = array(
    'post_type'      => 'listing',
    'posts_per_page' => 1, 
    'paged'          => 1,
    'meta_query' => array(
        'relation' => 'AND',
    ),
  );

  if ($bedrooms_min) {
    $featured_args['meta_query'][] = array(
      'key' => 'bedrooms',
      'value' => $bedrooms_min,
      'compare' => '>=',
      'type' => 'NUMERIC',
    );
  }
  if ($bedrooms_max) {
    $featured_args['meta_query'][] = array(
      'key' => 'bedrooms',
      'value' => $bedrooms_max,
      'compare' => '<=',
      'type' => 'NUMERIC',
    );
  }
  if ($bathrooms_min) {
    $featured_args['meta_query'][] = array(
      'key' => 'bathrooms',
      'value' => $bathrooms_min,
      'compare' => '>=',
      'type' => 'NUMERIC',
    );
  }
  if ($bathrooms_max) {
    $featured_args['meta_query'][] = array(
      'key' => 'bathrooms',
      'value' => $bathrooms_max,
      'compare' => '<=',
      'type' => 'NUMERIC',
    );
  }
  if ($status) {
    $featured_args['meta_query'][] = array(
      'key' => 'property_status',
      'value' => $status,
      'compare' => '=',
    );
  }
  $featured_query = new WP_Query($featured_args);
  $excluded_post_id = array();


  if ($featured_query->have_posts()) : 
    while ($featured_query->have_posts()) : $featured_query->the_post();
      get_template_part('template-parts/content', 'featured-listing'); 
      $excluded_post_id[] = get_the_ID();
    endwhile;
  else:
    echo '<span class="noproperty">No Any Properties Found</span>';
  endif;
  wp_reset_postdata()
  ?>
</div>

<div class="listings-with-background">
  <div class="container" style="max-width: 1440px; padding: 0px;">
    <div class="listinglist">
      <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
          'post_type'      => 'listing',
          'posts_per_page' => 4,
          'paged'          => $paged,
          'post__not_in'   => $excluded_post_id,
          'meta_query' => array(
              'relation' => 'AND',
          ),
        );

        if ($bedrooms_min) {
          $args['meta_query'][] = array(
              'key' => 'bedrooms',
              'value' => $bedrooms_min,
              'compare' => '>=',
              'type' => 'NUMERIC',
          );
        }
        if ($bedrooms_max) {
            $args['meta_query'][] = array(
                'key' => 'bedrooms',
                'value' => $bedrooms_max,
                'compare' => '<=',
                'type' => 'NUMERIC',
            );
        }
        if ($bathrooms_min) {
            $args['meta_query'][] = array(
                'key' => 'bathrooms',
                'value' => $bathrooms_min,
                'compare' => '>=',
                'type' => 'NUMERIC',
            );
        }
        if ($bathrooms_max) {
            $args['meta_query'][] = array(
                'key' => 'bathrooms',
                'value' => $bathrooms_max,
                'compare' => '<=',
                'type' => 'NUMERIC',
            );
        }
        if ($status) {
            $args['meta_query'][] = array(
                'key' => 'property_status',
                'value' => $status,
                'compare' => '=',
            );
        }
        $listing_query = new WP_Query($args);

        if ($listing_query->have_posts()) : 
          while ($listing_query->have_posts()) : $listing_query->the_post();
          get_template_part('template-parts/content', 'listing'); 
      ?>
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
</div>



<div id="filter-form" class="custom-modal">
  <div class="custom-modal-dialog">
  <div class="custom-modal-content">
    <div class="custom-modal-header">
      <h4 class="custom-modal-title">Filter Properties</h4>
      <span class="custom-close">&times;</span>
    </div>
    <div class="custom-modal-body">
      <div class="shortcode-container">
        <form class="property-filter-form">
          <!-- Bedrooms Range -->
          <div class="bedrooms-fields">
            <label for="bedrooms_min">#Bedrooms</label>
            <div>
              <input type="number" name="bedrooms_min" id="bedrooms_min" 
                  value="<?php echo isset($_GET['bedrooms_min']) ? esc_attr($_GET['bedrooms_min']) : ''; ?>" 
                  placeholder="Min">
            
              <label for="bedrooms_max">To</label>
              <input type="number" name="bedrooms_max" id="bedrooms_max" 
                    value="<?php echo isset($_GET['bedrooms_max']) ? esc_attr($_GET['bedrooms_max']) : ''; ?>" 
                    placeholder="Max">
            </div>
          </div>
          
          <!-- Bathrooms Range -->
          <div class="bathroom-fields">
            <label for="bathrooms_min">#Bathrooms</label>
            <div>
              <input type="number" name="bathrooms_min" id="bathrooms_min" 
                  value="<?php echo isset($_GET['bathrooms_min']) ? esc_attr($_GET['bathrooms_min']) : ''; ?>" 
                  placeholder="Min">
            
              <label for="bathrooms_max">To</label>
              <input type="number" name="bathrooms_max" id="bathrooms_max" 
                    value="<?php echo isset($_GET['bathrooms_max']) ? esc_attr($_GET['bathrooms_max']) : ''; ?>" 
                    placeholder="Max">
            </div>
          </div>
          
          <!-- Status Radio Buttons -->
          <div class="status-fields">
            <label>Status</label>
            <div>
              <input type="radio" id="available" name="status" value="available" 
                  <?php echo (isset($_GET['status']) && $_GET['status'] == 'available') ? 'checked' : ''; ?>>
              <label for="available">Available</label><br>

              <input type="radio" id="pending" name="status" value="pending" 
                    <?php echo (isset($_GET['status']) && $_GET['status'] == 'pending') ? 'checked' : ''; ?>>
              <label for="pending">Pending</label><br>

              <input type="radio" id="sold" name="status" value="sold" 
                    <?php echo (isset($_GET['status']) && $_GET['status'] == 'sold') ? 'checked' : ''; ?>>
              <label for="sold">Sold</label><br>
            </div>
          </div>

          <div class="modelbtn">
              <button type="button" class="btn btn-default custom-close-btn" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-default filterpropertiesbtn">Apply Filter</button>
          </div>
        </form>
      </div>
    </div>
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

<script>
  jQuery(document).ready(function($) {
    function checkFilters() {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('bedrooms_min') || urlParams.has('bedrooms_max') || urlParams.has('bathrooms_min') || urlParams.has('bathrooms_max') || urlParams.has('status')) {
            $('.reset_filter').show();
        } else {
            $('.reset_filter').hide();
        }
    }
    checkFilters();
    $('.reset_filter').click(function() {
        var url = window.location.href.split('?')[0];
        window.location.href = url;
    });
  });
</script>

<script>
  $(document).ready(function () {
      var modal = $("#filter-form");
      $(".filter-button").on("click", function (e) {
          e.preventDefault();
          $("body").addClass("modal-open");
          modal.fadeIn(200, function () {
              modal.addClass("show");
          });
      });

      function closeModal() {
          modal.removeClass("show");
          setTimeout(function () {
              modal.fadeOut(200, function () {
                  $("body").removeClass("modal-open");
              });
          }, 300);
      }

      $(".custom-close ,.custom-close-btn ").on("click", closeModal);
      $(window).on("click", function (event) {
          if ($(event.target).is(modal)) {
              closeModal();
          }
      });
  });
</script>