<?php
$price = get_post_meta(get_the_ID(), 'property_price', true);
$bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
$baths = get_post_meta(get_the_ID(), 'bathrooms', true);
$square_feet = get_post_meta(get_the_ID(), 'square_footage', true);
$rating = get_post_meta(get_the_ID(), 'property_rating', true);
?>

<div class="propertiess">
    <div class="propertiessub">
    <div class="feature_image_section">
        <a href="<?php the_permalink(); ?>">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="propertie_image" loading="lazy">
            <?php endif; ?>
        </a>
    </div>
    <div class="propertie_content">
        <a href="<?php the_permalink(); ?>">
            <h3 class="propertie_addresa"><?php the_title(); ?></h3>
        </a>
        <div class="propertie_price">
            <span class="price">$ <?php echo !empty($price) ? number_format($price) : 'N/A'; ?></span><br>
            <span class="rating"><img src="<?php echo get_template_directory_uri(); ?>/img/rating-star.png" class="propertie_filter_img" loading="lazy" data-ll-status="loaded"><?php echo !empty($rating) ? number_format($rating) : 'N/A'; ?></span>
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