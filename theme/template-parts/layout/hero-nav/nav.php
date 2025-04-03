<?php $navigation = \Log1x\Navi\Navi::make()->build('hero-nav'); ?>

<!-- Primary Navigation -->
<nav aria-label="navigation">
	<ul id="hero-menu" class="flex text-lg font-bold leading-5 text-white uppercase">
		<?php get_template_part( 'template-parts/layout/hero-nav/nav-menu', null, array('navigation' => $navigation)); ?>
	</ul>
</nav>
