<?php get_header();?>

<section class="grid default-content push-content wide">
	<div class="row show-overflow woocommerce">
		<div class="col-1 aligncenter">
			<h1>Shop</h1>
		</div>
		<div class="col-1 nopadding">

				<?php 
				if ( is_singular( 'product' ) ) {
				     woocommerce_content();
				  }else{
				   //For ANY product archive.
				   //Product taxonomy, product search or /shop landing
				    woocommerce_get_template( 'archive-product.php' );
				  }		
				?>

		</div>
	</div>

</section>
<?php get_footer(); ?>