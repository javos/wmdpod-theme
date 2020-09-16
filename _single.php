<?php get_header(); ?>

<?php include locate_template('template-parts/backto.php'); ?>

<main class="pre-flex-fluid uk-width-1-1 single">

	<?php include locate_template('template-parts/hero.php'); ?>


	<?php if (have_posts()) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php include locate_template('template-parts/page-title.php'); ?>

			<div class="uk-container">
				<?php the_content(); ?>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>
</main>

<?php
get_footer();
?>