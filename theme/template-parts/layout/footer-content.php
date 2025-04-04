<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seven_Construction
 */

?>

<footer id="sayHi" class="footer pt-25 pb-25 bg-filter relative overflow-hidden filter-71482 is-style-gradient-overlay-rev bg-cover bg-center bg-no-repeat bg-resize">

	<?php if(!is_page( 'contact' )): ?>
	<div class="relative z-1 mx-auto px-6 container">
		<div class="px-4 py-8 md:px-8 md:py-12 lg:px-12 lg:py-16 relative bg-white rounded-[1rem] md:rounded-[2rem] lg:rounded-[3rem] !rounded-tl-none shadow-(--subtle-shadow)">
			<?php get_template_part( 'template-parts/components/badge', null, array('text' => 'Get In Touch') );?>

			<?php if( get_field('footer_title','option') ): ?>
				<h6 class="mt-12 font-serif font-semibold italic h2"><?php echo get_field('footer_title','option') ?></h6>
			<?php endif; ?>

			<?php if( get_field('footer_lead','option') ): ?>
				<p class="pt-8 2xl:text-lg uppercase italic"><?php echo get_field('footer_lead','option') ?></p>
			<?php endif; ?>

			<div class="flex lg:flex-row flex-col items-center gap-12 lg:gap-6 mt-12">
				<div class="w-full lg:order-1 lg:basis-7/12 xl:basis-1/2">
					<div class="p-4 md:p-8 lg:p-12 relative bg-white rounded-[1rem] md:rounded-[2rem] lg:rounded-[3rem] border-2 border-foreground !rounded-br-none">
						<?php echo do_shortcode( '[gravityform id="1" title="false"]' ); ?>
					</div>
				</div>

				<div class="w-full basis-full sm:flex lg:basis-5/12 xl:basis-1/2">
					<?php get_template_part( 'template-parts/components/contact-info' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="pt-12">
		<div class="relative overflow-hidden z-1 spotlight">
		<div>
			<ul class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none">
				<?php for ($x = 0; $x <= 10; $x++): ?>
					<li>
						<span class="font-serif text-[8rem] italic uppercase text-white/33 noselect">Se7en</span>
					</li>
				<?php endfor; ?>
			</ul>
		</div>

		<div data-se7en class="absolute top-0 left-0 w-full spotlight-mask">
			<ul class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none">
				<?php for ($x = 0; $x <= 10; $x++): ?>
					<li>
						<span class="font-serif text-[8rem] italic uppercase text-white noselect">Se7en</span>
					</li>
				<?php endfor; ?>
			</ul>
		</div>

		<div id="circle" class="hidden"></div>

		</div>
	</div>

	<div class="mx-auto px-6 container relative z-1">
		<div class="flex flex-row justify-center mt-6">
			<div class="w-full basis-full lg:flex lg:basis-6/12">
				<div class="w-full py-6 border-y border-y-white/25 text-center">
					<ul class="md:flex md:justify-center  text-white/75 text-sm">
						<li class="md:px-3 md:border-e md:border-white/25 last:border-0">&copy; <?php echo date("Y").' '.get_bloginfo().' All Rights Reserved.'; ?></li>
						<li class="md:px-3 md:border-e md:border-white/25 last:border-0"><a href="#">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</footer><!-- #colophon -->
