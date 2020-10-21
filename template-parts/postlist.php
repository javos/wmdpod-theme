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
		<div class="vd-sidebar uk-flex-last@l uk-width-1-3@l uk-margin-xlarge-bottom">
			<h2 class="pre-highlight pre-larger">Alle Folgen</h2>

			<?php $podcast = \Podlove\get_podcast(); ?>
			
			<ul>
				<?php foreach($podcast->episodes() as $episode) : ?>
					<?php $permalink = $episode->url(); ?>

					<li class="vd-episode-small">
						<div class="vd-episode-badge vd-episode-badge--small">
							<?php printf( esc_html__( '%d', 'vd-wmdpod' ), $episode->number() ); ?>
						</div>

						<?php $target = ""; ?>

						<div class="vd-episode-small__inner">
							<div class="vd-episode-small__title"><a href="<?= $permalink; ?>" target="<?= $target ?>"><?= $episode->title(); ?></a></div>
							<div class="vd-episode-small__subtitle"><a href="<?= $permalink; ?>" target="<?= $target ?>"><?= $episode->subtitle(); ?></a></div>
							<div class="vd-episode-small__date"><a href="<?= $permalink; ?>" target="<?= $target ?>"><?= $episode->publicationDate(); ?></a></div>
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		
		</div>

		<div class="vd-maincontent uk-flex-first@l uk-width-2-3@l">
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
	</div>
			
</div>