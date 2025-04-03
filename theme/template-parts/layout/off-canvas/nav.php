<?php

 $navigation = \Log1x\Navi\Navi::make()->build('primary-nav');
 $home = is_front_page() ? true : false;

?>


<?php ?>



<!-- Offcanvas -->
<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->
<div
  x-data="{
    open: false,
    mobileFullWidth: false,

    // 'start', 'end', 'top', 'bottom'
    position: 'end',

    // 'xs', 'sm', 'md', 'lg', 'xl'
    size: 'md',

    // Set transition classes based on position
    transitionClasses: {
       'x-transition:enter-start'() {
          if (this.position === 'start') {
            return '-translate-x-full rtl:translate-x-full';
          } else if (this.position === 'end') {
            return 'translate-x-full rtl:-translate-x-full';
          } else if (this.position === 'top') {
            return '-translate-y-full';
          } else if (this.position === 'bottom') {
            return 'translate-y-full';
          }
        },
       'x-transition:leave-end'() {
          if (this.position === 'start') {
            return '-translate-x-full rtl:translate-x-full';
          } else if (this.position === 'end') {
            return 'translate-x-full rtl:-translate-x-full';
          } else if (this.position === 'top') {
            return '-translate-y-full';
          } else if (this.position === 'bottom') {
            return 'translate-y-full';
          }
        },
    },
  }"
  x-on:keydown.esc.prevent="open = false"
	x-cloak
	class="<?php if($home) echo 'md:hidden';?>"
>
	<!-- Primary Navigation -->
	<nav class="py-4 w-full absolute z-10 <?php if($home) echo 'md:hidden';?>" aria-label="navigation">
		<div class="container px-6 mx-auto">

			<div class="flex flex-row justify-between w-full items-start">
				<?php if ($home): ?>
					<?php get_template_part('template-parts/layout/partials/logo', null, array('color_mode' => 'light')); ?>
				<?php else: ?>
					<?php get_template_part( 'template-parts/layout/partials/logo', null, array('color_mode' => 'light')); ?>
				<?php endif ?>

			<button class="rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
				<span class="icon-[mdi-light--menu] text-white size-12"></span>
			</button>

			</div>
		</div>
	</nav>
	<!-- /Primary Navigation -->


  <!-- Offcanvas Backdrop -->
  <div
    x-cloak
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-bind:aria-hidden="!open"
    tabindex="-1"
    role="dialog"
    aria-labelledby="pm-offcanvas-title"
    class="z-90 fixed inset-0 overflow-hidden bg-zinc-700/75 backdrop-blur-xs dark:bg-zinc-950/50 <?php if($home) echo 'md:hidden';?>"
  >
    <!-- Offcanvas Sidebar -->
    <div
      x-cloak
      x-show="open"
      x-on:click.away="open = false"
      x-bind="transitionClasses"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-end="translate-x-0 translate-y-0"
      x-transition:leave="transition ease-in duration-200"
      x-transition:leave-start="translate-x-0 translate-y-0"
      role="document"
      class="offcanvas-menu absolute flex w-full flex-col bg-white shadow-lg will-change-transform dark:text-zinc-100 <?php if($home) echo 'md:hidden';?>"
      x-bind:class="{
        'h-dvh top-0 end-0': position === 'end',
        'h-dvh top-0 start-0': position === 'start',
        'bottom-0 start-0 end-0': position === 'top',
        'bottom-0 start-0 end-0': position === 'bottom',
        'h-64': position === 'top' || position === 'bottom',
        'sm:max-w-xs': size === 'xs' && !(position === 'top' || position === 'bottom'),
        'sm:max-w-sm': size === 'sm' && !(position === 'top' || position === 'bottom'),
        'sm:max-w-md': size === 'md' && !(position === 'top' || position === 'bottom'),
        'sm:max-w-lg': size === 'lg' && !(position === 'top' || position === 'bottom'),
        'sm:max-w-xl': size === 'xl' && !(position === 'top' || position === 'bottom'),
        'max-w-72': !mobileFullWidth && !(position === 'top' || position === 'bottom'),
		'menu-open': open,
      }"

    >
      <!-- Header -->
      <div
        class="flex min-h-16 flex-none justify-end border-b border-tertiary px-5 md:px-7"
      >


        <!-- Close Button -->
        <button
          x-on:click="open = false"
          type="button"
          class="inline-flex items-center justify-center gap-2 text-primary"
        >
          <svg
            class="hi-solid hi-x -mx-1 inline-block size-4"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
              clip-rule="evenodd"
            ></path>
          </svg>
        </button>
        <!-- END Close Button -->
      </div>
      <!-- END Header -->

      <!-- Content -->
      <div class="flex grow flex-col overflow-y-auto p-5 md:p-7">
        <!-- Menu Content -->
				<ul id="primary-menu" class="icon-list mb-0 pb-4 space-y-4">
					<?php get_template_part( 'template-parts/layout/off-canvas/nav-menu', null, array('navigation' => $navigation)); ?>
				</ul>
		<!-- END Menu Conent -->
      </div>
      <!-- END Content -->
    </div>
    <!-- END Offcanvas Sidebar -->
  </div>
  <!-- END Offcanvas Backdrop -->
</div>
<!-- END Offcanvas -->
