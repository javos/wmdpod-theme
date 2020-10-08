<hr />

<div class="uk-container pre-container">
	<div class="uk-flex uk-flex-row">
		<!-- <h2 class="vd-title pre-flex-fluid">Episoden <span class="vd-subtitle">Neues aus der Welt von WMD</span></h2> -->

		<!-- <div class="pre-flex-fixed">
			<a href="">Blog-Ansicht</a>
			<a href="">Listen-Ansicht</a>
		</div> -->
	</div>

	<div uk-grid>
		<div class="vd-maincontent">
			<h2 class="pre-highlight pre-larger">Neueste Folgen</h2>

			<div class="uk-grid">
				<?php
					$args = array(  
						'post_type' => 'podcast',
						'post_status' => 'publish',
						'posts_per_page' => 8, 
					);
				
					$loop = new WP_Query( $args ); 
				?>

				<?php if ($loop->have_posts()) : ?>
					
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

		<div class="vd-sidebar">
			<h2 class="pre-highlight pre-larger">Alle Folgen</h2>
		</div>
	</div>
			
</div>