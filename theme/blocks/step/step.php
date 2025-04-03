<?php
/**
 * Process step template.
 *
 * @param array $block The block settings and attributes.
 */

 $block_name = 'step';

 $namespace = 'acf';

 $block_name = 'wp-block-' . $namespace . '-' . $block_name;

 // Block #id
 $anchor = ( empty( $block['anchor'] ) ) ? null : 'id=' . $block['anchor'];

 // Additional editor classes including $block['style'] defined in block.json
 $additional_classes = $block['className'] ?? '';

 // Step default classes
$step_default_classes = 'step flex md:items-center mb-8 xl:mb-12 last:mb-0';

 // Create array $all_classes and implode
$all_classes = array(
	$block_name,
	$additional_classes,
	$step_default_classes,
);

$classes = implode( ' ', $all_classes );

?>

<div <?php echo esc_attr( $anchor ); ?> class="<?php echo $classes ?>">
	<?php if(get_field('num')): ?>
		<div class="relative flex-none me-4 sm:me-8 lg:me-12 border-2 border-primary rounded-full size-18 sm:size-22 md:size-26 2xl:size-34 xl:size-30 text-center number">
			<span class="top-1/2 left-1/2 absolute text-[2rem] sm:text-[2.5rem] md:text-[3rem] 2xl:text-[4.5rem] xl:text-[4rem] -translate-x-1/2 -translate-y-1/2"><?php echo get_field('num') ?></span>
		</div>
	<?php endif ?>

	<div>
		<InnerBlocks />
	</div>
</div>
