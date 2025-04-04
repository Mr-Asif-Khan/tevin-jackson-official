<?php
$name = get_post_meta(get_the_ID(), 'agent_name', true);
$address = get_post_meta(get_the_ID(), 'agent_address', true);
?>


<style>

  .member-right-rail-container .search-for-homes-header-container .search-for-homes-header-line-1 .search-for-homes-header-school-label .search-for-homes-header-content {
    font-size: .875rem;
    font-weight: 400;
    line-height: 130%;
  }
  .member-right-rail-container .search-for-homes-header-container .search-for-homes-header-line-2 {
    display: flex;
    margin-bottom: 1rem;
  }

  .member-right-rail-container .search-for-homes-header-container .search-for-homes-header-line-2 .search-for-homes-school-name {
    font-size: 1.25rem;
    font-weight: 500;
    line-height: 130%;
  }

  .member-right-rail-container.hide, .member-right-rail-container .search-for-homes-header-container.hide {
    display: none;
  }

  .member-right-rail-container.member-agent-container {
    padding: 1.5rem;
  }
  .member-right-rail-container {
    background-color: #fff;
    border-radius: .625rem;
    box-shadow: 0 .25rem 1rem #00000029;
    overflow: unset;
  }
  .member-right-rail-container.member-agent-container .member-agent {
    align-items: center;
  }
  .member-right-rail-container .primary-info-container {
    display: flex;
    flex-flow: row nowrap;
    align-items: flex-start;
  }
  .member-right-rail-container.member-agent-container .member-agent img {
    width: 5.5rem;
    height: 5.5rem;
    min-width: 5.5rem;
    min-height: 5.5rem;
    max-width: 5.5rem;
    margin-right: .625rem;
  }
  .member-right-rail-container .primary-info-container img {
    width: 5.5rem;
    border-radius: .625rem;
    background-color: #f3f3f3;
    -o-object-fit: cover;
    object-fit: cover;
    -o-object-position: center;
    object-position: center;
  }
  .member-right-rail-container.member-agent-container .member-agent .info-wrapper {
    margin-top: .4375rem;
  }
  .member-right-rail-container.member-agent-container .member-agent .info-wrapper .agent-name.has-photo {
    max-width: 15.4375rem;
    margin-left: -1.125rem;
  }
  .member-right-rail-container.member-agent-container .member-agent .info-wrapper .agent-name {
    display: inline-block;
    font-size: 1.25rem;
    padding: .125rem .5rem;
    line-height: 130%;
    color: #fff;
    background: linear-gradient(to bottom, #c7202e 0%, #6b131c 100%);;
    border-radius: .125rem;
    margin-bottom: .0625rem;
    word-wrap: break-word;
    max-width: 20.4375rem;
  }
  .member-right-rail-container .primary-info-container .info-wrapper .agent-name {
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    word-break: break-word;
  }
  .member-right-rail-container .primary-info-container .info-wrapper .agent-name a {
    font-weight: inherit;
    line-height: inherit;
    color: inherit;
    background-color: transparent;
  }
  .member-right-rail-container .primary-info-container .info-wrapper .agent-agency-name {
    font-size: .875rem;
    line-height: 150%;
    height: 3.125rem;
  }
  .member-right-rail-container.member-agent-container .secondary-info-container {
    margin-top: 1rem;
    font-size: 1.125rem;
    line-height: 1.5;
    font-family: Outfit, sans-serif, sans-serif;
    font-weight: 200;
  }
  .member-right-rail-container.agent-card .message-container {
    display: flex;
    flex-direction: column;
    row-gap: .5rem;
    margin-top: 1rem;
  }
  .member-right-rail-container.agent-card .message-container p {
    width: 100%;
    background-color: #f3f3f3;
    background-image: linear-gradient(180deg, #f3f3f3, #ededed 66.15%);
    border: none;
    border-radius: .375rem;
    padding: .5rem 1rem;
    resize: none;
    font-weight: 200;
    font-size: 1.125rem;
    line-height: 150%;
    color: #000;
    overflow: auto;
  }
  .member-right-rail-container .cta-container {
    background-color: #fff;
    margin-top: 1rem;
  }
  .member-right-rail-container .cta-container .share-button {
    display: block;
    line-height: 150%;
    padding: .6875rem 2rem;
    width: 100%;
    text-align: center;
    background: linear-gradient(to bottom, #c7202e 0%, #6b131c 100%);
    border: none;
    color: #fff;
    font-size: 1rem;
    border-radius: .375rem;
    font-weight: 500;
    letter-spacing: .028125rem;
    font-family: Outfit, sans-serif, sans-serif;
  }

</style>


<div class="member-right-rail-container member-agent-container agent-card ">
    <div class="search-for-homes-header-container hide" id="search-for-homes-header-container">
        <div class="search-for-homes-header-line-1">
            <div class="search-for-homes-header-school-label">
                <span class="search-for-homes-header-content">NEIGHBORHOOD</span>
            </div>
        </div>
            <div class="search-for-homes-header-line-2">
                <span class="search-for-homes-school-name"><?php echo esc_html(get_query_var('neighborhood_title')); ?></span>
            </div>
    </div>

    <div class="primary-info-container member-agent">
      <a href="#" class="agent-img-container">
        <?php the_post_thumbnail('medium'); ?>
      </a>
      <div class="info-wrapper">
        <div id="agent-card-name-container" class="agent-name has-photo" style="opacity: 1;">
            <a id="member-agent-name" class="standard-link" href="#" style="width: 155.016px;"><?php echo $name?></a>
        </div>
        <div class="agent-agency-name">
          <?php echo $address?>
        </div>
      </div>
    </div>

    <div class="secondary-info-container">
      <div class="message-container">
        <p>
        <?php
          $words = preg_split('/\s+/', trim($name));
          $first_name = $words[0];
          echo $first_name;
          ?>, I'd like to learn more about homes in Five Points.</p>
      </div>
    </div>

    <div class="cta-container">
        <button id="open-member-lead-form-btn" data-key="hpnkz40" class="share-button btn-component large primary js-contact-agent">
            Learn More
        </button>
    </div>
</div>


<script>
  document.addEventListener("scroll", function() {
    let stickyDiv = document.querySelector(".uagb-position__sticky.wp-block-uagb-container.uagb-block-11f58119");
    let targetDiv = document.querySelector(".search-for-homes-header-container");

    if (stickyDiv && targetDiv) {
        if (stickyDiv.classList.contains("uagb-position__sticky--stuck")) {
          targetDiv.classList.remove("hide");
        } else {
          targetDiv.classList.add("hide");
        }
    }
  });
</script>