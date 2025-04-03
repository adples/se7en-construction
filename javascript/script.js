/**
 * Front-end JavaScript
 *
 * The JavaScript code you place here will be processed by esbuild. The output
 * file will be created at `../theme/js/script.min.js` and enqueued in
 * `../theme/functions.php`.
 *
 * For esbuild documentation, please see:
 * https://esbuild.github.io/
 */

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/* eslint-disable */
new Glide('.glide', {
	autoplay: 3000,
}).mount();
/* eslint-enable */

const hero = document.querySelector('[data-se7en]');

window.addEventListener('mousemove', (e) => {
	const { clientX, clientY } = e;
	const x = Math.round((clientX / window.innerWidth) * 100);
	const y = Math.round((clientY / window.innerHeight) * 100);

	hero.style.setProperty('--x', `${x}%`);
	hero.style.setProperty('--y', `${y}%`);
});
