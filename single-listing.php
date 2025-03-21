<?php get_header(); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"/>

<!-- jQuery (Required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Slick JS -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

<style>
	@import url('https://fonts.cdnfonts.com/css/satoshi');
	body{
		background-color: #F2FAFF;
		font-family: 'Satoshi', sans-serif;
	}
  body.modal-open {
    overflow: hidden;
  }
	.main-slider  img{
		border-radius: 6px;
    width: 100%;
    height: 455px;
    object-fit: contain;
	}
	.slick-slide{
		display: flex !important;
		justify-content: center;
	}
	.slick-prev:before, .slick-next:before {
		color: #1B4965 !important;
		font-size: 29px;
	}
	.thumbnail-slider .slick-slide img{
		height: 78px;
    object-fit: cover;
    width: 94%;
    border-radius: 6px;
    margin: 0 3%;
    cursor: grab;
	}
</style>

<?php 
$property_price = get_post_meta(get_the_ID(), 'property_price', true);
$bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
$bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
$square_footage = get_post_meta(get_the_ID(), 'square_footage', true);
$property_address = get_post_meta(get_the_ID(), 'property_address', true);
$year_built = get_post_meta(get_the_ID(), 'year_built', true);
$lot_size = get_post_meta(get_the_ID(), 'lot_size', true);
$garage = get_post_meta(get_the_ID(), 'garage', true);
$property_description = get_post_meta(get_the_ID(), 'property_description', true);
$house_type = get_post_meta(get_the_ID(), 'house_type', true);
$arv = get_post_meta(get_the_ID(), 'arv', true);
$gallery = get_post_meta(get_the_ID(), 'property_gallery', true);
$author_id = get_post_field('post_author', $post_id);
$author_name = get_the_author_meta('display_name', $author_id);
$author_phone = get_user_meta($author_id, 'mobile', true);
$formatted_phone = $author_phone ? format_phone_number($author_phone) : 'No Phone Number';
$author_email = get_the_author_meta('user_email', $author_id);
$status = get_post_meta(get_the_ID(), 'property_status', true);


$inquiryshortcode = get_field('inquiry_form_shortcode');
$getoffershortcode = get_field('get_offer_form_shortcode');
$buynowshortcode = get_field('buy_now_form_shortcode');
?>

<div id="page">
  <section class="epl-single-property">
    <div class="container" style="max-width: 1370px;">
      <div class="left-section">
        <h1 class="property-title"><?php the_title(); ?></h1>
        <div class="single_pro_detail offer_submissiondate">
          <p class="property-details">
          <?php 
              if (!empty($property_price) || !empty($bedrooms) || !empty($bathrooms) || !empty($square_footage)) {
                  echo !empty($property_price) ? '$' . number_format($property_price, 0, '.', ',') : 'Price N/A';
                  echo ' • ';
                  echo !empty($bedrooms) ? esc_html($bedrooms) . ' Beds' : 'Beds N/A';
                  echo '/';
                  echo !empty($bathrooms) ? esc_html($bathrooms) . ' Baths' : 'Baths N/A';
                  echo ' • ';
                  echo !empty($square_footage) ? esc_html($square_footage) . ' SqFt' : 'Size N/A';
              } else {
                  echo 'Property details not available';
              }
          ?>
          </p>
          <div class="status_labels">
            <?php
              switch ($status) {
                case 'Sold':
                  $status_class = 'sold';
                  break;
                case 'Available':
                  $status_class = 'available';
                  break;
                case 'Pending':
                  $status_class = 'pending';
                  break;
                default:
                  $status_class = 'label';
                  $status = 'Unknown';
            }
            ?>
            <a href="#" class="availability <?php echo $status_class; ?>"><?php echo $status; ?></a>
          </div>
        </div>
        


        <?php if (!empty($gallery) && is_array($gallery)) : ?>
        <div class="property-slider">
          <div class="main-slider">
              <?php foreach ($gallery as $image_id) : ?>
                  <div><img src="<?php echo wp_get_attachment_url($image_id); ?>" alt="Property Image"></div>
              <?php endforeach; ?>
          </div>
          <div class="thumbnail-slider">
              <?php foreach ($gallery as $image_id) : ?>
                  <div><img src="<?php echo wp_get_attachment_url($image_id); ?>" alt="Thumbnail"></div>
              <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>

        <ul class="singlepro_details">
          <?php if (!empty($house_type)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/home.png" alt="">
                    <div class="single_detail">
                        <label>House Type</label>
                        <span><?php echo esc_html($house_type); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($bedrooms)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/bed.png" alt="">
                    <div class="single_detail">
                        <label>Bedrooms</label>
                        <span><?php echo esc_html($bedrooms); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($bathrooms)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/bathtub.png" alt="">
                    <div class="single_detail">
                        <label>Bathrooms</label>
                        <span><?php echo esc_html($bathrooms); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($year_built)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/build.png" alt="">
                    <div class="single_detail">
                        <label>Year Built</label>
                        <span><?php echo esc_html($year_built); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($square_footage)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/ruler.png" alt="">
                    <div class="single_detail">
                        <label>Approx. SqFt.</label>
                        <span><?php echo esc_html($square_footage); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($lot_size)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/scale.png" alt="">
                    <div class="single_detail">
                        <label>Lot size SqFt.</label>
                        <span><?php echo esc_html($lot_size); ?></span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>

          <?php if (!empty($garage)) : ?>
            <li>
                <div class="singlepro_details-section">
                    <img class="single-icon" src="<?php echo get_template_directory_uri(); ?>/img/garage.svg" alt="">
                    <div class="single_detail">
                        <label>Garage</label>
                        <span><?php echo esc_html($garage); ?> Garage</span>
                    </div> 
                </div>
            </li>
          <?php endif; ?>
        </ul>

        <?php if (!empty($property_description)) : ?>
          <div class="singlepro_description">
              <h4 class="sebtitle">Description</h4>
              <p class="singlepro_description_content"><?php echo wpautop($property_description); ?></p>
          </div>
        <?php endif; ?>

        <?php if (!empty($arv) || !empty($property_price)) : ?>
        <div class="singlepro_spread">
          <h4 class="sebtitle">Estimated Spread</h4>
          <ul class="singlepro_spread_content">
              <?php if (!empty($arv)) : ?>
                  <li>
                      <span class="spread_label">ARV</span>
                      <span class="spread_price">$<?php echo number_format($arv, 0, '.', ','); ?></span>
                  </li>
              <?php endif; ?>

              <?php if (!empty($property_price)) : ?>
                  <li>
                      <span class="spread_label">Price</span>
                      <span class="spread_price">$<?php echo number_format($property_price, 0, '.', ','); ?></span>
                  </li>
              <?php endif; ?>

              
              <li>
                  <span class="spread_label">Spread</span>
                  <span class="spread_price">
                      $<?php 
                          if (!empty($arv) && !empty($property_price)) {
                              echo number_format(max(0, $arv - $property_price), 0, '.', ',');
                          } elseif (!empty($arv)) {
                              echo number_format($arv, 0, '.', ',');
                          } elseif (!empty($property_price)) {
                              echo number_format($property_price, 0, '.', ',');
                          }
                      ?>
                  </span>
              </li>

          </ul>
        </div>
        <?php endif; ?>


      </div>
      <div class="right-section">
        <div class="propertie_sidebar_main">
          <div class="sidebar_avoid">
            <div class="prop_author_and_offer">
              <div class="propauthor_details">
                <div class="author_image">
                  <?php 
                    echo get_avatar($author_id, 100, '', 'Author Avatar', ['class' => 'author_avatar lazyloaded']); 
                  ?>
                </div>
                <div class="author_name_tag">
                  <h3><?php echo $author_name ? $author_name : 'N/A';?></h3>
                  <span class="author_tag"></span>
                </div>
              </div>
              <div class="propauthor_contact">
                <div class="propauthor_div">
                  <span class="prop_title">Phone</span>
                  <a class="prop_number" href="tel:<?php echo $author_phone ? preg_replace('/[^0-9]/', '', $author_phone) : ''; ?>">
                    <?php echo $formatted_phone ? $formatted_phone : 'No Phone Number';?>
                  </a>
                </div>
                <div class="propauthor_div">
                  <span class="prop_title">Email</span>
                  <a class="prop_number" href="mailto:<?php echo $author_email ? $author_email : ''; ?>">
                    <?php echo $author_email ? $author_email : 'No Email';?>
                  </a>
                </div>
                </div>
                <div class="propauthor_offer_buttons">
                  <a href="#" class="propmake_anoffer" data-toggle="modal" data-target="#makeanoffer">Make an Offer</a>

                  <?php if (!empty($property_price)) : ?>
                      <a href="#" class="prop_buynow" data-toggle="modal" data-target="#bynowmodel">
                          Buy now for $<?php echo number_format($property_price, 0, '.', ','); ?>
                      </a>
                  <?php endif; ?>
                </div>

              </div>
              <div class="prop_inquire_deal">
                <a href="#" class="prop_inquire action_button" data-toggle="modal" data-target="#makeininquery">Inquire About Property</a>
                <a href="<?php echo site_url('/listings'); ?>" class="prop_deal action_button">View Other Deals</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  $args = array(
      'post_type'      => 'listing', 
      'posts_per_page' => 5,
      'post__not_in'   => array(get_the_ID()),
      'orderby'        => 'date',
      'order'          => 'DESC'
  );

  $related_properties = new WP_Query($args);

  if ($related_properties->have_posts()) : ?>
  <section class="properties_similar_section_main">
    <div class="container" style="max-width: 1370px;">
      <h2 class="similar_pro_title">Similar Properties</h2>
      <div class="similar_properties_all">
        <?php while ($related_properties->have_posts()) : $related_properties->the_post(); ?>
          <?php 
            $price = get_post_meta(get_the_ID(), 'property_price', true);
            $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
            $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true);
            $square_footage = get_post_meta(get_the_ID(), 'square_footage', true);
          ?>
          <div class="similer_property">
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <img class="img-responsive img-rounded pro_feature_image lazyloaded" 
                     src="<?php the_post_thumbnail_url('medium'); ?>" 
                     alt="<?php the_title_attribute(); ?>" 
                     data-ll-status="loaded">
              <?php endif; ?>
            </a>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

            <?php if ($price) : ?>
              <span>$<?php echo number_format($price); ?></span>
            <?php endif; ?>

            <p>
              <?php
                $details = [];
                if ($bedrooms) $details[] = $bedrooms . ' Bedrooms';
                if ($bathrooms) $details[] = $bathrooms . ' Baths';
                if ($square_footage) $details[] = number_format($square_footage) . ' SqFt';

                echo implode(' | ', $details);
              ?>
            </p>
          </div>
        <?php endwhile; ?>
      </div>
    </div>  
  </section>
  <?php wp_reset_postdata(); ?>
  <?php endif; ?>

  <div id="makeininquery" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h4 class="custom-modal-title">Make an Inquiry</h4>
                <span class="custom-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <div class="shortcode-container">
                <?php 
                    if (!empty($inquiryshortcode)) {
                        echo do_shortcode($inquiryshortcode);
                    } else {
                        echo '<p>Please add a form shortcode from the dashboard.</p>';
                    } 
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div id="getoffer" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h4 class="custom-modal-title">Make an Offer</h4>
                <span class="custom-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <div class="shortcode-container">
                <?php 
                    if (!empty($getoffershortcode)) {
                        echo do_shortcode($getoffershortcode);
                    } else {
                        echo '<p>Please add a form shortcode from the dashboard.</p>';
                    } 
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>

  <div id="buynow" class="custom-modal">
    <div class="custom-modal-dialog">
        <div class="custom-modal-content">
            <div class="custom-modal-header">
                <h4 class="custom-modal-title">Buy Now</h4>
                <span class="custom-close">&times;</span>
            </div>
            <div class="custom-modal-body">
                <div class="shortcode-container">
                <?php 
                    if (!empty($buynowshortcode)) {
                        echo do_shortcode($buynowshortcode);
                    } else {
                        echo '<p>Please add a form shortcode from the dashboard.</p>';
                    } 
                ?>
                </div>
            </div>
        </div>
    </div>
  </div>
  

</div>



<script>
$(document).ready(function () {
    var modal = $("#makeininquery");
    var modalDialog = $(".custom-modal-dialog");
    $(".prop_inquire").on("click", function (e) {
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
    
    $(".custom-close, .custom-close-btn").on("click", closeModal);
    $(window).on("click", function (event) {
        if ($(event.target).is(modal)) {
            closeModal();
        }
    });
});
</script>


<script>
$(document).ready(function () {
    var modal = $("#getoffer");
    $(".propmake_anoffer").on("click", function (e) {
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

    $(".custom-close, .custom-close-btn").on("click", closeModal);
    $(window).on("click", function (event) {
        if ($(event.target).is(modal)) {
            closeModal();
        }
    });
});
</script>

<script>
$(document).ready(function () {
    var modal = $("#buynow");
    $(".prop_buynow").on("click", function (e) {
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

    $(".custom-close, .custom-close-btn").on("click", closeModal);
    $(window).on("click", function (event) {
        if ($(event.target).is(modal)) {
            closeModal();
        }
    });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let offerPriceField = document.getElementById("offer-price");

    if (offerPriceField) {
        offerPriceField.value = "<?php echo get_post_meta(get_the_ID(), 'property_price', true); ?>"; 
    }
});
</script>


<script>
jQuery(document).ready(function($){
    $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.thumbnail-slider'
    });

    $('.thumbnail-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        dots: false,
        focusOnSelect: true
    });
});
</script>

<?php get_footer(); ?>
