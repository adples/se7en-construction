<?php $navigation = \Log1x\Navi\Navi::make()->build('hero-nav'); ?>

<!-- Primary Navigation -->
<nav aria-label="navigation">
	<ul id="hero-menu" class="flex font-semi-bold text-white 2xl:text-lg uppercase leading-5">
		<?php get_template_part( 'template-parts/layout/hero-nav/nav-menu', null, array('navigation' => $navigation)); ?>
	</ul>
</nav>
