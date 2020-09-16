<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" >

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<script>
		document.body.classList.remove('no-js');
	</script>

	<header id="header">
		<div class="vd-section">
			<div class="uk-container">
				<div class="vd-logo vd-margin-bottom-medium">
					<div class="vd-shadow-pic">
						<a href="<?= get_bloginfo('siteurl') ?>"><img class="vd-shadow-pic__pic" src="<?= get_template_directory_uri() ?>/dist/images/wasmeinstdu-2-lowq.jpg" alt=""></a>
						<span class="vd-shadow-pic__shadow" style="background-image:url('<?= get_template_directory_uri() ?>/dist/images/wasmeinstdu-2-lowq.jpg')"></span>
					</div>
				</div>

				<h1 class="vd-title vd-pagetitle"><a href="<?= get_bloginfo('siteurl') ?>">Was meinst Du?</a> <span class="vd-subtitle">Der Alltagsfragenpodcast</span></h1>

				<div class="vd-teaser-text vd-text-wrapper">
					Alltagsprobleme, Schabernack und Sonstiges – Tom und Janis stellen sich Alltagsfragen und erforschen ihre Meinungen. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.
				</div>
			</div>
		</div>
		

		<section class="vd-section">
			<div class="uk-container vd-text-wrapper">
				<div class="uk-grid">
					<div class="uk-width-1-2@m">
					
						<!-- <button id="podlove-subscriberoni" class="vd-icon-link vd-subscribe-button podlove-subscribe-button-wmdpod-subscribe">
							<span class="vd-icon-link__icon fas fa-podcast"></span>
							<span class="vd-icon-link__label">
								<span class="title">Jetzt abonnieren</span>
								<span class="subtitle">in deiner Lieblings-Podcast-App</span>
							</span>
						</button> -->

						<button id="podlove-subscriberoni" class="vd-icon-link vd-subscribe-button podlove-podcast-subscribe-button-podlove-subscriberoni">
							<span class="vd-icon-link__icon fas fa-podcast"></span>
							<span class="vd-icon-link__label">
							<span class="title">Jetzt abonnieren</span>
								<span class="subtitle">in deiner Lieblings-Podcast-App</span>
							</span>
						</button>

						
					</div>

					<div class="uk-width-1-2@m">
						<div class="vd-subscribar">
							<ul>
								<li><a title="Was meinst du? auf Spotify" href="https://open.spotify.com/show/5QcJPaDPm4To6HZs9RS0UX" target="blank"><span class="fab fa-spotify"></span></a></li>
								<li><a href="https://podcasts.apple.com/de/podcast/was-meinst-du-der-alltagsfragenpodcast/id1515996447?l=en" target="blank" class="Was meinst du? auf Apple Podcasts"><span class="fab fa-apple"></span></a></li>
								<li><a href="https://www.deezer.com/show/1308842?utm_source=deezer&utm_content=show-1308842&utm_term=3820704962_1596412814&utm_medium=web" target="blank" class="Was meinst du? auf Deezer"><span class="fab fa-deezer"></span></a></li>
								<li><a href="" target="blank" class="Was meinst du? auf Google Podcasts"><span class="fab fa-google"></span></a></li>
							</ul>
						</div>
					</div>
				</div>

				
			</div>

		</section>

	</header>
		

	<nav class="vd-nav vd-section uk-visible@l" uk-sticky>
		<div class="uk-container pre-container">
			<div class="uk-flex">
				<div class="pre-flex-fluid">
					<ul class="vd-nav__list"  uk-scrollspy-nav="closest: li; scroll: true; cls: current;">
					<?php
						if ( has_nav_menu( 'primary' ) ) {

							wp_nav_menu(
								array(
									'container'  => '',
									'items_wrap' => '%3$s',
									'theme_location' => 'primary',
								)
							);
						}
						?>
					</ul>

					
				</div>
			</div>
		</div>
	</nav>


	