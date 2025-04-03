document.addEventListener("DOMContentLoaded", function () {
	document
		.querySelectorAll(".interface-interface-skeleton__body")
		.forEach(function (el) {
			const dropdown = el.querySelector(".interface-interface-skeleton__content");

			el.addEventListener("mouseover", (_e) => {
				alert("enter");
			});

			el.addEventListener("mouseout", (_e) => {
				dropdown.classList.remove("my-blocks-popover__dropdown--show");
			});
		});
});
