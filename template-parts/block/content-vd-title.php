<?php
	$tag = get_field('tag');
	if ($tag == 'custom') {
		$taget = get_field('custom_tag');
	}
	$title = get_field('title');
	$subtitle = get_field('subtitle');
	$heading_class = get_field('heading_class');
?>

<<?= $tag ?> class="vd-title <?php if ($heading_class && $heading_class != 'none') { echo $heading_class; } ?>"><?= $title ?> <?php if ($subtitle) : ?><span class="vd-subtitle"><?= $subtitle ?></span><?php endif; ?></<?= $tag ?>>