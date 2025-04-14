<?php get_header();
$count_agents = wp_count_posts('agents')->publish;
?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');
    body {
        font-family: 'Outfit', sans-serif !important;
    }
    .search-form form{
        display: flex;
        justify-content: flex-start;
        align-items: end;
        margin: 20px 0px;
        gap: 20px;
        width: 100%;
    }
    input[type=number] {
        cursor: text;
    }
	.search-form form input[type=text], #neighborhood_filter, #min_price, #max_price{
		margin: 0;
        padding: 12px 28px 12px 15px;
        width: 100%;
        border: 2px solid rgba(0, 0, 0, .12);
		font-family: 'Outfit', sans-serif !important;
        border-radius: 5px;
	}
	.search-form form input[type=text]:focus, #neighborhood_filter:focus, #min_price:focus, #max_price:focus{
		border: 2px solid rgba(0, 0, 0, .12);
	}
    .search-field-container{
        width: 100%;
    }
    .neighborhood-filter, .price-range-filter{
        width: 20%;
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
    .pagination {
        text-align: center; 
        margin-top: 30px;
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
        background-color: #1e73be; 
        color: #fff; 
    }
    .pagination .current {
        background-color: #1e73be; 
        color: #fff; 
        font-weight: bold; 
    }
    .pagination .disabled {
        background-color: #e0e0e0; 
        color: #999; 
        pointer-events: none; 
    }
    .total-agents {
        font-size: 18px;
        font-weight: 400;
        line-height: 23px;
        margin: 20px 0px;
    }
    
</style>


<div class="container" style="max-width: 1470px; padding: 0px 20px;">

    <?php 
    $filter_slug = get_query_var('agent_filter');
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'agents',
        'posts_per_page' => 20,
        'paged' => $paged
    );

    if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
        $args['s'] = sanitize_text_field( $_GET['search'] );
    }

    if ( isset( $_GET['min_price'] ) && !empty( $_GET['min_price'] ) ) {
        $args['meta_query'][] = array(
            'key' => 'agent_price',
            'value' => sanitize_text_field( $_GET['min_price'] ),
            'compare' => '>=',
            'type' => 'NUMERIC'
        );
    }

    if ( isset( $_GET['max_price'] ) && !empty( $_GET['max_price'] ) ) {
        $args['meta_query'][] = array(
            'key' => 'agent_price',
            'value' => sanitize_text_field( $_GET['max_price'] ),
            'compare' => '<=',
            'type' => 'NUMERIC'
        );
    }
    if ( isset( $_GET['neighborhood_filter'] ) && !empty( $_GET['neighborhood_filter'] ) ) {
        $args['meta_query'][] = array(
            'key' => 'agent_neighborhood',
            'value' => sanitize_text_field( $_GET['neighborhood_filter'] ),
            'compare' => 'LIKE'
        );
    }

    $filter_title = 'All Areas';
    $valid_filter = true;

    if ($filter_slug) {
        $valid_filter = false;
        $neighborhood = get_page_by_path($filter_slug, OBJECT, 'neighborhoods');
        if ($neighborhood) {
            $valid_filter = true;
            $args['meta_query'][] = array(
                array(
                    'key' => 'agent_neighborhood',
                    'value' => '"' . $neighborhood->ID . '"',
                    'compare' => 'LIKE'
                )
            );
            $filter_title = esc_html($neighborhood->post_title);
        } else {
            $valid_filter = false;
            $school = get_page_by_path($filter_slug, OBJECT, 'schools');
            if ($school) {
                $valid_filter = true;
                $neighborhood_id = get_field('school_neighborhood', $school->ID);
                if ($neighborhood_id) {
                    $neighborhood_post = get_post($neighborhood_id);
                    $args['meta_query'][] = array(
                        array(
                            'key' => 'agent_neighborhood',
                            'value' => '"' . $neighborhood_id->ID . '"',
                            'compare' => 'LIKE'
                        )
                    );
                    $filter_title = esc_html($school->post_title);
                }
            }
        }
    }

    if ($valid_filter) {
        $query = new WP_Query($args);
        $agent_count = $query->found_posts;
    } else {
        $query = null;
        $agent_count = 0;
        $filter_title = 'No Valid Area Selected';
    }
    ?>
    <div class="search-form">
        <form action="<?php echo esc_url( home_url( '/real-estate-agents/'. $filter_slug ) ); ?>" method="get">
            
            <div class="search-field-container">
                <label for="search">Search by name</label>
                <input type="text" class="search-field" name="search" placeholder="Search Agents..." value="<?php echo isset( $_GET['search'] ) ? esc_attr( $_GET['search'] ) : ''; ?>" />
            </div>
            
            
            <?php if (!$filter_slug) { ?>
                <div class="neighborhood-filter">
                    <label for="neighborhood_filter">Neighborhood</label>
                    <select name="neighborhood_filter" id="neighborhood_filter">
                        <option value="">All Neighborhoods</option>
                        <?php
                            $neighborhoods = get_posts(array(
                                'post_type' => 'neighborhoods',
                                'posts_per_page' => -1
                            ));
                            foreach ($neighborhoods as $neighborhood) {
                                $selected = (isset($_GET['neighborhood_filter']) && $_GET['neighborhood_filter'] == $neighborhood->ID) ? 'selected' : '';
                                echo '<option value="' . $neighborhood->ID . '" ' . $selected . '>' . esc_html($neighborhood->post_title) . '</option>';
                            }
                        ?>
                    </select>
                </div>
            <?php } ?>
            
            <div class="price-range-filter">
                <label for="min_price">Min Price</label>
                <input type="number" name="min_price" id="min_price" value="<?php echo isset( $_GET['min_price'] ) ? esc_attr( $_GET['min_price'] ) : ''; ?>" placeholder="Min Price" />              
            </div>
            
            <div class="price-range-filter">
                <label for="max_price">Max Price</label>
                <input type="number" name="max_price" id="max_price" value="<?php echo isset( $_GET['max_price'] ) ? esc_attr( $_GET['max_price'] ) : ''; ?>" placeholder="Max Price" />                
            </div>
            <input type="hidden" name="post_type" value="agents" />
            <button class="search-btn" type="submit">Search</button>
        </form>
    </div>
    


    <?php
    if ( (isset( $_GET['search'] ) && !empty( $_GET['search']) ) || (isset( $_GET['min_price'] ) && !empty( $_GET['min_price']  ) ) || (isset( $_GET['max_price'] ) && !empty( $_GET['max_price']  ) )  || (isset( $_GET['neighborhood_filter'] ) && !empty( $_GET['neighborhood_filter']  ) ) ) {
        $heading = sprintf( '%d Real Estate Agents Serving, Based on Filters.', $agent_count );
    } else {
        $heading = sprintf( '%d Real Estate Agents Serving, %s.', $agent_count, $filter_title );
    }
    ?>


    <h1 class="total-agents"><?php echo $heading; ?></h1>


    <ul class="agent-placards-results-container">
    <?php
    if ($query && $query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', 'agent');
        endwhile;
    ?>
    </ul>

    <div class="pagination">
        <?php
        echo paginate_links(array(
            'total' => $query->max_num_pages,
            'current' => max(1, get_query_var('paged'))
        ));
        ?>
    </div>

    <?php 
    endif;
    wp_reset_postdata();
    ?>
</div>

<?php get_footer(); ?>