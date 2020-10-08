<?php
	$podcast = \Podlove\get_podcast();
	$episode = \Podlove\get_episode();
?>

<article class="vd-episode">

	<div class="vd-episode__inner">
	
		<span class="vd-episode__badge"><?php printf( esc_html__( '%d', 'vd-wmdpod' ), $episode->number() ); ?></span>
		
		<div class="vd-episode__content">
			<div class="vd-episode__title pre-flex-fluid">
				<h3 class="vd-title">
					<a href="<?php the_permalink(); ?>">
						<?= $episode->title() ?>
						<span class="vd-subtitle">Anfänge & Bedenken</span>
					</a>
				</h3>
			</div>

			<div class="vd-episode__date"><?= $episode->publicationDate() ?></div>

				

			<div class="vd-episode__description">
				
				<?php if (is_single() || get_field('no_excerpt',get_the_ID())) : ?>
					<?php the_content(); ?>

					<?php
						$contributors = get_field("contributors",get_the_ID());
					?>
				<?php else : ?>
					<div class="vd-episode__excerpt">
						<?php the_content(); ?>
					</div>

					<?php
						$contributors = get_field("contributors",get_the_ID());
					?>
				<?php endif; ?>

				<!--
				<?php if ($contributors) : ?>
					<section class="vd-episode__contributors vd-contributors">
						<h3 class="vd-title pre-h4"><?= __('Teilnehmer','vd-wmdpod') ?></h3>
						<?php foreach($contributors as $contributor) : ?>

							<?php
								$type	= $contributor['type'];
								
								if ($type == "profile") {
									$profile = $contributor['profile'];

									$image = get_field('image',$profile->ID);
									$links = get_field('links',$profile->ID);

									$name = get_field('name',$profile->ID);
									if (!$name) { $name = $profile->post_title; }
									$comment = get_field('label',$profile->ID);

									if ($contributor["overwrites"]) {
										if ($contributor["overwrites"]["name"]) {
											$name = $contributor["overwrites"]["name"];
										}
										if ($contributor["overwrites"]["label"]) {
											$comment = $contributor["overwrites"]["label"];
										}
									}
								}
								if ($type == "custom") {
									$profile = $contributor['custom_profile'];

									$image = $profile['image'];
									$links = $profile['links'];

									$name = $profile['name'];
									$comment = $profile['label'];
								}
							?>
						
							<article class="vd-contributor vd-card">
								<div class="vd-contributor__pic">
								<?php if ($image) : ?>
									<div class="vd-shadow-pic">
										<img class="vd-shadow-pic__pic vd-img" src="<?= $image['sizes']['wmdpod_profile_pic'] ?>" alt="">
										<span class="vd-shadow-pic__shadow" style="background-image:url('<?= $image['sizes']['wmdpod_profile_pic'] ?>')"></span>
									</div>
								<?php endif; ?>
								</div>

								<div class="vd-contributor__info">
									<div class="vd-contributor__name"><?= $name ?></div>
									<div class="vd-contributor__comment"><?= $comment ?></div>
								</div>

								<?php if ($links) : ?>
								<ul class="vd-contributor__links">
									<?php foreach($links as $link) :?>
										<li><a target="_blank" class="vd-icon-link" href="<?= $link['link_url'] ?>" title="<?= $link['link_title'] ?>">
											<span class="vd-icon-link__icon <?= $link['icon_classes'] ?>"></span>
										</a></li>
									<?php endforeach; ?>
								</ul>
								<?php endif; ?>

							</article>

						<?php endforeach; ?>
					</section>
				<?php endif; ?>
				-->
				
			</div>
		</div>
	
	</div>

	<div id="player" class="vd-episode__player">
		<div class="player vd-card">
			<?= $episode->player() ?>
		</div>
	</div>


	<footer class="vd-episode__footer uk-flex uk-flex-center uk-flex-middle">
		<?php if (!is_single()) : ?>
			<div class="pre-text-center">
				<a href="<?php the_permalink(); ?>#player">
					<?= __('Kommentare','vd-wmdpod') ?>
					<?php if ($post_object->comment_count > 0) : ?>
						<span class="vd-comment-count"><?= $post_object->comment_count ?></span>
					<?php endif; ?>
				</a>
			</div>
		<?php endif; ?>
	</footer>
	
</article>