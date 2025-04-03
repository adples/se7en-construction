<?php
/**
 * Template part for Button
 */
?>

<?php

$block_classes = isset($args['classes']) ? $args['classes'] : '';
$classes= isset($args['classes']) ? $args['classes'] : '';

//
$size = $border = $border_radius = $icon = '';
$text = 'Learn More';
$url = '#';
$use_icon = false;
$icon_wrapper_classes = 'relative transition group-hover:translate-x-1 size-5';
$icon_classes = 'left-1 absolute top-1/2 -translate-y-1/2 size-6';

if( have_rows('btn') ):
	while( have_rows('btn') ): the_row();

		// Set border classes
		if( get_sub_field('btn_border') == 'primary' ){
			$border = 'border border-primary';
		} else if( get_sub_field('btn_border') == 'secondary' ){
			$border = 'border border-secondary';
		}

		// Set border radius classes
		if( get_sub_field('btn_border_radius') == 'sm' ){
			$border_radius = 'rounded-sm';
		} else if( get_sub_field('btn_border_radius') == 'md' ){
			$border_radius = 'rounded-md';
		} else if( get_sub_field('btn_border_radius') == 'full' ){
			$border_radius = 'rounded-full';
		}

		// Create array $all_classes and implode
		$all_classes = array(
			$block_classes,
			$border,
			$border_radius,
			$size,
		);

		$classes = implode( ' ', $all_classes );
		$classes = trim($classes);
		$classes = preg_replace('/\s+/', ' ', $classes);


		if( get_sub_field('use_icon') ) $use_icon = true;

		if( get_sub_field('icon') ) $icon = 'icon-['.get_sub_field('icon').']';

		if( get_sub_field('btn_text') ) $text = get_sub_field('btn_text');

		if( get_sub_field('custom') && get_sub_field('btn_link_custom') ){
			$url = get_sub_field('btn_link_custom');
		} elseif ( get_sub_field('btn_link') ){
			$url = get_sub_field('btn_link');
		}
		?>

		<a href="<?php echo esc_url($url); ?>" class="<?php echo $classes; ?>">
			<?php if( $use_icon == true && !empty($icon) && get_sub_field('icon_before')): ?>
				<div class="<?php echo $icon_wrapper_classes ?>" >
					<span class="<?php echo $icon.' '.$icon_classes ?>"></span>
				</div>
			<?php endif ?>
			<span><?php echo $text; ?></span>
			<?php if( $use_icon == true && !empty($icon) && !get_sub_field('icon_before')): ?>
				<div class="<?php echo $icon_wrapper_classes ?>" >
					<span class="<?php echo $icon.' '.$icon_classes ?>"></span>
				</div>
			<?php endif ?>
		</a>

	<?php endwhile; ?>
<?php endif; ?>

