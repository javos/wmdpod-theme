<?php
	if ( get_post_type() == 'podcast') {
		include locate_template( 'template-parts/post-podcast.php'  );
	}
	else {
		include locate_template( 'template-parts/post-blog.php'  );
	}
?>