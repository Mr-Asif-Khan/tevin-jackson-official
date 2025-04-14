<?php
/**
 * Template Name: Free Books
 */

get_header(); ?>

<!-- commit by umar -->

<div id="body">
    <!-- Hero Section -->
    <section class="free-books-hero">
      <div class="container">
        <div class="free-books-hero-content">
          <h1 class="text-center">I’ve sent over 5 million free books</h1>
          <h4 class="text-center">AND NOW I WANT TO SEND ONE TO YOU…</h4>
        </div>
        <div class="free-books-hero-media">
          <video autoplay muted loop playsinline>
            <source src="<?php echo get_template_directory_uri() ?>/img/videoplayback1.mp4" type="video/mp4">
          </video>
          <img src="<?php echo get_template_directory_uri() ?>/img/4 Books Cover Mokcup.png" alt="" width="540px">
        </div>
      </div>
    </section>
    <!-- Hero Section End -->


    <?php
    $books = get_field('books', 'option');
    if (!empty($books)) :
        $bg_classes = ['white-background', 'minor-dark-background']; 
        $i = 0;
    ?>
    <section class="free-books-section">
    <?php foreach ($books as $book) : ?>
      <div class="<?php echo $bg_classes[$i % 2]; ?>">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo esc_url($book['book_image']); ?>" alt="" width="350px" height="448px">
              <h1><?php echo esc_html($book['book_slogan']); ?></h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center"><?php echo esc_html($book['book_title']); ?></h2>
              <p><?php echo esc_html($book['book_description']); ?></p>
              <ul>
                <?php if (!empty($book['book_bullets'])) : ?>
                  <?php foreach ($book['book_bullets'] as $bullet) : ?>
                    <li>
                      <svg class="mk-svg-icon" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                        <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                      </svg>
                      <?php echo esc_html($bullet['bullet_text']); ?>
                    </li>
                  <?php endforeach; ?>
                <?php endif; ?>
              </ul>
              <div class="btn-with-warning">
                <a href="<?php echo esc_url($book['book_button_link']); ?>"><?php echo esc_html($book['book_button_text']); ?></a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>
        </div>
       </div>
        <?php $i++; ?>
    <?php endforeach; ?>
    </section>
<?php endif; ?>

    <!-- Free Books Section -->
     <!-- <section class="free-books-section">
      
      <div class="white-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/ctsb-768x982-1.webp" alt="" width="350px" height="448px">
              <h1>“How to close anyone, anytime, <br> in any situation…”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">The CLOSER’s <br> SURVIVAL GUIDE</h2>
              <p>Over 126 of the <strong>GREATEST</strong> closes you will ever hear – how to use them, when to use them and how to handle ANY and EVERY objection a customer will EVER give you.</p>
              <p>This is your exclusive access to the best closing and negotiating material in the world:</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Become a Master Negotiator</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>How to Use Closes</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>When to Use Closes</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Increase Your Income Fast</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Over 100 Ways to Close a Deal</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="minor-dark-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/10x-book-image-768x982-1.webp" alt="" width="350px" height="448px">
              <h1>“Success cannot be achieved by’normal’ <br> levels of thoughts and actions.”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">THE 10X RULE</h2>
              <p>“Massive thoughts must be followed by massive actions. There is nothing ordinary about The 10X Rule. It is simply what it says: 10 times the thoughts and 10 times the actions of other people… You never do what others do.</p>
              <p>You must be willing to do what they won’t do—and even take actions you might deem “unreasonable.” – Grant Cardone</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>What the 4th Degree of Action is</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>The 10X Rule Discipline</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>How to Assume Control of Everything</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>How to Break the “Addiction to Average”</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Massive Goal Setting</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="white-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/r1eib-book-image-1-768x1002-1.webp" alt="" width="350px" height="448px">
              <h1>“What you have done is <br> nothing compared to what you can do.”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">GRANT CARDONE’S MUCH ANTICIPATED REAL ESTATE BOOK IS HERE !</h2>
              <p>Grant covers the mistakes he’s made in detail, the deals he’s done, and his future plan going forward. He shows you EXACTLY what you need to do to build huge wealth in real estate.</p>
              <p>Grant outlines the perfect solution for you in this easy-to-read guide that you’ll likely want to read from cover-to-cover in one sitting.</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>What kind of real estate should you buy?</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>How can you buy it and what are the obstacles?</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>What exactly is so good about multi-family?</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Mistakes to avoid when investing in apartments.</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>The fastest ways to find deals.</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="minor-dark-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/mb-3.webp" alt="" width="350px" height="448px">
              <h1>“You sleep like you’re rich, <br> I’m up like I’m broke.”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">Receive the same information that the wealthy use to prosper</h2>
              <p>I Am Obsessed With Creating Millionaires, So I Am Simplifying The Process Of Becoming A Millionaire For You. If You Want, You Can Even Become Super Rich. I’ll teach you:</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Getting Rich Is Not a Fantasy</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Where You Get Your Advice</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Millionaire Math</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Increase Income</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Who’s Got My Money?</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="white-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/sobs-book_image-768x982-1.webp" alt="" width="350px" height="448px">
              <h1>“Everything in life is a sale and everything <br> you want is a commission.”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">Sell Or Be Sold the Sales Bible!</h2>
              <p>The ability to sell is as crucial to your success as food, water, and oxygen are to your life.</p>
              <p>This is your exclusive access to success essentials of:</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Selling in a bad economy</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Overcoming call reluctance</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Filling your pipeline with new business</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Staying positive, despite rejection</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;margin-top: -20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Utilizing social media and avenues on how to propel your business goals</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

      <div class="minor-dark-background">
        <div class="container">
          <div class="book">
            <div class="book-section-left">
              <img src="<?php echo get_template_directory_uri() ?>/img/bae-book-free.webp" alt="" width="350px" height="448px">
              <h1>“Success cannot be achieved by’normal’ <br> levels of thoughts and actions.”</h1>
            </div>
            <div class="book-section-right">
              <h2 class="text-center">BUILD AN EMPIRE <br> ADVICE FOR BUSINESS, LIFE AND LOVE </h2>
              <p>If you’re ready to send your excuses packing and ready to roll up your sleeves and commit to your future, you’ve found a great place to start. Build an Empire is the next best thing to having Elena Cardone as your personal coach and marriage expert — all while taking 100% ownership of the life you’re living now.</p>
              <ul>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>How to create clear and sustainable goals.</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>The importance of staying on the same page as your partner.</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;margin-top: -20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Why rejecting “normal” can serve as the ultimate ticket to freedom.</strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;margin-top: -20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Defending your empire, including practical, real-life tips for personal defense. </strong>
                </li>
                <li>
                  <svg class="mk-svg-icon" data-name="mk-icon-check" data-cacheid="icon-67cb5751ed405" style="height:16px;width:16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1792 1792">
                    <path d="M1671 566q0 40-28 68l-724 724-136 136q-28 28-68 28t-68-28l-136-136-362-362q-28-28-28-68t28-68l136-136q28-28 68-28t68 28l294 295 656-657q28-28 68-28t68 28l136 136q28 28 28 68z"></path>
                  </svg>
                  <strong>Where to find the man or woman of your dreams.</strong>
                </li>
              </ul>
              <div class="btn-with-warning">
                <a href="#">Get Free Book</a>
                <p>*Domestic US Only.</p>
              </div>
            </div>
          </div>          
        </div>
      </div>

     </section> -->
    <!-- Free Books Section End -->

</div>

<?php get_footer(); ?>