<?php

/**
 * Register ACF block categories.
 */
function register_block_category( $categories ) {

	$categories[] = array(
		'slug'  => '_tw',
		'title' => '_tw',
		'order' => 0
	);

	return $categories;
}
add_action( 'block_categories', 'register_block_category', 10, 2 );



/**
 * Register ACF blocks.
 */

function register_acf_blocks() {

	$dir = get_template_directory() . '/blocks/';
	$folders = array_diff(scandir($dir), array('..', '.'));

	foreach ($folders as $folder) {
		// Check if the item is a directory and not a file using is_dir()
		if (is_dir($dir . $folder)) {
			// Register each ACF block to WordPress using register_block_type()
			register_block_type($dir . $folder, [
				'category' => '_tw',
				'icon' => 'star-filled',
			]);
		}
	}
}
add_action('init', 'register_acf_blocks', 5);



/**
 * Remove AFC innerblocks default wrapper
 */

function acf_should_wrap_innerblocks( $wrap, $name ) {
	if ( $name == 'acf/flex-row' ||  $name == 'acf/grid-row' || $name == 'acf/grid-col' ) {
		return true;
	}
	return false;
}
//add_filter( 'acf/blocks/wrap_frontend_innerblocks', 'acf_should_wrap_innerblocks', 10, 2 );


function remove_custom_padding_button() {
	echo '<style>
		.components-button.spacing-sizes-control__custom-toggle{
			display: none!important;
		}
	</style>';
}
add_action('admin_head', 'remove_custom_padding_button');

//add_action( 'init', 'theme_register_block_styles' );

function theme_register_block_styles() {
    register_block_style( 'core/image', array(
        'name'         => 'rounded-accent',
        'label'        => __( 'Accent', 'themeslug' )
    ) );
}

remove_filter('the_content', 'wptexturize');
