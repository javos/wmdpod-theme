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

	<header id="header" class="vd-header">
		<div class="vd-header__bg"></div>
		<div class="vd-header__inner">
			<div id="pagetitle" class="vd-section">
				<div class="uk-container">
					<div class="vd-logo vd-margin-bottom-medium">
						<a href="<?= get_bloginfo('siteurl') ?>"><img src="<?= get_template_directory_uri() ?>/dist/images/wmd-logo.png" alt=""></a>
					</div>

					<h1 class="vd-title vd-pagetitle">
						<a href="<?= get_bloginfo('siteurl') ?>">
							Was meinst Du?
						</a>
						
						<span class="vd-subtitle">Der Alltagsfragenpodcast</span>
						
						<span class="vd-subtitle small">mit <strong>Tom</strong> & <strong>Janis</strong></span>
					</h1>

				</div>
			</div>
		</div>
		

		<section id="subscribar" class="vd-section">
			<div class="uk-container vd-text-wrapper">

				<div class="vd-subscribar">
					
					<div class="vd-subscribar__button">
						<button id="podlove-subscriberoni" class="vd-icon-link vd-subscribe-button">
							<span class="vd-icon-link__icon fas fa-podcast"></span>
							<span class="vd-icon-link__label">
								<span class="title">Abonnieren</span>
							</span>
						</button>
					</div>

					
					<div class="vd-subscribar__services">
						<ul>
							<?php foreach(get_field('services','option') as $service) : ?>
							<li>
								<a title="Was meinst du? auf <?= $service['service_name'] ?>" href="<?= $service['url'] ?>" target="blank">
									<span class="<?= $service['service_icon_class'] ?>"></span>
								</a>
							</li>
							<?php endforeach; ?>

							<!-- <li><a href="https://podcasts.apple.com/de/podcast/was-meinst-du-der-alltagsfragenpodcast/id1515996447?l=en" target="blank" class="Was meinst du? auf Apple Podcasts"><span class="fab fa-apple"></span></a></li>
							<li><a href="" target="blank" class="Was meinst du? auf Google Podcasts"><span class="fab fa-google"></span></a></li>
							<li><a href="https://www.deezer.com/show/1308842?utm_source=deezer&utm_content=show-1308842&utm_term=3820704962_1596412814&utm_medium=web" target="blank" class="Was meinst du? auf Deezer"><span class="fab fa-deezer"></span></a></li> -->
						</ul>
					</div>
				</div>
				
			</div>
		</section>

	</header>