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

const hero = document.querySelector('[data-se7en]');

window.addEventListener('mousemove', (e) => {
	const { clientX, clientY } = e;
	const x = Math.round((clientX / window.innerWidth) * 100);
	const y = Math.round((clientY / window.innerHeight) * 100);

	hero.style.setProperty('--x', `${x}%`);
	hero.style.setProperty('--y', `${y}%`);
});

const testimonials = document.querySelector('.glide');
if (testimonials) {
	/* eslint-disable */
	new Glide('.glide', {
		autoplay: 3000,
	}).mount();
	/* eslint-enable */
}

function fadeOut(element, duration) {
	element.style.transition = `opacity ${duration}ms`;
	element.style.opacity = 0;

	setTimeout(() => {
		element.style.display = 'none';
	}, duration);
}

const video = document.querySelector('.video-wrapper');
const loader = document.querySelector('.loader-overlay');
if (video) {
	var iframe = document.getElementById('vimeo');
	/* eslint-disable */
	var player = new Vimeo.Player(iframe);
	/* eslint-enable */
	player.on('play', function () {
		setTimeout(function () {
			fadeOut(loader, 1000);
		}, 100);
	});
}

const mediaQuery = window.matchMedia('(min-width: 768px)');
let swapTarget = document.getElementsByClassName('bg-resize');
mediaQuery.addEventListener('change', handleMediaQuery);

function handleMediaQuery(e) {
	if (swapTarget) {
		if (e.matches) {
			for (let element of swapTarget) {
				let x = element.getAttribute('data-img-full');
				let y = 'url(' + x + ')';
				element.style.backgroundImage = y;
			}
		} else {
			for (let element of swapTarget) {
				let x = element.getAttribute('data-img-md');
				let y = 'url(' + x + ')';
				element.style.backgroundImage = y;
			}
		}
	}
}

handleMediaQuery(mediaQuery);

// function myFunction(screen) {
// 	let swapTarget = document.getElementsByClassName('bg-resize');
// 	if (screen.matches && swapTarget) {
// 		for (let element of swapTarget) {
// 			//console.log(element.getAttribute('data-img-md'));
// 			let x = element.getAttribute('data-img-full');
// 			let y = 'url(' + x + ')';
// 			element.css('background-image', y);
// 			alert(x);
// 		}
// 	} else {
// 		for (let element of swapTarget) {
// 			let x = element.getAttribute('data-img-md');
// 			let y = 'url(' + x + ')';
// 			element.css('background-image', y);
// 			alert(x);
// 		}
// 	}
// }
