<?php
	if (!$image_url) {
		$image = get_field('image');

		$image_size = '';
		$image_url = '';

		$image_alt = $image['alt'];
		$image_title = $image['title'];

		if ($image) {
			$image_url = $image['sizes']['vd_shadow_pic_max'];
		}
	}

	if (!$image_alt) { $image_alt = ""; }
	if (!$image_title) { $image_title = ""; }
?>

<div class="vd-shadow-pic vd-margin-bottom-medium">
	<img class="vd-shadow-pic__pic vd-img" src="<?= $image_url ?>" alt="<?= $image_alt ?>" title="<?= $image_title ?>">
	<span class="vd-shadow-pic__shadow" style="background-image:url('<?= $image_url ?>');"></span>
</div>