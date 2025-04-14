<?php
/**
 * The template for displaying search results pages
 *
 * @package Tevin_Jackson_Official
 */

get_header();
?>

<style>
	@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');
	body {
		font-family: 'Outfit', sans-serif !important;
	}
    form.search-form{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-bottom: 20px;
        gap: 20px;
        width: 100%;
    }
    form.search-form .search-label{
        width: 100%
    }
	.search-box{
		margin: 20px auto;
	}
	.search-field, .search-post-type{
		margin: 0;
        padding: 12px 28px 12px 15px;
        width: 100%;
        border: 2px solid rgba(0, 0, 0, .12);
		font-family: 'Outfit', sans-serif !important;
        border-radius: 5px;
	}
	.search-field:focus{
		border: 2px solid rgba(0, 0, 0, .12);
	}
    .search-btn{
        padding: 10px 15px 10px 15px;
        cursor: pointer;
        background-color: #1e73be;
        border: none;
        color: white;
        font-size: 16px;
        font-family: 'Outfit', sans-serif !important;
        border-radius: 5px;
    }
	.page-title{
		font-size: 18px;
        color: #000000;
        line-height: 1.5em;
		margin-bottom: 20px;
	}
    .result-title{
        line-height: 26px;
    }
    .result-title a {
        font-size: 20px;
    }
    .result-excerpt{
        display: flex;
        width: 100%;
        margin-bottom: 20px;
        justify-content: space-between;
    }
    .result-excerpt p{
        width: 78%;
        font-size: 16px;
        font-weight: 200;
        margin-left: 10px;
    }
    .result-excerpt .result-thumbnail{
        height: auto;
    }
    .result-thumbnail img{
        width: 225px!important;
        height: 150px!important;
        object-fit: cover;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }
    .pagination {
        text-align: center; 
        margin: 30px 0px;
    }

    .pagination a, .pagination span {
        display: inline-block;
        padding: 10px 20px;
        margin: 0 5px; 
        text-decoration: none; 
        color: #333; 
        background-color: #f2f2f2;
        border-radius: 4px; 
        transition: background-color 0.3s ease; 
    }

    .pagination a:hover {
        background-color: #c7202e; 
        color: #fff; 
    }
    .pagination .current {
        background-color: #c7202e; 
        color: #fff; 
        font-weight: bold; 
    }
    @media (max-width:500px) {
        .result-excerpt{
            flex-direction: column;
        }
        .result-excerpt p{
            width: 100%;
            margin-left: 0px;
        }
        .result-thumbnail img{
            width: 350px !important;
            height: 213px !important;
        }
    }
</style>

<main id="primary" class="site-main"> 
	<div class="container">

        <div class="search-box">
        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label class="search-label">
                <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'tevin-jackson-official' ); ?></span>
                <input type="search" class="search-field" placeholder="<?php echo esc_attr( 'Search...', 'tevin-jackson-official' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
            </label>

            <label for="post_type">
                <select name="post_type" class="search-post-type">
                    <option value="">All Types</option>
                    <option value="listing" <?php echo (get_query_var('post_type') === 'listing') ? 'selected' : ''; ?>>Listings</option>
                    <option value="neighborhoods" <?php echo (get_query_var('post_type') === 'neighborhoods') ? 'selected' : ''; ?>>Neighborhoods</option>
                    <option value="agents" <?php echo (get_query_var('post_type') === 'agents') ? 'selected' : ''; ?>>Agents</option>
                    <option value="schools" <?php echo (get_query_var('post_type') === 'schools') ? 'selected' : ''; ?>>Schools</option>
                </select>
            </label>

            <button class="search-btn" type="submit">Search</button>
        </form>

        </div>

        <?php
        $search_query = get_search_query();

        $args = [
            'post_type' => !empty($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : ['listing', 'neighborhoods', 'agents', 'schools'],
            's' => $search_query,
            'posts_per_page' => 10,
            'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        ];

        $search_results = new WP_Query($args);

        if ( $search_results->have_posts() ) :
        ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php printf( 'Search Results for "%s"', esc_html($search_query) ); ?>
            </h1>
        </header>

        <div class="search-results-feed">
            <?php while ( $search_results->have_posts() ) : $search_results->the_post(); ?>
                <div class="search-result-item">
                    <h2 class="result-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?> – <?php echo ucfirst( get_post_type_object( get_post_type() )->labels->singular_name ); ?>
                        </a>
                    </h2>
                    <div class="result-excerpt">
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="result-thumbnail" style="margin-bottom: 10px;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', ['style' => 'max-width:100%; height:auto;']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php
                        if ( get_post_type() == 'listing' && has_excerpt() ) :
                            the_excerpt(); 
                        elseif ( get_post_type() == 'listing' ) :
                            $property_description = get_post_meta( get_the_ID(), 'property_description', true );
                            
                            if ( !empty($property_description) ) :
                                $words = explode(' ', $property_description);
                                if ( count($words) > 50 ) {
                                    $property_description = implode(' ', array_slice($words, 0, 50)) . '...';
                                }
                                echo '<p>' . esc_html($property_description) . '</p>';
                            else :
                                echo '<p>No description available.</p>';
                            endif;
                        elseif ( get_post_type() == 'agents' && has_excerpt() ) :
                            the_excerpt();
                        elseif ( get_post_type() == 'agents' ) :
                            $name = get_post_meta(get_the_ID(), 'agent_name', true) ?: 'No Agent Name'; 
                            $address = get_post_meta(get_the_ID(), 'agent_address', true) ?: 'No Address Available';
                            $number = get_post_meta(get_the_ID(), 'agent_number', true) ?: 'No Phone Number';
                            $formatted_number = $number ? format_phone_number($number) : 'No Phone Number';
                            $total_sales = get_post_meta(get_the_ID(), 'agent_total_sales', true) ?: 'No Sales Data';
                            $price = get_post_meta(get_the_ID(), 'agent_price', true) ?: 'Price Not Available';
                            echo '<p>';
                                echo '<span><strong>Name: </strong>' . esc_html($name) . '</span> <br>';
                                echo '<span><strong>Company: </strong>' . esc_html($address) . '</span> <br>';
                                echo '<span><strong>Phone Number: </strong>' . esc_html($formatted_number) . '</span> <br>';
                                echo '<span><strong>Total Sales: </strong>' . esc_html($total_sales) . '</span> <br>';
                                echo '<span><strong>Price: </strong>' . esc_html($price) . '</span> <br>';

                            echo '</p>';
                            
                        else :
                            the_excerpt();
                        endif;
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
            the_posts_pagination([
                'prev_text' => __('« Prev'),
                'next_text' => __('Next »'),
            ]);
        else :
        ?>

        <div class="no-results">
            <p>No results found. Try another search term.</p>
        </div>

        <?php endif; wp_reset_postdata(); ?>

	</div>		
</main>
<?php
get_footer();
?>
