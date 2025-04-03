<?php
/**
 * Template part for Spacing
 */
?>

<?php

//
$all_spacing_classes = [];
$ps = $ps_lg = $ps_xl = $ps_2xl = '';
$pe = $pe_lg = $pe_xl = $pe_2xl = '';

//
$root_ps = 'ps-';
$root_pe = 'pe-';


//
if( have_rows('spacing_lg') ){
	while( have_rows('spacing_lg') ): the_row();
		if( get_sub_field('ps') != 0 ) $ps_lg = 'lg:'.$root_ps.(get_sub_field('ps')*2);
		if( get_sub_field('pe') != 0 ) $pe_lg = 'lg:'.$root_pe.(get_sub_field('pe')*2);
	endwhile;
}
if( get_field('show_spacing_lg') ) array_push($all_spacing_classes, $ps_lg, $pe_lg);

if( have_rows('spacing_xl') ){
	while( have_rows('spacing_xl') ): the_row();
		if( get_sub_field('ps') != 0 ) $ps_xl = 'xl:'.($root_ps.get_sub_field('ps')*2);
		if( get_sub_field('pe') != 0 ) $pe_xl = 'xl:'.($root_pe.get_sub_field('pe')*2);
	endwhile;
}
if( get_field('show_spacing_xl') ) array_push($all_spacing_classes, $ps_xl, $pe_xl);

if( have_rows('spacing_2xl') ){
	while( have_rows('spacing_2xl') ): the_row();
		if( get_sub_field('ps') != 0 ) $ps_2xl = '2xl:'.($root_ps.get_sub_field('ps')*2);
		if( get_sub_field('pe') != 0 ) $pe_2xl = '2xl:'.($root_pe.get_sub_field('pe')*2);
	endwhile;
}
if( get_field('show_spacing_2xl') ) array_push($all_spacing_classes, $ps_2xl, $pe_2xl);


$spacing_classes = implode( ' ', $all_spacing_classes );
?>
