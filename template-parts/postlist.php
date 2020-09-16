<div class="uk-container pre-container">
	<div class="uk-flex uk-flex-row">
		<!-- <h2 class="vd-title pre-flex-fluid">Episoden <span class="vd-subtitle">Neues aus der Welt von WMD</span></h2> -->

		<!-- <div class="pre-flex-fixed">
			<a href="">Blog-Ansicht</a>
			<a href="">Listen-Ansicht</a>
		</div> -->
	</div>

	<div class="uk-grid">
		<section id="episodes-list" class="hidden">
		</section>

		
			<?php
				$args = array(  
					'post_type' => 'podcast',
					'post_status' => 'publish',
					'posts_per_page' => 8, 
				);
			
				$loop = new WP_Query( $args ); 
			?>


			<?php if ($loop->have_posts()) : ?>
				<div id="episodes-blog" class="uk-width-4-5@m uk-margin-auto">
				
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				
					<?php
						include locate_template( 'template-parts/post.php'  );
					?>
				
				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

				<?php // include locate_template( 'template-parts/pagination.php'  ); ?>
			<?php endif; ?>
		</div>
	</div>

			
</div>