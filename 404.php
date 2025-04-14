<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Tevin_Jackson_Official
 */

get_header();
?>
<style>
	@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600&display=swap');
	body{
	}
	.error-div{
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: center;
		height: 500px;
	}
	.error-div h1{
		font-size: 96px;
		font-family: "Outfit", sans-serif !important;
	}
	.error-div h2{
		font-size: 36px;
		font-weight: 400;
		font-family: "Outfit", sans-serif !important;
	}
	.error-div p{
		font-size: 24px;
		font-weight: 200;
		font-family: "Outfit", sans-serif !important;
	}
	.error-div a{
		background: linear-gradient(to bottom, #c7202e 0%, #6b131c 100%);
    color: #fff;
    font-weight: 700;
    padding: 12px 24px;
    border-radius: 5px;
		font-family: "Outfit", sans-serif !important;
		font-size: 16px;
		border: none;
		cursor: pointer;
		transition: all 0.3s ease;
	}
	.error-div a:hover{
		transform: scale(1.1);
	}
</style>

	<div class="container">
		<div class="error-div">
			<h1 class="error-heading">404</h1>
			<h2 class="error-message">Oops! Page not found</h2>
			<p class="error-detail-message">The Page you are looking for does not exist, or has been removed.</p>
			
			<a href="<?php echo home_url(); ?>">Go Home</a>
		</div>
	</div>

<?php
get_footer();
