<?php
	$type			= get_field('type');
	$profile 		= get_field('profile');
	$field_id		= get_the_ID();

	if ($type == 'profile') { if ($profile) { $field_id = $profile->ID; } }
	
	$name			= get_field('name',$field_id);
	if ($type == 'profile' && !$name && $profile) { $name = $profile->post_title; }

	$label			= get_field('label',$field_id);
	$description	= get_field('description',$field_id);
	$links			= get_field('links',$field_id);
	$image			= get_field('image',$field_id);

?>

<?php if ($type == 'profile' || $type == 'custom') : ?>

<div class="vd-profile-card">
	<div class="vd-profile-card__top">
		<div class="vd-profile-card__pic">
			<?php if ($image) : ?>
				<div class="vd-shadow-pic">
					<img class="vd-shadow-pic__pic" src="<?= $image['sizes']['wmdpod_profile_pic'] ?>" alt="">
					<span class="vd-shadow-pic__shadow" style="background-image:url('<?= $image['sizes']['wmdpod_profile_pic'] ?>')"></span>
				</div>
			<?php endif; ?>
		</div>

		<div class="vd-profile-card__text">
			<div class="vd-profile-card__title"><?= $name ?></div>
			<div class="vd-profile-card__subtitle"><?= $label ?></div>

			<div class="vd-profile-card__bio">
				<?= $description ?>
			</div>
		</div>
	</div>

	<ul class="vd-profile-card__links">
		<?php if ($links) : ?>
			<?php foreach($links as $link) :?>
				<li><a target="_blank" class="vd-icon-link" href="<?= $link['link_url'] ?>">
					<span class="vd-icon-link__icon <?= $link['icon_classes'] ?>"></span>
					<span class="vd-icon-link__label"><?= $link['link_title'] ?></span>
				</a></li>
			<?php endforeach; ?>
		<?php endif; ?>
	</ul>
</div>

<?php endif; ?>