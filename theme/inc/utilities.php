<?php

function calculateGap($input){
	if($input !== 0 || $input !== NULL ){
		$gap = $input*2;
	} else{
		$gap = 0;
	}
	return $gap;
}

function list_icon($icon, $color='text-primary') {
	$icon_color = $color;
	$string = '<span class="icon-wrapper '.$icon_color.'"><span class="'.$icon.'"></span></span>';

	return $string;
}

function btn_icon($icon, $size) {
   $string = '<span class="left-1 absolute top-1/2 -translate-y-1/2 '.$icon.' '.$size.'"></span>';

   return $string;
}

// function form_submit_button( $button, $form ) {
// 	if(is_front_page( )){
// 		$icon = '<span class="icon-[mdi--arrow-top-right]"></span>';
// 		return '<button id="gform_submit_button_{'.$form['id'].'}">Send'.$icon.'</button>';
// 	}
// 	return;
// }

function form_submit_button( $button, $form ) {

		$icon = "<span class='icon-[mdi--arrow-top-right]'></span>";
		return "<div class='flex w-full justify-end'><button class='py-2 px-4 bg-primary rounded-full text-white items-center uppercase inline-flex font-light' id='gform_submit_button_{$form['id']}'><span>Send</span>$icon</button></div>";

}
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );

?>
