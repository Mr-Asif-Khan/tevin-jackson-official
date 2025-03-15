<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tevin_Jackson_Official
 */

?>

</div><!-- #page -->
<footer class="footer_wrap">
    <div class="container">
        <div class="footer_link_wrap">
            <div class="footer_link">
                <h4>LEARN MORE</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer_learn_more',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'walker'         => new Custom_Footer_Walker()
                )); 
                ?>
            </div>
            <div class="footer_link">
                <h4>COMPANY</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer_company',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'walker'         => new Custom_Footer_Walker()
                )); 
                ?>
            </div>
            <div class="footer_link">
                <h4>SUPPORT</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer_support',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'walker'         => new Custom_Footer_Walker()
                )); 
                ?>
            </div>
            <div class="footer_link">
                <h4>RESOURCES</h4>
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer_resources',
                    'container'      => false,
                    'items_wrap'     => '<ul>%3$s</ul>',
                    'walker'         => new Custom_Footer_Walker()
                )); 
                ?>
            </div>
        </div>
        <div class="footer_logo_wrap">
            <div class="item">
                <a href="https://cardoneuniversity.com/" target="_blank" aria-label="Visit Cardone University">
                    <img src="<?php echo get_template_directory_uri() ?>/img/cardoneuniversity.webp" class="img-fluid" width="150" alt="">
                </a>
            </div>
            <div class="item">
                <a href="https://gctv.com/?_gl=1*1nw1y9i*_gcl_au*OTM0MTY5MzgzLjE3NDA4MjYwOTU." target="_blank" aria-label="Visit Grant Cardone TV">
                    <img src="<?php echo get_template_directory_uri() ?>/img/grantcardonetv-logo.webp" class="img-fluid" width="150" alt="">
                </a>
            </div>
            <div class="item">
                <a href="https://cardoneondemand.com/" target="_blank" aria-label="Visit Cardone On Demand">
                    <img src="<?php echo get_template_directory_uri() ?>/img/cardoneondemand-1.webp" class="img-fluid" width="150" alt="">
                </a>
            </div>
            <div class="item">
                <a href="https://cardonecapital.com/" target="_blank" aria-label="Visit Cardone Capital">
                    <img src="<?php echo get_template_directory_uri() ?>/img/cardonecapital-logo.webp" class="img-fluid" width="150" alt="">
                </a>
            </div>
            <div class="item">
                <a href="https://grantcardonefoundation.com/" target="_blank" aria-label="Visit Grant Cardone Foundation">
                    <img src="<?php echo get_template_directory_uri() ?>/img/2021.02.16-white-thegcfoundation-horizontal-logo.png" class="img-fluid" width="150" alt="">
                </a>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © 2021-2025 Grant Cardone Training Technologies, Inc., All Rights Reserved. </p>
        </div>
    </div>
</footer>
<a href="javascript:;" id="button-top">
    <svg class="custom-svg-icon" data-name="mk-icon-chevron-up" data-cacheid="icon-67c8a21ae028d" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
        <path d="M1683 1331l-166 165q-19 19-45 19t-45-19l-531-531-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path>
    </svg>
</a>
<?php wp_footer(); ?>

</body>
</html>
