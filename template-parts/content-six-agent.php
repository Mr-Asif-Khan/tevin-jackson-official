<?php
$name = get_post_meta(get_the_ID(), 'agent_name', true);
$address = get_post_meta(get_the_ID(), 'agent_address', true);
$number = get_post_meta(get_the_ID(), 'agent_number', true);
$formatted_number = $number ? format_phone_number($number) : 'No Phone Number';
$total_sales = get_post_meta(get_the_ID(), 'agent_total_sales', true);
$price = get_post_meta(get_the_ID(), 'agent_price', true);
?>

<style>
  .agent-results-item {
    position: relative;
    list-style: none;
  }
  .agent-placard-container {
    position: relative;
    height: 100%;
    width: 100%;
  }
  .agent-placard-container .agent-placard-link {
    border: 1px solid #d2d2d2;
    color: inherit;
    outline: none;
  }
  .agent-placard-container .agent-placard-link {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
    border-radius: .625rem;
    overflow: hidden;
    cursor: pointer;
  }
  .agent-placard-container .agent-placard {
    position: relative;
    display: flex;
    height: 100%;
    line-height: 150%;
    font-size: 1.125rem;
  }
  .agent-placard-container .agent-placard .image-container {
    max-height: 12.0625rem;
    height: auto;
    width: 10.8125rem;
    min-height: 100%;
    position: relative;
  }
  .agent-placard-container .agent-placard .image-container img {
    o-object-fit: cover;
    object-fit: cover;
    -o-object-position: center;
    object-position: center;
    overflow: hidden;
    overflow-clip-margin: unset;
    border-right: 1px solid #d2d2d2;
    position: relative;
    height: 100%;
    width: 100%;
    background-color: #f3f3f3;
    z-index: -1;
  }
  .agent-placard-container .agent-placard .details-container{
    width: calc(99% - 10.8125rem);
    padding: .75em .25em .75em 1em;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .standard .agent-placard-container .agent-placard .details-container p {
    margin: 0;
    line-height: 150%;
    font-size: 1.125rem;
    font-weight: 200;
  }
  .agent-placard-container .agent-placard .name-container {
    background: linear-gradient(to bottom, #c7202e 0%, #6b131c 100%);
    border-radius: .125rem;
    color: #fff;
    display: inline-block;
    margin-bottom: .125rem;
    margin-left: -2.5rem;
    max-width: 15.4375rem;
    overflow: hidden;
    padding: .25rem .75rem;
    position: relative;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    width: fit-content;
  }
  .agent-placard-container .agent-placard .name-container .agent-name {
    font-weight: 500 !important;
    line-height: 120%;
    margin: 0;
    /* width: 111.6px; */
    color: white;
  }
  .agent-placard-container .agent-placard .details-container .company {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 120%;
    margin-bottom: .125rem;
    font-size: 18px;
  }
</style>

<li class="agent-results-item standard member">
  <article class="agent-placard-container" placard-id="agent" data-key="ftfk6wv">
    <div class="agent-placard-link">
      <div class="agent-placard">
        <div class="image-container">
          <?php the_post_thumbnail('medium'); ?>
        </div>
        <div class="details-container">
          <div class="name-container">
            <p class="agent-name member-agent"><?php echo $name?></p>
          </div>
          <p class="company"><?php echo $address?></p>
          <p class="phone"><?php echo $formatted_number ? $formatted_number : 'No Phone Number';?></p>
          <p class="total-sales"><span style="font-weight: 500;"><?php echo $total_sales?></span> Total Sales</p>
          <p class="price-range"><span style="font-weight: 500;">$<?php echo !empty($price) ? number_format($price) : 'N/A'; ?></span> Price</p>
        </div>

        <div class="loading-data">
            <div class="loading-bars-sm"></div>
            <div class="loading-bars-sm"></div>
            <div class="loading-bars-sm"></div>
        </div>
      </div>
      <!-- <a target="_self" rel="noopener" href="/real-estate-agents/patrick-tuttle/ftfk6wv/" title="Patrick Tuttle">
          <address> Patrick Tuttle</address>
      </a> -->
    </div>
  </article>
</li>