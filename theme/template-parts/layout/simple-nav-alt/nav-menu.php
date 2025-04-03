<?php
/**
 * Template part for displaying the nav menu
 */
?>

<?php $navigation = isset($args['navigation']) ? $args['navigation'] : ''; ?>

<?php foreach ( $navigation->all() as $item ) : ?>
	<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?> text-black px-2">
		<?php if ( $item->children ) : ?>
			<div @click.away="open = false" class="relative" x-data="{ open: false }">
				<button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-gray-200 rounded-lg md:w-auto md:inline md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
				  <span><?php echo $item->label; ?></span>

				  <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

				</button>

				<div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
				  <ul class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
					  <?php foreach ( $item->children as $child ) : ?>
						  <li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
							  <a href="<?php echo $child->url; ?>" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"">
								  <?php echo $child->label; ?>
							  </a>
						  </li>
					  <?php endforeach; ?>
				  </ul>
				</div>

			</div>

		<?php else: ?>

			<a href="<?php echo $item->url; ?>" class="block px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-gray-200 rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
				<?php echo $item->label; ?>
			</a>

		<?php endif ?>
	</li>
<?php endforeach; ?>
