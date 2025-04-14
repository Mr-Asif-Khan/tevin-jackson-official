<?php get_header();
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
	.search-form form input[type=text]{
		margin: 0;
        padding: 12px 28px 12px 15px;
        width: 100%;
        border: 2px solid rgba(0, 0, 0, .12);
		font-family: 'Outfit', sans-serif !important;
        border-radius: 5px;
	}
	.search-form form input[type=text]:focus{
		border: 2px solid rgba(0, 0, 0, .12);
	}
    .search-field-container{
        width: 100%;
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

    /* Disable Links */
    .pagination .disabled {
        background-color: #e0e0e0; 
        color: #999; 
        pointer-events: none; 
    }
    .total-neighborhood {
        font-size: 18px;
        font-weight: 400;
        line-height: 23px;
        margin: 20px 0px;
    }
    .neighborhood-placards-results-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 20px;
        padding: 0px;
    }
</style>


<div class="container" style="max-width: 1470px; padding: 0px 20px;">
  <?php 
  $args = array(
      'post_type' => 'neighborhoods',
      'posts_per_page' => 20,
      'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
  );
  if ( isset( $_GET['search'] ) && ! empty( $_GET['search'] ) ) {
    $args['s'] = sanitize_text_field( $_GET['search'] );
  }
  $query = new WP_Query($args);
  $neighborhood_count = $query->found_posts;
  ?>
  <div class="search-form">
    <form action="<?php echo esc_url( home_url( '/local-guide/neighborhoods/') ); ?>" method="get">
        
        <div class="search-field-container">
            <label for="search">Search by name</label>
            <input type="text" class="search-field" name="search" placeholder="Search Neighborhoods..." value="<?php echo isset( $_GET['search'] ) ? esc_attr( $_GET['search'] ) : ''; ?>" />
        </div>
        <input type="hidden" name="post_type" value="neighborhoods" />
        <button class="search-btn" type="submit">Search</button>
    </form>
    </div>
    <?php
    if ( isset( $_GET['search'] ) && !empty( $_GET['search'])  ) {
        $heading = sprintf( '%d Neighborhoods are there, Based on Filters.', $neighborhood_count );
    } else {
        $heading = sprintf( '%d Neighborhoods are there.', $neighborhood_count );
    }
    ?>  
    <h1 class="total-neighborhood"><?php echo $heading; ?></h1>
    <ul class="neighborhood-placards-results-container">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('template-parts/content', 'neighborhood');
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
    ?> 
</div>

<?php get_footer(); ?>