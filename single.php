<?php get_header(); ?>
	
	<main id="main" class="uk-container pre-container">

		<?php if (get_post_type() == 'podcast' || get_post_type() == 'post') : ?>
			<div class="vd-backlink uk-margin-xlarge-bottom uk-text-center"><a href="<?= get_bloginfo('siteurl') ?>">Zurück zur Übersicht</a></div>
		<?php endif; ?>

		<?php if (have_posts()) : ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					if (get_post_type() == 'podcast') {
						include locate_template( 'template-parts/post-podcast.php' );
					}
					else {
						the_content();
					}
				?>

				<section id="comments" class="uk-margin-top">
					<div class="uk-grid">
						<div class="uk-width-4-5@s uk-margin-auto">

							<?php if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
							?>

							<div class="comments-wrapper section-inner">

								<?php comments_template(); ?>

							</div><!-- .comments-wrapper -->

							<?php } ?>
						
						</div>
					</div>
				
				</section>


			<?php endwhile; ?>
		<?php endif; ?>
	</main>

<?php get_footer(); ?>