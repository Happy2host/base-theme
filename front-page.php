<?php get_header();?>
<section class="grid default-content">	
	<?php while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile; ?>
</section>
<?php get_footer();?>