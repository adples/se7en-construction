<?php
/**
 * Process step template.
 *
 * @param array $block The block settings and attributes.
 */

 $block_name = 'image-panel';

 $namespace = 'acf';

 $block_name = 'wp-block-' . $namespace . '-' . $block_name;

 // Block #id
 $anchor = ( empty( $block['anchor'] ) ) ? null : 'id=' . $block['anchor'];

 // Additional editor classes including $block['style'] defined in block.json
 $additional_classes = $block['className'] ?? '';

 // Image panel default classes
 $image_panel_default_classes = 'image-panel bg-filter relative overflow-hidden p-12 rounded-[3rem] md:rounded-[4rem] lg:rounded-[4.5rem] 2xl:rounded-[5rem] md:px-24 md:py-24 lg:p-30 xl:p-36 2xl:p-46';

 //
 $show_link = false;
 $link = '#';
 $link_text = 'Learn More';

 if( get_field('show_link') ) $show_link = true;
 if( get_field('link_text') ) $link_text = get_field('link_text');

 // Create array $all_classes and implode
$all_classes = array(
	$block_name,
	$additional_classes,
	$image_panel_default_classes,
);

$classes = implode( ' ', $all_classes );

// Background Image
$bg= '';
if( get_field('bg') ){
	$bg = get_field('bg');
	$bg_md = wp_get_attachment_image_src($bg['id'], 'medium_large');
	$bg_full = wp_get_attachment_image_src($bg['id'], 'full');

	$attributes = 'class="'.$classes.' bg-cover bg-center bg-no-repeat bg-resize" style="background-image: url('.$bg_md[0].')" data-img-md="'.$bg_md[0].'" data-img-full="'.$bg_full[0].'"';
} else {
	$attributes = 'class="'.$classes.'"';
}


?>
<div <?php echo esc_attr( $anchor ); ?>  class="image-panel-wrapper">
	<div <?php echo $attributes ?>>
		<?php if($show_link): ?>
			<div class="relative z-1 flex flex-col md:flex-row gap-6">
				<InnerBlocks class="md:basis-1/2 md:order-1"/>
				<div class="md:basis-1/2 flex items-center justify-center">
					<?php get_template_part( 'template-parts/components/magnetic-button', null, array('link' => $link, 'link_text' => $link_text, 'size' => 'large') ); ?>
				</div>
			</div>
		<?php else: ?>
			<InnerBlocks class="relative z-1" />
		<?php endif ?>
	</div>
</div>
