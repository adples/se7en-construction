<?php
/**
 * Template part for displaying the logo
 */

$add_class = isset($args['class']) ? $args['class'] : '';
$color_mode = isset($args['color_mode']) ? $args['color_mode'] : '';

if( $color_mode === 'light' ){
	$color_mode = 'brightness-0 invert-100 drop-shadow-lg';
}
?>

<?php if ( get_theme_mod( 'site_logo' ) ): ?>
  <a href="<?php echo esc_url( home_url( '/' )); ?>" class="text-2xl font-bold text-black <?php echo $add_class.' '.$color_mode ?>">
	  <img class="w-[125px] lg:w-[175px] xl:w-[200px]" src="<?php echo esc_attr(get_theme_mod( 'site_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
  </a>
<?php else : ?>
  <a class="text-2xl font-bold text-black" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
<?php endif; ?>
