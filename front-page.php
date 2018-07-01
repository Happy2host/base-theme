<?php get_header();?>
<section <?php post_class('default-content')?>>	
	<?php while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', 'page' );
	endwhile; ?>
</section>
<?php get_footer();?>