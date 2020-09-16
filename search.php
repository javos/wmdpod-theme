<?php get_header(); ?>

<main class="uk-container">
	<h1><?php printf( esc_html__( 'Ihre Suchergebnisse zu %s', 'prefect' ), '<cite>' . get_search_query() . '</cite>' ); ?></h1>

	<?php if (have_posts()) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php
				// Template Part laden: Sehr einfacher Inhalt einer Seite
				get_template_part( 'template-parts/search-result', get_post_format() );
			?>

		<?php endwhile; ?>

	<?php endif; ?>
</main>
