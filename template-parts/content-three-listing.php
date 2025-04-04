<?php
$price = get_post_meta(get_the_ID(), 'property_price', true);
$bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true);
$baths = get_post_meta(get_the_ID(), 'bathrooms', true);
$square_feet = get_post_meta(get_the_ID(), 'square_footage', true);
?>
<style>
  .placard-container{
    background-color: #fff;
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
    position: relative;
    overflow: auto;
    box-shadow: 0 .125rem .9375rem #00000026;
    border-radius: .625rem;
  }
  .placard-image-container img {
    background-color: #e5e5e5;
    display: flex;
    cursor: pointer;
    width: 100%;
    aspect-ratio: 3 / 2;
    -o-object-fit: cover;
    object-fit: cover;
  }
  .for-sale-content-container{
    font-size: 1.25rem;
    line-height: 1.25rem;
    width: 100%;
    padding: .75rem 1rem;
    height: auto;
    flex-grow: 2;
  }
  .price-container, .title-container{
    font-weight: 500;
    font-size: 1rem;
    width: calc(100% - 1.875rem);
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    margin-bottom: 10px;
  }
  .title-container span{
    color: #1e73be;
  }
  .detailed-info-container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    font-size: .875rem;
    padding: 0;
    margin: 0;
    list-style-type: none;
  }
  .detailed-info-container li{
    color:rgb(147, 144, 144);
  }
  .detailed-info-container li:not(:first-child)::before{
    display: inline-block;
    content: "\a";
    width: .25rem;
    height: .25rem;
    border-radius: 50%;
    background: #b2b2b2;
    margin: 0 .5rem;
    transform: translateY(-.1875rem);
  }
</style>
<li class="placard-container">
  <a href="<?php the_permalink(); ?>">
    <div class="placard-image-container">
        <?php the_post_thumbnail('medium'); ?>
    </div>
    <div class="for-sale-content-container">
      <p class="title-container">
        <span><?php the_title(); ?></span>
      </p>
      <?php if (!empty($price)) : ?>
        <p class="price-container">
          <span><?php echo $price; ?></span>
        </p>
      <?php endif; ?>
      <ul class="detailed-info-container">
        <li><?php echo $bedrooms ?> Beds</li>
        <li><?php echo $baths ?> Baths</li>
        <li><?php echo $square_feet ?> Sq Ft</li>
      </ul>
    </div>
  </a>
</li>


