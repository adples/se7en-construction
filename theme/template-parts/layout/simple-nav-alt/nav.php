<?php $navigation = \Log1x\Navi\Navi::make()->build('primary-nav'); ?>

<!-- Primary Navigation -->
<nav class="py-4 border-b border-gray-300 w-full bg-white" aria-label="navigation">

	<div x-data="{ open: false }" class="container flex flex-col px-6 mx-auto md:items-center md:justify-between md:flex-row">

		<div class="flex flex-row items-center justify-between">

		  <?php get_template_part( 'template-parts/layout/partials/logo'); ?>

		  <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
			<svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
			  <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
			  <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
			</svg>
		  </button>

		</div>

		<ul id="primary-menu" :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow mb-0 pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
			<?php get_template_part( 'template-parts/layout/simple-nav-alt/nav-menu', null, array('navigation' => $navigation)); ?>
		</ul>
	</div>
</nav>
<!-- /Primary Navigation -->

<!-- Reveal Navigation -->
<nav x-cloak x-data="{ show: false }"
	class="-top-50 navbar-reveal fixed z-10 py-4 border-b border-gray-300 w-full bg-white transition-all"
	:class="{ 'top-0 affix': show, '-top-50': !show}"
	@scroll.window="show = (window.pageYOffset < 150) ? false : true"
	aria-label="navigation">

	<div x-data="{ open: false }" class="container flex flex-col px-6 mx-auto md:items-center md:justify-between md:flex-row">

		<div class="flex flex-row items-center justify-between">

		  <?php get_template_part( 'template-parts/layout/partials/logo'); ?>

		  <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
			<svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
			  <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
			  <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
			</svg>
		  </button>

		</div>

		<ul id="primary-menu" :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow mb-0 pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
			<?php get_template_part( 'template-parts/layout/simple-nav-alt/nav-menu', null, array('navigation' => $navigation)); ?>
		</ul>
	</div>
</nav>
<!-- /Reveal Navigation -->
