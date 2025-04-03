<?php
/**
 * Contact Block template.
 *
 * @param array $block The block settings and attributes.
 *
 * w-1/12 w-2/12 w-3/12 w-4/12 w-5/12 w-6/12 w-7/12 w-8/12 w-9/12 w-10/12 w-11/12 w-full
 * sm:w-1/12 sm:w-2/12 sm:w-3/12 sm:w-4/12 sm:w-5/12 sm:w-6/12 sm:w-7/12 sm:w-8/12 sm:w-9/12 sm:w-10/12 sm:w-11/12 sm:w-full
 * md:w-1/12 md:w-2/12 md:w-3/12 md:w-4/12 md:w-5/12 md:w-6/12 md:w-7/12 md:w-8/12 md:w-9/12 md:w-10/12 md:w-11/12 md:w-full
 * lg:w-1/12 lg:w-2/12 lg:w-3/12 lg:w-4/12 lg:w-5/12 lg:w-6/12 lg:w-7/12 lg:w-8/12 lg:w-9/12 lg:w-10/12 lg:w-11/12 lg:w-full
 * xl:w-1/12 xl:w-2/12 xl:w-3/12 xl:w-4/12 xl:w-5/12 xl:w-6/12 xl:w-7/12 xl:w-8/12 xl:w-9/12 xl:w-10/12 xl:w-11/12 xl:w-full
 * 2xl:w-1/12 2xl:w-2/12 2xl:w-3/12 2xl:w-4/12 2xl:w-5/12 2xl:w-6/12 2xl:w-7/12 2xl:w-8/12 2xl:w-9/12 2xl:w-10/12 2xl:w-11/12 2xl:w-full
 * lg:ps-2 lg:ps-4 lg:ps-6 lg:ps-8 lg:ps-10 lg:ps-12
 * xl:ps-2 xl:ps-4 xl:ps-6 xl:ps-8 xl:ps-10 xl:ps-12
 * 2xl:ps-2 2xl:ps-4 2xl:ps-6 2xl:ps-8 2xl:ps-10 2xl:ps-12 2xl:ps-14 2xl:ps-16 2xl:ps-18 2xl:ps-20 2xl:ps-22 2xl:ps-24
 * lg:pe-2 lg:pe-4 lg:pe-6 lg:pe-8 lg:pe-10 lg:pe-12
 * xl:pe-2 xl:pe-4 xl:pe-6 xl:pe-8 xl:pe-10 xl:pe-12
 * 2xl:pe-2 2xl:pe-4 2xl:pe-6 2xl:pe-8 2xl:pe-10 2xl:pe-12 2xl:pe-14 2xl:pe-16 2xl:pe-18 2xl:pe-20 2xl:pe-22 2xl:pe-24
 * justify-start justify-center justify-end
 * sm:justify-start sm:justify-center sm:justify-end
 * md:justify-start md:justify-center md:justify-end
 * lg:justify-start lg:justify-center lg:justify-end
 * xl:justify-start xl:justify-center xl:justify-end
 * 2xl:justify-start 2xl:justify-center 2xl:justify-end
 */

include get_template_directory() . '/template-parts/components/spacing.php';

$block_name = 'flex-row';

$namespace = 'acf';

$block_name = 'wp-block-' . $namespace . '-' . $block_name;

// Block #id
$anchor = ( empty( $block['anchor'] ) ) ? null : 'id=' . $block['anchor'];

// Additional editor classes including $block['style'] defined in block.json
$additional_classes = $block['className'] ?? '';

// Init
$row_width = $row_width_sm = $row_width_md = $row_width_lg = $row_width_xl = $row_width_2xl = '';
$justify = $justify_sm = $justify_md = $justify_lg = $justify_xl = $justify_2xl = '';
$all_spacing_classes = [];
$ps = $ps_lg = $ps_xl = $ps_2xl = '';
$pe = $pe_lg = $pe_xl = $pe_2xl = '';

$row_width = 'w-full';

// Set class roots
$root_width = 'w-';
$root_justify = 'justify-';
$root_ps = 'ps-';
$root_pe = 'pe-';

// Default classes
$default_classes = 'flex';

// Set row widths
if( ( get_field('width') ) ) $row_width = $root_width.get_field('width');
if( ( get_field('width_sm') && get_field('width_sm') !== 'default') ) $row_width_sm = 'sm:'.$root_width.get_field('width_sm');
if( ( get_field('width_md') && get_field('width_md') !== 'default' ) ) $row_width_md = 'md:'.$root_width.get_field('width_md');
if( ( get_field('width_lg') && get_field('width_lg') !== 'default' ) ) $row_width_lg = 'lg:'.$root_width.get_field('width_lg');
if( ( get_field('width_xl') && get_field('width_xl') !== 'default') ) $row_width_xl = 'xl:'.$root_width.get_field('width_xl');
if( ( get_field('width_2xl') && get_field('width_2xl') !== 'default' ) ) $row_width_2xl = '2xl:'.$root_width.get_field('width_2xl');

// Create array $all_row_classes and implode
$all_row_classes = array(
	$row_width,
	$row_width_sm,
	$row_width_md,
	$row_width_lg,
	$row_width_xl,
	$row_width_2xl,
	$spacing_classes,
);

$row_classes = implode( ' ', $all_row_classes );
$row_classes = trim($row_classes);
$row_classes = preg_replace('/\s+/', ' ', $row_classes);

// Set alignment classes
if( get_field('justify') ) $justify = $root_justify.get_field('jusitfy');
if( get_field('justify_sm') && get_field('justify_sm') !== 'unset' ) $justify_sm = 'sm:'.$root_justify.get_field('justify_sm');
if( get_field('justify_md') && get_field('justify_md') !== 'unset') $justify_md = 'md:'.$root_justify.get_field('justify_md');
if( get_field('justify_lg') && get_field('justify_lg') !== 'unset') $justify_lg = 'lg:'.$root_justify.get_field('justify_lg');
if( get_field('justify_xl') && get_field('justify_xl') !== 'unset') $justify_xl = 'xl:'.$root_justify.get_field('justify_xl');
if( get_field('justify_2xl') && get_field('justify_2xl') !== 'unset') $justify_2xl = '2xl:'.$root_justify.get_field('justify_2xl');

// Create array $all_classes and implode
$all_classes = array(
	$block_name,
	$default_classes,
	$justify,
	$justify_sm,
	$justify_md,
	$justify_lg,
	$justify_xl,
	$justify_2xl,
	$additional_classes,
);

$classes = implode( ' ', $all_classes );
$classes = trim($classes);
$classes = preg_replace('/\s+/', ' ', $classes);

?>


<div <?php echo esc_attr( $anchor ); ?> class="<?php echo $classes ?>">
	<div class="flex-none <?php echo $row_classes ?>">
		<InnerBlocks />
	</div>
</div>
