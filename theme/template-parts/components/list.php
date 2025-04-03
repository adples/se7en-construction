<?php
/**
 * Partial - List
 */
?>

<?php

// Check for vars passed into template
$block_classes = isset($args['classes']) ? $args['classes'] : '';
$block_anchor = isset($args['anchor']) ? $args['anchor'] : '';

// Init
$icon = $list_icon_class = '';
$use_icon = $split_list = false;
$list = [];

// Default list classes
$list_default_classes = 'list-none ps-0 2xl:text-lg';

// Check for use_icon (field || sub_field )
if( get_field('use_icon') || get_sub_field('use_icon')){
	$use_icon = true;

	// Get icon (field || sub_field )
	if( get_field('icon') ){
		$icon = 'icon-['.get_field('icon').']';
	} elseif( get_sub_field('icon') ){
		$icon = 'icon-['.get_sub_field('icon').']';
	}
}

// Set list class
if ( $use_icon == true && !empty($icon) ) $list_icon_class = 'icon-list';

// Create array $all_classes and implode
$all_classes = array(
	$block_classes,
	$list_default_classes,
	$list_icon_class,
);

$classes = implode( ' ', $all_classes );
$classes = trim($classes);
$classes = preg_replace('/\s+/', ' ', $classes);

// Check for split (field || sub_field )
if( get_sub_field('split') || get_field('split') ):

	$split_list = true;
	$i=0;

	if( have_rows('list') ):
		while( have_rows('list') ): the_row();
			if( get_sub_field('list_item') ):
				$list[$i] = get_sub_field('list_item');
			endif;
			$i++;
		endwhile;

		$len = (int) count($list);
		$list_1 = array_slice($list, 0, round($len / 2));
		$list_2 = array_slice($list, round($len / 2));
	endif;
endif;

?>

<?php if( $split_list ): ?>

	<?php if( get_field('list') || get_sub_field('list') ): ?>
		<div <?php echo $block_anchor; ?> class="split-list columns-2 text-start">
			<div>
				<ul class="<?php echo $classes ?>" >
					<?php foreach ($list_1  as $li): ?>
						<li>
							<?php if( $use_icon == true && !empty($icon) ){ echo list_icon($icon); } ?>
							<?php echo $li; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div>
				<ul class="<?php echo $classes ?>">
					<?php foreach ($list_2  as $li): ?>
						<li>
							<?php if( $use_icon == true && !empty($icon) ){ echo list_icon($icon); } ?>
							<?php echo $li; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
	<?php endif; ?>

<?php else: ?>

	<?php if( have_rows('list') ): ?>
		<ul <?php echo $block_anchor; ?> class="<?php echo $classes ?>">
			<?php while( have_rows('list') ): the_row(); ?>
				<?php if( get_sub_field('list_item') ): ?>
					<li>
						<?php if( $use_icon == true && !empty($icon)){ echo list_icon($icon); } ?>
						<?php echo get_sub_field('list_item') ?>
					</li>
				<?php endif; ?>
			<?php endwhile; ?>
		</ul>
	<?php endif; ?>

<?php endif; ?>
