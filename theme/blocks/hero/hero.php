<?php
/**
 * Process step template.
 *
 * @param array $block The block settings and attributes.
 */

$block_name = 'hero';

$namespace = 'acf';

$block_name = 'wp-block-' . $namespace . '-' . $block_name;

// Block #id
$anchor = ( empty( $block['anchor'] ) ) ? null : 'id=' . $block['anchor'];

// Additional editor classes including $block['style'] defined in block.json
$additional_classes = $block['className'] ?? '';

// Step default classes
$hero_default_classes = 'relative bg-gray-400 min-h-screen hero-home';

// Filter Overlay
$rand = rand ( 10000 , 99999 );
if( get_field('filter') ){
	$filter = 'bg-filter relative overflow-hidden filter-'.$rand;
} else {
	$filter = '';
}

 // Create array $all_classes and implode
$all_classes = array(
	$block_name,
	$additional_classes,
	$filter,
	$hero_default_classes,
);

$classes = implode( ' ', $all_classes );

// Background Image
$bg= '';
if( get_field('bg') ){
	$bg = get_field('bg');
	$bg_md = wp_get_attachment_image_src($bg['id'], 'medium_large');
	$bg_full = wp_get_attachment_image_src($bg['id'], 'full');

	$attributes = 'class="'.$classes.' bg-cover bg-center bg-no-repeat bg-resize" style="background-image: url('.$bg_full[0].')" data-img-md="'.$bg_md[0].'" data-img-full="'.$bg_full[0].'"';
} else {
	$attributes = 'class="'.$classes.'"';
}

?>

<!-- Inline Style for Filter Overlay -->
<?php if( !empty( $filter ) ): ?>
	<style>
		.filter-<?php echo $rand; ?>::before{
			background-color: <?php echo get_field('filter'); ?>
		}
	</style>
<?php endif; ?>
<!-- / Inline Style for Filter Overlay -->

<div <?php echo esc_attr( $anchor ); ?> <?php echo $attributes ?>>
	<div class="grid grid-cols-24 gap-4 relative z-5">

		<div class="hidden md:block md:col-span-3 md:m-auto">
			<div class="flex [writing-mode:vertical-lr] min-h-screen -rotate-180 px-10 w-10">
				<div class="flex border-l-2 border-white h-full pl-4">
					<div class="flex-grow flex justify-center">
						<ul class="flex text-lg leading-5 uppercase text-white font-bold">
							<?php if( get_field('email','option') ): ?>
								<li class="border-b-2 border-white pb-2 mb-2 uppercase">
									<a href="<?php echo 'mailto:'.get_field('email','option') ?>"><?php echo get_field('email','option') ?></a>
								</li>
							<?php endif ?>
							<?php if( get_field('phone','option') ): ?>
								<li>
									<a href="<?php echo 'tel:'.get_field('phone','option') ?>"><?php echo get_field('phone','option') ?></a>
								</li>
							<?php endif ?>
						</ul>
					</div>
					<div class="flex-none">
						<!-- Social fields/options -->
						<?php if( get_field('instagram','option') ): ?>
							<a href="<?php echo get_field('instagram','option') ?>" class="me-2">
								<span class="icon-[fa6-brands--instagram] rotate-90 text-white size-6"></span>
							</a>
						<?php endif ?>
						<?php if( get_field('facebook','option') ): ?>
							<a href="<?php echo get_field('facebook','option') ?>">
								<span class="icon-[fa6-brands--facebook] rotate-90 text-white size-6"></span>
							</a>
						<?php endif ?>
						<!-- / Social fields/options -->
					</div>
				</div>
			</div>
		</div>

		<div class="col-span-24 md:col-span-18">
			<div class="container mx-auto px-6">
				<div class="flex flex-col min-h-screen">
					<div class="flex-none text-center mt-10">
						<?php get_template_part('template-parts/layout/partials/logo', null, array('class' => 'hidden md:inline-block', 'color_mode' => 'light')); ?>
					</div>
					<div class="flex flex-grow">
						<InnerBlocks class="my-auto mx-auto text-center"/>
					</div>
					<div class="flex-none text-center pb-6">
						<a href="#sayHi"><span class="icon-[mdi-light--chevron-double-down] size-16 md:size-32 text-white"></span></a>
					</div>
				</div>
			</div>
		</div>


		<div class="hidden md:block md:col-span-3 md:m-auto">
			<div class="flex [writing-mode:vertical-lr] min-h-screen px-10 w-10">
				<div class="flex border-l-2 border-white h-full pl-4">
					<div class="flex-grow flex justify-center">
						<?php get_template_part( 'template-parts/layout/hero-nav/nav' ); ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
