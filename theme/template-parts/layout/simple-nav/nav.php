<?php $navigation = \Log1x\Navi\Navi::make()->build('primary-nav'); ?>

<nav x-data="{ mobileMenuIsOpen: false }" x-on:click.away="mobileMenuIsOpen = false" class="py-4 border-b border-gray-300" aria-label="navigation">

	<div class="container flex items-center justify-between mx-auto px-6">

		<!-- Brand Logo -->
		<?php if ( get_theme_mod( 'site_logo' ) ): ?>
			<a href="<?php echo esc_url( home_url( '/' )); ?>" class="text-2xl font-bold text-black">
				<img class="w-[160px] lg:w-[240px]" src="<?php echo esc_attr(get_theme_mod( 'site_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			</a>
		<?php else : ?>
			<a class="text-2xl font-bold text-black" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
		<?php endif; ?>

		<!-- Desktop Menu -->
		<ul id="primary-menu" class="hidden items-center gap-4 md:flex">
			<?php foreach ( $navigation->all() as $item ) : ?>
				<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?> text-black">
					<a href="<?php echo $item->url; ?>">
						<?php echo $item->label; ?>
					</a>

					<?php if ( $item->children ) : ?>
						<ul>
							<?php foreach ( $item->children as $child ) : ?>
								<li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
									<a href="<?php echo $child->url; ?>">
										<?php echo $child->label; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>

		<!-- Mobile Menu Button -->
		<button x-on:click="mobileMenuIsOpen = !mobileMenuIsOpen" x-bind:aria-expanded="mobileMenuIsOpen" x-bind:class="mobileMenuIsOpen ? 'fixed top-6 right-6 z-20' : null" type="button" class="flex text-neutral-600 dark:text-neutral-300 md:hidden" aria-label="mobile menu" aria-controls="mobileMenu">
			<svg x-cloak x-show="!mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
			</svg>
			<svg x-cloak x-show="mobileMenuIsOpen" xmlns="http://www.w3.org/2000/svg" fill="none" aria-hidden="true" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
				<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
			</svg>
		</button>
		<!-- Mobile Menu -->

		<ul x-cloak x-show="mobileMenuIsOpen" x-transition:enter="transition motion-reduce:transition-none ease-out duration-300" x-transition:enter-start="-translate-y-full" x-transition:enter-end="translate-y-0" x-transition:leave="transition motion-reduce:transition-none ease-out duration-300" x-transition:leave-start="translate-y-0" x-transition:leave-end="-translate-y-full" id="mobileMenu" class="fixed max-h-svh overflow-y-auto inset-x-0 top-0 z-10 flex flex-col divide-y divide-neutral-300 rounded-b-sm border-b border-neutral-300 bg-neutral-100 px-6 pb-6 pt-20 md:hidden">
			<?php foreach ( $navigation->all() as $item ) : ?>
				<li class="<?php echo $item->classes; ?> <?php echo $item->active ? 'current-item' : ''; ?> py-4">
					<a href="<?php echo $item->url; ?>" class="w-full text-lg font-bold text-black">
						<?php echo $item->label; ?>
					</a>

					<?php if ( $item->children ) : ?>
						<ul>
							<?php foreach ( $item->children as $child ) : ?>
								<li class="<?php echo $child->classes; ?> <?php echo $child->active ? 'current-item' : ''; ?>">
									<a href="<?php echo $child->url; ?>">
										<?php echo $child->label; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>

	</div>
</nav>
