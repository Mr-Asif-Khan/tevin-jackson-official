<?php 
$grade_levels = get_post_meta(get_the_ID(), 'grade_levels', true)?  get_post_meta(get_the_ID(), 'grade_levels', true): 'No Grade Level';
$school_type = get_post_meta(get_the_ID(), 'school_type', true) ?  get_post_meta(get_the_ID(), 'school_type', true): 'No School Type';
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
    font-size: 18px;
    font-weight: 500;
  }
  .detailed-info-container, .school-excerpt{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    font-size: .875rem;
    padding: 0;
    margin: 0;
    list-style-type: none;
    white-space: pre-wrap;
  }
  .school-excerpt{
    font-size: 18px;
    font-weight: 200;
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
      <?php
      $content = wp_strip_all_tags(get_the_content());
      $trimmed_content = wp_trim_words($content, 10, '...');
      echo '<p class="school-excerpt">' . esc_html($grade_levels) . " • " . esc_html($school_type) . '</p>';      
      ?>
      
    </div>
  </a>
</li>


