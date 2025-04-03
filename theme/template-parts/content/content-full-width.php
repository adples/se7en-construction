<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package adp_tw
 */

?>

<main id="post-<?php the_ID(); ?>" <?php post_class('main-content'); ?>>

	<div>
		<?php the_content(); ?>
	</div>

</main>
<!-- #post-<?php the_ID(); ?> -->
