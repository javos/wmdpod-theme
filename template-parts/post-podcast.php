<?php
	$podcast = \Podlove\get_podcast();
	$episode = \Podlove\get_episode();
?>

<article class="vd-episode"> 
	<div class="vd-episode__inner">

		<header class="vd-episode__header">
			<?php
				$episode_header_pic = get_field('wmdpod_episode_header_pic',get_the_ID());
				if ($episode_header_pic && $episode_header_pic['sizes']['wmdpod_episode_header_pic']) :

					$header_pic_url = $episode_header_pic['sizes']['wmdpod_episode_header_pic'];
			?>
			<div class="vd-shadow-pic">
				<a href="<?php the_permalink() ?>#main"><img class="vd-shadow-pic__pic" src="<?= $header_pic_url ?>" alt=""></a>

				<span class="vd-shadow-pic__shadow" style="background-image: url('<?= $header_pic_url ?>'); "></span>
			</div>
			<?php endif; ?>
		</header>

		<div class="vd-episode__padded">
			
			<div class="vd-episode__title uk-flex uk-flex-row uk-flex-center">
				<div class="pre-flex-fluid">
					<h3 class="vd-title"><a href="<?php the_permalink(); ?>"><span class="vd-subtitle"><?= $podcast->title() ?></span> <?= $episode->title() ?></a></h3>
				</div>
				
				<div class="vd-episode__number pre-flex-fixed">
					<span class="vd-episode__badge"><?php printf( esc_html__( 'Folge %d', 'vd-wmdpod' ), $episode->number() ); ?></span>
				</div>
			</div>

			
			<div class="uk-grid">
				<div class="vd-episode__description uk-width-3-4@s">
					
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

					<?php if (!is_single()) : ?>
						<div class="uk-text-center"><a href="<?php the_permalink(); ?>#main"><?= __("Weiterlesen","vd-wmdpod"); ?></a></div>
					<?php endif; ?>

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
					
				</div>
				<aside class="vd-episode__info uk-width-1-4@s uk-text-right@s">

					<dl class="vd-dl">
						<dt><?= __('veröffentlicht am','vd-wmdpod'); ?></dt>
						<dd><?= $episode->publicationDate() ?></dd>
					</dl>

					<dl class="vd-dl">
						<dt><?= __('Dauer','vd-wmdpod'); ?></dt>
						<dd><?= $episode->duration() ?></dd>
					</dl>

				</aside>
			</div>
		</div>

		<div id="player" class="vd-episode__player">
			<div class="player vd-card">
				<?= $episode->player() ?>
			</div>
		</div>
	</div>

		<footer class="vd-episode__footer uk-flex">
			<div class="pre-flex-fluid uk-text-muted <?php if (is_single()) : ?>uk-text-center<?php endif; ?>"><?= __('Dir gefällt die Folge oder du hast Feedback ? Lass es uns wissen!','vd-wmdpod'); ?></div>
			<?php if (!is_single()) : ?>
				<div class="pre-flex-fixed">
					<a href="<?php the_permalink(); ?>#player"><?= __('Kommentare','vd-wmdpod') ?> 10</a>
				</div>
			<?php endif; ?>
		</footer>
</article>