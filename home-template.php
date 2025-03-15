<?php
/**
 * Template Name: Home
 */

get_header(); 

$header_video = get_field('header_video');
$about_section = get_field('about_section');
// var_dump($about_section);exit;
?>

<div id="body">
    <!-- Header -->
    <!-- <header id="header">
        <div class="header_top">
            <div class="container">
                <div class="header-nav-links">
                    <ul>
                        <li>
                            <a href="javascript:;">LOGIN:</a>
                        </li>
                        <li>
                            <a href="https://training.grantcardone.com/login" target="_blank">CU INDIVIDUAL</a>
                        </li>
                        <li>
                            <a href="https://cardone.lightspeedvt.com/" target="_blank">CU CORPORATE</a>
                        </li>
                        <li>
                            <a href="https://cardoneondemand.lightspeedvt.com/" target="_blank">CARDONE ON DEMAND</a>
                        </li>
                        <li>
                            <a href="javascript:;">Call Our Office: (310) 777-0255</a>
                        </li>
                    </ul>
                    <ul class="social-bar">
                        <li>
                            <a class="youtube-glow " target="_blank" rel="noreferrer noopener" href="https://www.youtube.com/user/GrantCardone">
                                <svg class="custom-svg-icon" data-name="mk-jupiter-icon-youtube" data-cacheid="icon-67c23405688e5" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentcolor" d="M202.48 284.307v-14.152l-56.999-.098v13.924l17.791.053v95.84h17.835l-.013-95.567h21.386zm24.889 65.266c0 7.385.448 11.076-.017 12.377-1.446 3.965-7.964 8.156-10.513.43-.427-1.353-.049-5.44-.049-12.447l-.07-51.394h-17.734l.053 50.578c.022 7.752-.172 13.537.061 16.164.44 4.644.286 10.049 4.584 13.133 8.026 5.793 23.391-.861 27.24-9.123l-.04 10.547 14.319.019v-81.318h-17.835v51.035zm46.259-47.854l.062-31.592-17.809.035-.089 109.006 14.645-.219 1.335-6.785c18.715 17.166 30.485 5.404 30.458-15.174l-.035-42.49c-.017-16.183-12.129-25.887-28.567-12.781zm15.364 58.35c0 3.524-3.515 6.39-7.805 6.39s-7.797-2.867-7.797-6.39v-47.695c0-3.526 3.507-6.408 7.797-6.408 4.289 0 7.805 2.883 7.805 6.408v47.695zm-36.294-164.046c4.343 0 7.876-3.912 7.876-8.698v-44.983c0-4.778-3.532-8.684-7.876-8.684-4.338 0-7.903 3.906-7.903 8.684v44.984c0 4.786 3.565 8.698 7.903 8.698zm3.302-202.423c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm31.394 129.297h16.34v65.764c0 3.564 2.935 6.473 6.505 6.473 3.586 0 6.512-2.909 6.512-6.473v-65.764h15.649v84.5h-19.866l.334-6.996c-1.354 2.844-3.024 4.971-5.001 6.399-1.988 1.433-4.255 2.127-6.83 2.127-2.928 0-5.381-.681-7.297-2.026-1.933-1.366-3.366-3.178-4.29-5.418-.915-2.26-1.476-4.602-1.705-7.037-.219-2.457-.351-7.295-.351-14.556v-56.991zm-48.83.883c3.511-2.769 8.003-4.158 13.471-4.158 4.592 0 8.539.901 11.826 2.673 3.305 1.771 5.854 4.083 7.631 6.931 1.801 2.856 3.022 5.793 3.673 8.799.66 3.046.994 7.643.994 13.836v21.369c0 7.84-.317 13.606-.923 17.267-.599 3.67-1.908 7.072-3.912 10.272-1.988 3.156-4.544 5.52-7.647 7.028-3.137 1.516-6.733 2.259-10.786 2.259-4.531 0-8.341-.619-11.488-1.933-3.156-1.292-5.59-3.261-7.331-5.858-1.754-2.594-2.985-5.772-3.727-9.468-.756-3.7-1.113-9.26-1.113-16.666v-22.371c0-8.113.685-14.446 2.026-19.012 1.345-4.549 3.78-8.211 7.305-10.966zm-52.06-34.18l11.946 41.353 11.77-41.239h20.512l-22.16 55.523-.023 64.81h-18.736l-.031-64.788-23.566-55.659h20.287zm197.528 280.428c0 21.764-18.882 39.572-41.947 39.572h-172.476c-23.078 0-41.951-17.808-41.951-39.572v-90.733c0-21.755 18.873-39.573 41.951-39.573h172.476c23.065 0 41.947 17.819 41.947 39.573v90.733zm-39.38-18.602l-.034 1.803v7.453c0 4-3.297 7.244-7.298 7.244h-2.619c-4.015 0-7.313-3.244-7.313-7.244v-19.61h30.617v-11.515c0-8.42-.229-16.832-.924-21.651-2.188-15.224-23.549-17.64-34.353-9.853-3.384 2.435-5.978 5.695-7.478 10.074-1.522 4.377-2.269 10.363-2.269 17.967v25.317c0 42.113 51.14 36.162 45.041-.053l-13.37.068zm-16.947-34.244c0-4.361 3.586-7.922 7.964-7.922h1.063c4.394 0 7.981 3.56 7.981 7.922l-.192 9.81h-16.887l.072-9.81z"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="facebook-glow " target="_blank" rel="noreferrer noopener" href="https://www.facebook.com/grantcardonefan/">
                                <svg class="custom-svg-icon" data-name="mk-jupiter-icon-facebook" data-cacheid="icon-67c234056895a" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentcolor" d="M256-6.4c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm64.057 159.299h-49.041c-7.42 0-14.918 7.452-14.918 12.99v19.487h63.723c-2.081 28.41-6.407 64.679-6.407 64.679h-57.566v159.545h-63.929v-159.545h-32.756v-64.474h32.756v-33.53c0-8.098-1.706-62.336 70.46-62.336h57.678v63.183z"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="instagram-glow " target="_blank" rel="noreferrer noopener" href="https://www.instagram.com/grantcardone/?hl=en">
                                <svg class="custom-svg-icon" data-name="mk-jupiter-icon-instagram" data-cacheid="icon-67c23405689c1" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentcolor" d="M375.3,197.7L375.3,197.7c-0.6-11.5-2.2-20.4-5-27.1c-2.5-6.7-5.7-11.8-10.9-17c-5.9-5.5-10.5-8.4-16.9-10.9 c-4.1-1.8-11.3-4.3-27.1-5c-15.4-0.7-20.4-0.7-58.8-0.7s-43.4,0-58.8,0.7c-11.5,0.6-20.4,2.2-27,5c-6.7,2.5-11.8,5.7-17,10.9 c-5.5,5.9-8.4,10.5-10.9,16.9c-1.8,4.1-4.3,11.3-5,27.1c-0.7,15.4-0.7,20.4-0.7,58.8s0,43.4,0.7,58.8c0.4,14.3,2.9,22,5,27.1 c2.5,6.7,5.7,11.8,10.9,17c5.9,5.5,10.5,8.4,16.9,10.9c4.1,1.8,11.3,4.3,27.1,5c15.4,0.7,20.4,0.7,58.8,0.7s43.4,0,58.8-0.7 c11.5-0.6,20.4-2.2,27-5c6.7-2.5,11.8-5.7,17-10.9c5.5-5.9,8.4-10.5,10.9-16.9c1.8-4.1,4.3-11.3,5-27.1l0.2-3.4 c0.6-13.1,0.9-19.7,0.5-55.5C376,218,376,213.1,375.3,197.7z M351.4,178.7c0,9.4-7.7,17.1-17.1,17.1c-9.4,0-17.1-7.7-17.1-17.1 c0-9.4,7.7-17.1,17.1-17.1C343.7,161.6,351.4,169.3,351.4,178.7z M256.5,330.6c-40.9,0-74.1-33.2-74.1-74.1 c0-40.9,33.2-74.1,74.1-74.1c40.9,0,74.1,33.2,74.1,74.1C330.6,297.4,297.4,330.6,256.5,330.6z"></path>
                                    <ellipse transform="matrix(0.9732 -0.2298 0.2298 0.9732 -52.0702 65.7936)" cx="256.5" cy="256.5" rx="48.9" ry="48.9"></ellipse>
                                    <path fill="currentcolor" d="M437.9,75.1C389.4,26.7,325,0,256.5,0C188,0,123.6,26.7,75.1,75.1S0,188,0,256.5C0,325,26.7,389.4,75.1,437.9 C123.6,486.3,188,513,256.5,513c68.5,0,132.9-26.7,181.4-75.1C486.3,389.4,513,325,513,256.5C513,188,486.3,123.6,437.9,75.1z  M400.8,316.4L400.8,316.4c-0.6,14.1-2.7,24.7-6.8,35.3c-4.2,10.5-9.2,18.2-16.7,25.6c-8,8-16,13.2-25.6,16.7 c-10.4,4-21.3,6.1-35.3,6.8c-15.4,0.7-20.5,0.7-59.9,0.7c-39.3,0-44.4,0-59.9-0.7c-14.1-0.6-24.7-2.6-35.3-6.8 c-10.5-4.2-18.2-9.2-25.6-16.7c-8.1-8.1-13.2-16-16.7-25.6c-4-10.4-6.1-21.3-6.8-35.3c-0.7-15.4-0.7-20.5-0.7-59.9 c0-39.3,0-44.4,0.7-59.9c0.6-14.1,2.6-24.7,6.8-35.3c3.9-9.7,9-17.6,16.7-25.6c8.1-8.1,16-13.2,25.6-16.7c10.4-4,21.3-6.1,35.3-6.8 c15.4-0.7,20.5-0.7,59.9-0.7c39.3,0,44.4,0,59.9,0.7c14.1,0.6,24.7,2.6,35.3,6.8c10.5,4.2,18.1,9.2,25.6,16.7 c8,8.1,13.2,16,16.7,25.6c4,10.4,6.1,21.3,6.8,35.3c0.7,15.4,0.7,20.5,0.7,59.9C401.5,295.8,401.5,300.9,400.8,316.4z"></path>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="linkedin-glow " target="_blank" rel="noreferrer noopener" href="https://www.linkedin.com/in/grantcardone">
                                <svg class="custom-svg-icon" data-name="mk-jupiter-icon-linkedin" data-cacheid="icon-67c2340568a2e" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentcolor" d="M256-6.4c-141.385 0-256 114.615-256 256s114.615 256 256 256 256-114.615 256-256-114.615-256-256-256zm-96.612 95.448c19.722 0 31.845 13.952 32.215 32.284 0 17.943-12.492 32.311-32.592 32.311h-.389c-19.308 0-31.842-14.368-31.842-32.311 0-18.332 12.897-32.284 32.609-32.284zm32.685 288.552h-64.073v-192h64.073v192zm223.927-.089h-63.77v-97.087c0-27.506-11.119-46.257-34.797-46.257-18.092 0-22.348 12.656-27.075 24.868-1.724 4.382-2.165 10.468-2.165 16.583v101.892h-64.193s.881-173.01 0-192.221h57.693v.31h6.469v19.407c9.562-12.087 25.015-24.527 52.495-24.527 43.069 0 75.344 29.25 75.344 92.077v104.954z"></path>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header_bottom">
            <div class="container">
                <div class="header_bottom_inner">
                    <div class="logo">
                        <a href="/">
                            <img src="<?php echo get_template_directory_uri() ?>/img/tj-logo-black.svg" class="img-fluid" width="150" height="29" alt="">
                        </a>
                    </div>
                    <div class="header_actions">
                        <nav id="main-menu">
                            <ul>
                                <li class="nav-block dropdown-toggle">
                                    <a href="/about-grant.html">About</a>
                                </li>
                                <li class="nav-block dropdown-toggle">
                                    <a href="#">Resources</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="/freebooks.html">Free Books</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-block dropdown-toggle">
                                    <a href="#">Listings</a>
                                </li>
                                <li class="nav-block dropdown-toggle">
                                    <a href="#">Contact</a>
                                </li>
                                <li class="nav-block tab-show dropdown-toggle">
                                    <a href="#">Login</a>
                                    <ul class="dropdown">
                                        <li>
                                            <a href="#">CARDONE U</a>
                                        </li>
                                        <li>
                                            <a href="#">CARDONE ON DEMAND</a>
                                        </li>
                                        <li>
                                            <a href="#">CARDONE TRAINING</a>
                                        </li>
                                        <li>
                                            <a href="#">CARDONE STORE</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="search-icon">
                            <a class="mk-search-trigger" href="javascrit:;">
                                <svg class="custom-svg-icon" data-name="mk-icon-search" data-cacheid="icon-67c234056a97e" style="height:16px;width:14.8571428571px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1664 1792">
                                    <path fill="currentcolor" d="M1152 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="tab-show">
                            <div class="tab-search">
                                <input type="text" class="text-input" value="" name="s" id="s" placeholder="Search..">
                                <button>
                                    <svg class="custom-svg-icon" data-name="mk-icon-search" data-cacheid="icon-67c231bea8a72" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1664 1792">
                                        <path fill="currentcolor" d="M1152 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="header-button">
                            <a href="#">Get Offer</a>
                        </div>
                    </div>
                    <div class="menu-btn">
                        <a href="javascript:;" class="header__nav-button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header> -->
    <!-- Header End -->

    <!-- Search Overlay Start-->
    <!-- <div class="search-panel ">
        <a href="#" class="search-close">
            <svg class="custom-svg-icon" data-name="mk-moon-close-2" data-cacheid="icon-67c8a21ae0453" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M390.628 345.372l-45.256 45.256-89.372-89.373-89.373 89.372-45.255-45.255 89.373-89.372-89.372-89.373 45.254-45.254 89.373 89.372 89.372-89.373 45.256 45.255-89.373 89.373 89.373 89.372z"></path>
            </svg>
        </a>
        <div class="search-wrapper">
            <p>Start typing and press Enter to search</p>
            <form method="get" id="search-form-overlay" action="https://grantcardone.com/">
                <input type="text" value="" name="s" id="search-form-input" class="lazyloaded">
                <i class="search-form-icon">
                    <svg class="custom-svg-icon" style="height:25px;width:23.2142857143px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1664 1792">
                        <path d="M1152 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"></path>
                    </svg>
                </i>
            </form>
        </div>
    </div> -->
    <!-- Search Overlay End-->

    <!-- Video Banner Start -->
    <section class="hero-section">
        <video autoplay muted loop playsinline>
            <source src="<?php echo $header_video; ?>" type="video/mp4">
        </video>
        <div class="container">
            <div class="hero-content-row">
                <div class="hero-event">
                    <h4>
                        Next 10 <span>x</span>
                        event
                    </h4>
                    <div class="single_event">
                        <a href="#">
                            <div class="event_img">
                                <img src="<?php echo get_template_directory_uri() ?>/img/thumb-300x300.webp" class="img-fluid" alt="">
                            </div>
                            <span class="event_date">
                                19 <i>Mar</i>
                            </span>
                            <div class="event_info">
                                <h4>10X Growth Conference 2025</h4>
                                <ul>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                                <path fill="currentcolor" d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                                            </svg>
                                        </span>
                                        MGM Grand, Las Vegas, Nevada
                                    </li>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <path fill="currentcolor" d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z"/>
                                            </svg>
                                        </span>
                                        9:00 am - 6:00 pm 
                                    </li>
                                </ul>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="hero-follow">
                    <h4>Follow us </h4>
                    <ul>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                    <path fill="Currentcolor" d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="Currentcolor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                    <path fill="Currentcolor" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="Currentcolor" d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="Currentcolor" d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="Currentcolor" d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <a href="#" class="button">SECURE YOUR SPOT NOW!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Banner End -->

    <!-- About Section Start -->
    <section class="about_section">
        <div class="container">
            <?php if(!empty($about_section['top_heading'])): ?>
                <h4>
                    <span><?php echo $about_section['top_heading']; ?></span>
                </h4>
            <?php endif; ?>
            <?php if(!empty($about_section['main_heading'])): ?>
                <div class="text-center">
                    <h2><?php echo $about_section['main_heading']; ?></h2>
                </div>
            <?php endif; ?>
            
            <div class="about_row">
                <?php if(!empty($about_section['text_left'])): ?>
                    <div class="content">
                        <?php echo $about_section['text_left']; ?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($about_section['about_image'])): ?>
                    <div class="image">
                        <img src="<?php echo $about_section['about_image']; ?>" class="img-fluid" alt="">
                    </div>
                <?php endif; ?>
                <?php if(!empty($about_section['text_right'])): ?>
                    <div class="content">
                        <?php echo $about_section['text_right']; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Service Section Start -->
    <section class="service_section">
        <div class="container">
            <div class="service_row">
                <div class="single_service">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri() ?>/img/10x-event-new-pic.webp" class="img-fluid" alt="">
                        <div class="overlay">
                            <h2>
                                10<span>X</span>
                                <br>Events
                            </h2>
                            <h2>Click Here</h2>
                        </div>
                    </a>
                </div>
                <div class="single_service">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri() ?>/img/10x-podcast-2.webp" class="img-fluid" alt="">
                        <div class="overlay">
                            <h2>
                                10<span>X</span>
                                <br>Podcast
                            </h2>
                            <h2>Click Here</h2>
                        </div>
                    </a>
                </div>
                <div class="single_service">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri() ?>/img/10x-training-grant-web.webp" class="img-fluid" alt="">
                        <div class="overlay">
                            <h2>
                                10<span>X</span>
                                <br>training
                            </h2>
                            <h2>Click Here</h2>
                        </div>
                    </a>
                </div>
                <div class="single_service">
                    <a href="#">
                        <img src="<?php echo get_template_directory_uri() ?>/img/10x-studio-2.webp" class="img-fluid" alt="">
                        <div class="overlay">
                            <h2>
                                10<span>X</span>
                                <br>studios
                            </h2>
                            <h2>Click Here</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section End -->

    <!-- Testimonials Section Start -->
    <?php get_template_part('template-parts/testimonials'); ?>
    <!-- Testimonials Section Start -->
    
    <!-- Use Book Section Start -->
    <section class="use_book">
        <div class="container">
            <div class="text-center">
                <h2>
                    USE THESE BOOKS TO <br class="mobile-show">
                    10<span>x</span>
                    YOUR LIFE!
                </h2>
            </div>
        </div>
    </section>
    <!-- Testimonials Section Start -->
    
    <!-- Use Book Row Section Start -->
    <section class="use_book_row">
        <div class="part" data-aos="fade-right">
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/10x-rule-2.webp" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/sell-or-be-sold-2.jpeg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/10x-kids-book.jpg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/closer-2.jpeg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
        <div class="part" data-aos="fade-left">
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/millionaire_booklet-2.jpeg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/sell-or-be-sold-2.jpeg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/10x-kids-book.jpg" class="img-fluid" alt="">
                </a>
            </div>
            <div class="item">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri() ?>/img/closer-2.jpeg" class="img-fluid" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- Use Book Row Section End -->

    <!-- Articles Section Start -->
    <section class="home_articles">
        <div class="text-center">
            <h2>MOST RECENT ARTICLES</h2>
        </div>
        <div class="home_articles_row">
            <div class="article_item">
                <img src="<?php echo get_template_directory_uri() ?>/img/wayfair-earnings.webp" alt="">
                <div class="overlay">
                    <time datetime="2024-12-27">
                        <a href="https://grantcardone.com/2024/12/">December 27, 2024</a>
                    </time>
                    <h3>
                        <a href="#">Wayfair Keeps Earnings Up In a Shaky Housing Market</a>
                    </h3>
                    <a href="#" class="btn btn-white">READ MORE</a>
                </div>
            </div>
            <div class="article_item">
                <img src="<?php echo get_template_directory_uri() ?>/img/spirit-airlines-bankruptcy.webp" alt="">
                <div class="overlay">
                    <time datetime="2024-12-27">
                        <a href="https://grantcardone.com/2024/12/">December 19, 2024</a>
                    </time>
                    <h3>
                        <a href="https://grantcardone.com/the-missteps-that-led-to-spirit-airlines-bankruptcy/">The Missteps That Led to Spirit Airline’s Bankruptcy</a>
                    </h3>
                    <a href="#" class="btn btn-white">READ MORE</a>
                </div>
            </div>
            <div class="article_item">
                <img src="<?php echo get_template_directory_uri() ?>/img/mcdonalds-new-menu.webp" alt="">
                <div class="overlay">
                    <time datetime="2024-12-27">
                        <a href="https://grantcardone.com/2024/12/">December 17, 2024</a>
                    </time>
                    <h3>
                        <a href="#">Can McDonald’s New Menu Boost Company Sales?</a>
                    </h3>
                    <a href="#" class="btn btn-white">READ MORE</a>
                </div>
            </div>
            <div class="article_item">
                <img src="<?php echo get_template_directory_uri() ?>/img/disney-streaming-revenue.webp" alt="">
                <div class="overlay">
                    <time datetime="2024-12-27">
                        <a href="https://grantcardone.com/2024/12/">December 16, 2024</a>
                    </time>
                    <h3>
                        <a href="#">Disney’s Streaming Revenue Promises Positive Outlook</a>
                    </h3>
                    <a href="#" class="btn btn-white">READ MORE</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Articles Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter_section">
        <div class="newsletter_head">
            <h2>
                SIGN <span>UP</span>
                TO GET <span>GRANT’S </span>
                <br class="mobile-show">STRATEGY OF THE WEEK
            </h2>
            <div class="glass_button">
                <div class="button_wrap">
                    <a href="#">Subscribe Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->

    <!-- Lets Connect Section Start -->
    <section class="lets_connect">
        <div class="container">
            <div class="lets_connect_row" data-aos="zoom-in" data-aos-duration="2000">
                <div class="img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/tevin-jackson-mobile.png" class="img-fluid" alt="">
                </div>
                <div class="content" id="contact-info">
                    <h2>
                        LET'S CONNECT <br class="mobile-show">ON SOCIAL MEDIA
                    </h2>
                    <p>
                        Everyday I spend several hours on across all of my platforms to meet as many of you as I can and share strategies, connections and education for how to grow your business, increase your income, boost your sales, hire the right people and 10<span>X</span>
                        your life.
                    </p>
                    <div class="links">
                        <a href="https://www.youtube.com/user/GrantCardone" target="_blank" class="youtube-background" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <path fill="Currentcolor" d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://www.instagram.com/grantcardone/" target="_blank" class="instagram-background" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="Currentcolor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/grantcardonefan" class="facebook-background" target="_blank" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                        <path fill="Currentcolor" d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://www.tiktok.com/@grantcardone" class="tiktok-background" target="_blank" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="Currentcolor" d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://www.snapchat.com/add/grantcardone" target="_blank" class="snapchat-background" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                        <path d="M496.9 366.6c-3.4-9.2-9.8-14.1-17.1-18.2-1.4-.8-2.6-1.5-3.7-1.9-2.2-1.1-4.4-2.2-6.6-3.4-22.8-12.1-40.6-27.3-53-45.4a102.9 102.9 0 0 1 -9.1-16.1c-1.1-3-1-4.7-.2-6.3a10.2 10.2 0 0 1 2.9-3c3.9-2.6 8-5.2 10.7-7 4.9-3.2 8.8-5.7 11.2-7.4 9.4-6.5 15.9-13.5 20-21.3a42.4 42.4 0 0 0 2.1-35.2c-6.2-16.3-21.6-26.4-40.3-26.4a55.5 55.5 0 0 0 -11.7 1.2c-1 .2-2.1 .5-3.1 .7 .2-11.2-.1-22.9-1.1-34.5-3.5-40.8-17.8-62.1-32.7-79.2A130.2 130.2 0 0 0 332.1 36.4C309.5 23.5 283.9 17 256 17S202.6 23.5 180 36.4a129.7 129.7 0 0 0 -33.3 26.8c-14.9 17-29.2 38.4-32.7 79.2-1 11.6-1.2 23.4-1.1 34.5-1-.3-2-.5-3.1-.7a55.5 55.5 0 0 0 -11.7-1.2c-18.7 0-34.1 10.1-40.3 26.4a42.4 42.4 0 0 0 2 35.2c4.1 7.8 10.7 14.7 20 21.3 2.5 1.7 6.4 4.2 11.2 7.4 2.6 1.7 6.5 4.2 10.3 6.7a11.1 11.1 0 0 1 3.3 3.3c.8 1.6 .8 3.4-.4 6.6a102 102 0 0 1 -8.9 15.8c-12.1 17.7-29.4 32.6-51.4 44.6C32.4 348.6 20.2 352.8 15.1 366.7c-3.9 10.5-1.3 22.5 8.5 32.6a49.1 49.1 0 0 0 12.4 9.4 134.3 134.3 0 0 0 30.3 12.1 20 20 0 0 1 6.1 2.7c3.6 3.1 3.1 7.9 7.8 14.8a34.5 34.5 0 0 0 9 9.1c10 6.9 21.3 7.4 33.2 7.8 10.8 .4 23 .9 36.9 5.5 5.8 1.9 11.8 5.6 18.7 9.9C194.8 481 217.7 495 256 495s61.3-14.1 78.1-24.4c6.9-4.2 12.9-7.9 18.5-9.8 13.9-4.6 26.2-5.1 36.9-5.5 11.9-.5 23.2-.9 33.2-7.8a34.6 34.6 0 0 0 10.2-11.2c3.4-5.8 3.3-9.9 6.6-12.8a19 19 0 0 1 5.8-2.6A134.9 134.9 0 0 0 476 408.7a48.3 48.3 0 0 0 13-10.2l.1-.1C498.4 388.5 500.7 376.9 496.9 366.6zm-34 18.3c-20.7 11.5-34.5 10.2-45.3 17.1-9.1 5.9-3.7 18.5-10.3 23.1-8.1 5.6-32.2-.4-63.2 9.9-25.6 8.5-42 32.8-88 32.8s-62-24.3-88.1-32.9c-31-10.3-55.1-4.2-63.2-9.9-6.6-4.6-1.2-17.2-10.3-23.1-10.7-6.9-24.5-5.7-45.3-17.1-13.2-7.3-5.7-11.8-1.3-13.9 75.1-36.4 87.1-92.6 87.7-96.7 .6-5 1.4-9-4.2-14.1-5.4-5-29.2-19.7-35.8-24.3-10.9-7.6-15.7-15.3-12.2-24.6 2.5-6.5 8.5-8.9 14.9-8.9a27.6 27.6 0 0 1 6 .7c12 2.6 23.7 8.6 30.4 10.2a10.7 10.7 0 0 0 2.5 .3c3.6 0 4.9-1.8 4.6-5.9-.8-13.1-2.6-38.7-.6-62.6 2.8-32.9 13.4-49.2 26-63.6 6.1-6.9 34.5-37 88.9-37s82.9 29.9 88.9 36.8c12.6 14.4 23.2 30.7 26 63.6 2.1 23.9 .3 49.5-.6 62.6-.3 4.3 1 5.9 4.6 5.9a10.6 10.6 0 0 0 2.5-.3c6.7-1.6 18.4-7.6 30.4-10.2a27.6 27.6 0 0 1 6-.7c6.4 0 12.4 2.5 14.9 8.9 3.5 9.4-1.2 17-12.2 24.6-6.6 4.6-30.4 19.3-35.8 24.3-5.6 5.1-4.8 9.1-4.2 14.1 .5 4.2 12.5 60.4 87.7 96.7C468.6 373 476.1 377.5 462.9 384.9z"/>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://www.linkedin.com/in/grantcardone/" target="_blank" class="linkedin-background" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="Currentcolor" d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 0 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                        <a href="https://twitter.com/GrantCardone" class="twitter-background" target="_blank" rel="noopener">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <style>
                                            svg {
                                                fill: #f2f2f2
                                            }
                                        </style>
                                        <path d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z"></path>
                                    </svg>
                                </span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Lets Connect Section End -->

    <!-- Footer Starts -->
    <footer class="footer_wrap">
        <div class="container">
            <div class="footer_link_wrap">
                <div class="footer_link">
                    <h4>LEARN MORE</h4>
                    <ul>
                        <li>
                            <a target="_blank" href="https://cardoneuniversity.com/">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Cardone University
                    
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Cardone Capital
                    
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://grantcardonelicensee.com/">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Licensee Program
                    
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://cardoneondemand.com/">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Cardone On-Demand
                    
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="https://cardoneventures.com/">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Cardone Ventures
                    
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer_link">
                    <h4>COMPANY</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                About
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Hire Grant
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Careers
                    
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer_link">
                    <h4>SUPPORT</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Contact Us
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Shipping Policy
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Privacy Policy
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Terms of Use
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Refund Policy
                    
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="footer_link">
                    <h4>RESOURCES</h4>
                    <ul>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Quotes
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Free eBooks
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Subscribe
                    
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg class="custom-svg-icon" data-name="mk-icon-angle-right" data-cacheid="icon-67c23405713d5" style="height:14px;width:5px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 1792">
                                    <path fill="currentcolor" d="M595 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"></path>
                                </svg>
                                Free Books
                    
                            </a>
                        </li>
                    </ul>
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
    <!-- Footer Ends -->

    <a href="javascript:;" id="button-top">
        <svg class="custom-svg-icon" data-name="mk-icon-chevron-up" data-cacheid="icon-67c8a21ae028d" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
            <path d="M1683 1331l-166 165q-19 19-45 19t-45-19l-531-531-531 531q-19 19-45 19t-45-19l-166-165q-19-19-19-45.5t19-45.5l742-741q19-19 45-19t45 19l742 741q19 19 19 45.5t-19 45.5z"></path>
        </svg>
    </a>

</div>

<?php get_footer(); ?>