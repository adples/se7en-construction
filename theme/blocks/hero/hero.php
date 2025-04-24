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
$hero_default_classes = 'relative bg-gray-400 h-screen md:min-h-[800px] hero-home';

// Filter Overlay
$rand = rand ( 10000 , 99999 );
if( get_field('filter') ){
	$filter = 'bg-filter relative overflow-hidden filter-'.$rand;
} else {
	$filter = '';
}

//Background Video
$show_video = get_field('show_video') && get_field('video') ? true : false;

// Create array $all_classes and implode
$all_classes = array(
	$block_name,
	$additional_classes,
	$hero_default_classes,
);

if( !$show_video ) array_push($all_classes, $filter);

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

	<?php if( $show_video ): ?>
		<div class="video-wrapper <?php echo $filter ?>">
		<?php
		$x='https://player.vimeo.com/video/';
		$y='&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;autoplay=1&amp;loop=1&amp;background=1';
		$vimeo = get_field('video');
		$vimeo_url = $x.$vimeo.$y;
		?>

		<iframe id="vimeo" src="<?php echo esc_url($vimeo_url) ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

	<?php endif ?>

	<div class="z-5 relative gap-4 grid grid-cols-24">

		<div class="hidden md:block hero-left md:col-span-3 md:m-auto">
			<div class="flex px-10 w-10 h-screen md:min-h-[800px] -rotate-180 [writing-mode:vertical-lr]">
				<div class="flex pl-4 border-white border-l-2 h-full">
					<div class="flex flex-grow justify-center">
						<ul class="flex font-bold text-white 2xl:text-lg uppercase leading-5">
							<?php if( get_field('email','option') ): ?>
								<li class="mb-2 pb-2 border-white border-b-2 uppercase">
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
								<span class="size-6 text-white rotate-90 icon-[fa6-brands--instagram]"></span>
							</a>
						<?php endif ?>
						<?php if( get_field('facebook','option') ): ?>
							<a href="<?php echo get_field('facebook','option') ?>">
								<span class="size-6 text-white rotate-90 icon-[fa6-brands--facebook]"></span>
							</a>
						<?php endif ?>
						<!-- / Social fields/options -->
					</div>
				</div>
			</div>
		</div>

		<div class="col-span-24 md:col-span-18 hero-center">
			<div class="mx-auto px-6 container">
				<div class="flex flex-col min-h-screen">
					<div class="flex-none mt-10 mb-6 text-center">
						<?php get_template_part('template-parts/layout/partials/logo', null, array('class' => 'hidden md:inline-block', 'color_mode' => 'light')); ?>
					</div>
					<div class="flex flex-grow">
						<InnerBlocks class="mx-auto my-auto text-center"/>
					</div>
					<div class="flex-none pb-6 text-center">
						<a href="#sayHi"><span class="size-16 md:size-32 text-white icon-[mdi-light--chevron-double-down]"></span></a>
					</div>
				</div>
			</div>
		</div>


		<div class="hidden md:block hero-right md:col-span-3 md:m-auto">
			<div class="flex px-10 w-10 h-screen md:min-h-[800px] [writing-mode:vertical-lr]">
				<div class="flex pl-4 border-white border-l-2 h-full">
					<div class="flex flex-grow justify-center">
						<?php get_template_part( 'template-parts/layout/hero-nav/nav' ); ?>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php if( $show_video ): ?>

			<?php //get_template_part( 'template-parts/components/loader' ); ?>

		<!-- close video wrapper -->
		</div>
	<?php endif; ?>

</div>

