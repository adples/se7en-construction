<?php
/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Seven_Construction
 */

?>

<footer id="sayHi" class="relative bg-filter bg-cover bg-no-repeat bg-center md:bg-fixed bg-local filter-71482 pt-15 xl:pt-25 pb-15 xl:pb-25 overflow-hidden footer is-style-gradient-overlay-rev">

	<?php if(!is_page( 'contact' )): ?>
	<div class="z-2 relative mx-auto px-6 container">
		<div class="relative bg-white shadow-(--subtle-shadow) px-4 md:px-8 lg:px-12 py-8 md:py-12 lg:py-16 rounded-[1rem] md:rounded-[2rem] lg:rounded-[3rem] !rounded-tl-none">
			<?php get_template_part( 'template-parts/components/badge', null, array('text' => 'Get In Touch') );?>

			<?php if( get_field('footer_title','option') ): ?>
				<h6 class="mt-12 font-serif h2 reveal-type"><?php echo get_field('footer_title','option') ?></h6>
			<?php endif; ?>

			<?php if( get_field('footer_lead','option') ): ?>
				<p class="pt-8 2xl:text-lg italic uppercase"><?php echo get_field('footer_lead','option') ?></p>
			<?php endif; ?>

			<div class="flex lg:flex-row flex-col items-center gap-12 lg:gap-6 mt-12">
				<div class="lg:order-1 w-full lg:basis-7/12 xl:basis-1/2">
					<div class="relative bg-white p-4 md:p-8 lg:p-12 border-2 border-foreground rounded-[1rem] md:rounded-[2rem] lg:rounded-[3rem] !rounded-br-none">
						<?php echo do_shortcode( '[gravityform id="1" title="false"]' ); ?>
					</div>
				</div>

				<div class="sm:flex w-full basis-full lg:basis-5/12 xl:basis-1/2">
					<?php get_template_part( 'template-parts/components/contact-info' ); ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="pt-12">
		<div class="z-2 relative overflow-hidden spotlight">
		<div>
			<ul class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none">
				<?php for ($x = 0; $x <= 10; $x++): ?>
					<li>
						<span class="font-serif text-[6rem] text-white/33 lg:text-[8rem] uppercase noselect">Se7en</span>
					</li>
				<?php endfor; ?>
			</ul>
		</div>

		<div data-se7en class="top-0 left-0 absolute w-full spotlight-mask">
			<ul class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none">
				<?php for ($x = 0; $x <= 10; $x++): ?>
					<li>
						<span class="font-serif text-[6rem] text-white lg:text-[8rem] uppercase noselect">Se7en</span>
					</li>
				<?php endfor; ?>
			</ul>
		</div>

		<div id="circle" class="hidden"></div>

		</div>
	</div>

	<div class="z-2 relative mx-auto px-6 container">
		<div class="flex flex-row justify-center mt-6">
			<div class="lg:flex w-full basis-full lg:basis-6/12">
				<div class="py-6 border-y border-y-white/25 w-full text-center">
					<ul class="md:flex md:justify-center text-white/75 text-sm">
						<li class="md:px-3 md:border-e md:border-white/25 last:border-0">&copy; <?php echo date("Y").' '.get_bloginfo().' All Rights Reserved.'; ?></li>
						<li class="md:px-3 md:border-e md:border-white/25 last:border-0"><a href="<?php echo esc_url(get_permalink(3)) ?>">Privacy Policy</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

</footer><!-- #colophon -->
