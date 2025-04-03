<?php
/**
 * Template part for Badge
 */
?>

<?php
$block_classes = isset($args['classes']) ? $args['classes'] : '';
?>

<ul class="space-y-20 list-none mx-auto <?php echo $block_classes ?>">
	<?php if( get_field('email','option') ): ?>
	<li class="flex items-center">
		<span class="me-6 size-12 lg:size-16 2xl:size-20 icon-[mdi-light--email-open]"></span>
		<span>
			<h6 class="mb-2 font-serif h4">Email</h6>
			<a class="uppercase" href=""><?php echo get_field('email','option') ?></a>
		</span>
	</li>
	<?php endif; ?>

	<?php if( get_field('phone','option') ): ?>
	<li class="flex items-center">
		<span class="me-6 size-12 lg:size-16 2xl:size-20 icon-[material-symbols-light--phone-in-talk-outline]"></span>
		<span>
			<h6 class="mb-2 font-serif h4">Phone</h6>
			<a class="uppercase" href=""><?php echo get_field('phone','option') ?></a>
		</span>
	</li>
	<?php endif; ?>

	<?php if( get_field('location','option') ): ?>
	<li class="flex items-center">
		<span class="me-6 size-12 lg:size-16 2xl:size-20 icon-[material-symbols-light--share-location-rounded]"></span>
		<span>
			<h6 class="mb-2 font-serif h4">Location</h6>
			<?php echo get_field('location','option') ?>
		</span>
	</li>
	<?php endif; ?>
</ul>
