<?php
/**
 * Template part for Badge
 */
?>

<?php
$block_classes = isset($args['classes']) ? $args['classes'] : '';
$text = isset($args['text']) ? $args['text'] : 'Pass some text!'
?>

<div class="py-1 px-3 xl:py-2 xl:px-4 bg-black rounded-full text-white items-center uppercase inline-flex font-light">
	<span class="icon-[material-symbols-light--asterisk-rounded] size-6"></span>
	<span class="text-sm xl:text-base ms-1"><?php echo $text ?></span>
</div>
