<?php get_header();?>

<section class="grid default-content">	
	<div class="row">
		<div class="col-1">
			<h1></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-1 no-padding">
			<article id="content" class="news-items">
		
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'singlenews' ); ?>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'template-single/content', 'none' ); ?>
		<?php endif; ?>
		
			</article>
		</div>
	</div>
</section>

<?php get_footer();?>