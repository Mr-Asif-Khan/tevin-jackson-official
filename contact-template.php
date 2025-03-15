<?php
/**
 * Template Name: Contact
 */

get_header(); 
$shortcode = get_field('contact_form_shortcode');
?>

<div id="body">

    <!-- Contact Info -->
    <section class="contact-info">
      <div class="container">
        <div class="contact-info-left">
          <h1>Cardone EnterPrise</h1>
          <div class="address1">
              <ul>
                  <li><strong>Miami Headquarters</strong></li>
                  <li>18909 NE 29th Ave</li>
                  <li>Aventura, FL 33180</li>
                  <li><strong>Toll-Free</strong>: <a href="tel:8003685771"> (800) 368-5771</a></li>
                  <li><strong>Office</strong>: <a href="tel:3107770255"> (310) 777-0255</a></li>
                  <li><strong>Fax</strong>: <a href="fax:3107770256"> (310) 777-0256</a></li>
              </ul>
          </div>
          <div class="address2">
            <ul>
                <li><strong>Scottsdale Headquarters</strong></li>
                <li>16435 N. Scottsdale Road</li>
                <li>Suite 400</li>
                <li>Scottsdale, AZ 85254</li>
                <li><strong>Phone</strong>: <a href="tel:6026130150"> (602) 613-0150</a></li>
                <li><strong>Fax</strong>: <a href="fax:6026130146"> (602) 613-0146</a></li>
            </ul>
          </div>
        </div>

        <div class="contact-info-right">
          <?php
                if (!empty($shortcode)) {
                    echo do_shortcode($shortcode);
                } else {
                    echo '<p>Please add a form shortcode from the dashboard.</p>';
                } 
           ?>
        </div>
      </div>
    </section>
    <!-- Contact Info End -->

    <!-- Contact Banner Section -->
    <section class="contact-banner">
      <div class="container">
        <div class="contact-banner-content">
          <h1 class="text-center">JOIN GRANT’S 10X STRATEGY OF THE WEEK</h1>
          <p>BE PART OF THE 10X NATION.</p>
          <a href="#">JOIN EMAIL LIST</a>
        </div>
      </div>
    </section>
    <!-- Contact Banner Section End -->
</div>

<?php get_footer(); ?>