<?php
/**
 * Template part for displaying the nav menu
 */
?>

<?php $navigation = isset($args['navigation']) ? $args['navigation'] : ''; ?>

<?php foreach ( $navigation->all() as $item ) : ?>
	<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?> text-xl px-2">
		<?php if ( $item->children ) : ?>
			<div @click.away="open = false" class="relative" x-data="{ open: false }">
				<button @click="open = !open" class="md:inline flex flex-row items-center bg-gray-200 hover:bg-gray-200 focus:bg-gray-200 mt-2 md:mt-0 px-4 py-2 rounded-lg focus:shadow-outline focus:outline-none w-full md:w-auto font-semibold hover:text-gray-900 focus:text-gray-900 text-sm text-left">
				  <span><?php echo $item->label; ?></span>

				  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline mt-1 md:-mt-1 ml-1 w-4 h-4 transition-transform duration-200 transform"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

				</button>

				<div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="right-0 absolute shadow-lg mt-2 rounded-md w-full md:w-48 origin-top-right">
				  <ul class="bg-white dark-mode:bg-gray-800 shadow px-2 py-2 rounded-md">
					  <?php foreach ( $item->children as $child ) : ?>
						  <li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
							  <a href="<?php echo $child->url; ?>" class="block bg-transparent hover:bg-gray-200 focus:bg-gray-200 mt-2 px-4 py-2 rounded-lg focus:shadow-outline focus:outline-none font-semibold hover:text-gray-900 focus:text-gray-900 text-sm">
								  <?php echo $child->label; ?>
							  </a>
						  </li>
					  <?php endforeach; ?>
				  </ul>
				</div>

			</div>

		<?php else: ?>
			<?php echo list_icon('icon-[material-symbols-light--asterisk-rounded]'); ?>
			<a href="<?php echo $item->url; ?>" class="focus:shadow-outline focus:outline-none font-serif text-foreground hover:text-gray-900 focus:text-gray-900">
				<?php echo $item->label; ?>
			</a>

		<?php endif ?>
	</li>
<?php endforeach; ?>
