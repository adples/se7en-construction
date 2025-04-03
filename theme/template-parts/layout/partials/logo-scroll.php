<div
		x-data="{}"
		x-init="$nextTick(() => {
			let ul = $refs.logos;
			ul.insertAdjacentHTML('afterend', ul.outerHTML);
			ul.nextSibling.setAttribute('aria-hidden', 'true');
		})"
		class="inline-flex flex-nowrap py-12 w-full overflow-hidden"
		>
			<ul x-ref="logos" class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
			<?php for ($x = 0; $x <= 10; $x++): ?>
				<li>
					<span class="font-serif text-[4rem] text-foreground uppercase">Se7en</span>
				</li>
			<?php endfor; ?>
			</ul>
		</div>

		<div
		x-data="{}"
		x-init="$nextTick(() => {
			let ul = $refs.logos;
			ul.insertAdjacentHTML('afterend', ul.outerHTML);
			ul.nextSibling.setAttribute('aria-hidden', 'true');
		})"
		class="inline-flex flex-nowrap py-12 w-full overflow-hidden hidden-scroller"
		>
			<ul x-ref="logos" class="flex justify-center md:justify-start items-center [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
			<?php for ($x = 0; $x <= 10; $x++): ?>
				<li>
					<span class="font-serif text-[4rem] text-background uppercase">Se7en</span>
				</li>
			<?php endfor; ?>
			</ul>
		</div>
