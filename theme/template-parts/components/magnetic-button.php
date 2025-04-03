<?php
/**
 * Template part for Magnetic Button
 */

$block_classes = isset($args['classes']) ? $args['classes'] : '';
$link_text = isset($args['link_text']) ? $args['link_text'] : 'Learn More';
$link = isset($args['link']) ? $args['link'] : '#';
$size = isset($args['size']) ? $args['size'] : 'default';

if($size === 'large'):
	$default_button_classes = 'magnetic-button relative size-50 lg:size-70 border-2 border-primary rounded-full';
	$default_text_classes = 'absolute uppercase left-1/2 text-xl -translate-x-1/2 top-1/2 -translate-y-1/2 w-full text-center';
	$default_orb_classes = 'absolute -top-2 size-15 lg:size-25 border-2 border-primary bg-primary rounded-full';
else:
	$default_button_classes = 'magnetic-button relative size-50 border-2 border-primary rounded-full';
	$default_text_classes = 'absolute uppercase left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2 w-full text-center';
	$default_orb_classes = 'absolute -top-2 size-15 border-2 border-primary bg-primary rounded-full';
endif;

$button_color = str_contains($block_classes, 'is-style-magnetic-light') ? 'bg-white text-foreground' : 'is-style-magnetic-dark bg-black/33 text-white';
$link_text_color = str_contains($block_classes, 'is-style-magnetic-light') ? '' : '';

// Create array $all_classes and implode
$all_classes = array(
	$block_classes,
	$default_button_classes,
	$button_color
);

$classes = implode( ' ', $all_classes );

?>

<div class="flex magnetic-wrapper p-5">
<a href="<?php echo esc_url($link)?>" class="<?php echo $classes ?>">
	<span class="<?php echo $default_orb_classes ?>"></span>
	<span class="<?php echo $default_text_classes.' '.$link_text_color ?>">
		<?php echo $link_text ?>
		<span class='magnetic-icon icon-[mdi--arrow-top-right] relative top-1'></span>
	</span>
</a>
</div>
