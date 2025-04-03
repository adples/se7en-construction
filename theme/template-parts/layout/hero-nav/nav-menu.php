<?php
/**
 * Template part for displaying the nav menu
 */
?>

<?php $navigation = isset($args['navigation']) ? $args['navigation'] : ''; ?>

<?php foreach ( $navigation->all() as $item ) : ?>
	<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?> border-b-2 border-white pb-2 mb-2 last:border-0">
		<?php if ( $item->children ) : ?>

		<?php else: ?>

			<a href="<?php echo $item->url; ?>" class="">
				<?php echo $item->label; ?>
			</a>

		<?php endif ?>
	</li>
<?php endforeach; ?>
