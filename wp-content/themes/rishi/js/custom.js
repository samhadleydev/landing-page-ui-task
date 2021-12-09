import { onDocumentLoaded } from "../rt-customizer-builder/src/js/helpers";
import InfiniteScroll from "infinite-scroll";
import Masonry from 'masonry-layout';

onDocumentLoaded(() => {
	var mrtl;
	if (rishi_custom.rtl == '1') {
		mrtl = false;
	} else {
		mrtl = true;
	}

	var headerSearchbtn = document.querySelector('.header-search-btn'),
		elem = document.querySelector('.search-toggle-form'),
		headerCloseBtn = document.querySelector('.btn-form-close'),
		searchField = document.querySelector('.search-field'),
		searchSubmit = document.querySelector('.search-submit'),
		fadeInInterval,
		fadeOutInterval;

	//fadeInFunction
	function fadeIn() {
		searchField.focus();
		clearInterval(fadeInInterval);
		clearInterval(fadeOutInterval);

		elem.fadeIn = function (timing) {
			var newValue = 0;

			elem.style.display = 'block';
			elem.style.opacity = 0;

			fadeInInterval = setInterval(function () {

				if (newValue < 1) {
					newValue += 0.01;
				} else if (newValue === 1) {
					clearInterval(fadeInInterval);
				}

				elem.style.opacity = newValue;

			}, timing);

		}

		elem.fadeIn(5);
	}

	//functionfadeOut
	function fadeOut() {
		clearInterval(fadeInInterval);
		clearInterval(fadeOutInterval);

		elem.fadeOut = function (timing) {
			var newValue = 1;
			elem.style.opacity = 1;

			fadeOutInterval = setInterval(function () {

				if (newValue > 0) {
					newValue -= 0.01;
				} else if (newValue < 0) {
					elem.style.opacity = 0;
					elem.style.display = 'none';
					clearInterval(fadeOutInterval);
				}

				elem.style.opacity = newValue;

			}, timing);

		}

		elem.fadeOut(5);
	}

	if (headerSearchbtn !== null) {
		headerSearchbtn.addEventListener('click', function () {
			fadeIn();
			searchField.focus();
		});
		headerCloseBtn.addEventListener('click', function () {
			fadeOut();
			searchField.blur();
		})
	}


	document.addEventListener('keyup', function (e) {
		if (e.key == "Escape") {
			fadeOut();
		}
	});

	if (searchField !== null) {
		searchField.addEventListener('click', function (e) {
			e.stopPropagation();
		})
	}

	if (searchSubmit !== null) {
		searchSubmit.addEventListener('click', function (e) {
			e.stopPropagation();
		})
	}

	if (elem !== null) {
		elem.addEventListener('click', function (event) {
			fadeOut();
		})
	}



	// back to top
	window.addEventListener('scroll', () => {
		var gototop = document.querySelector(".to_top");
		if (gototop) {
			if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
				gototop.classList.add("active");
			} else {
				gototop.classList.remove("active");
			}
		}
	});
	var gototop = document.querySelector(".to_top");
	gototop && document.querySelector(".to_top").addEventListener("click", () => {
		window.scroll({ top: 0, behavior: 'smooth' });
	});


	//Masonry Layout
	if (document.querySelector('.rishi-container-wrap')?.classList.contains('masonry_grid')) {
		InfiniteScroll.imagesLoaded = (fragment, fn) => fn();
		InfiniteScroll.imagesLoaded('.rishi-container-wrap', function () {
			var masonry_element = document.querySelector('.rishi-container-wrap');
			var msnry = new Masonry(masonry_element, {
				itemSelector: '.rishi-post'
			});
		});
	}

	//alignfull js
	window.addEventListener('resize', function () {
		OnResizeFunction();
	})

	window.addEventListener('load', function () {
		OnResizeFunction();
	})
	//onResizeFunction 
	function OnResizeFunction() {
		var WindowWidth = window.innerWidth;
		var gbWindowWidth = (WindowWidth - 20);
		var ContainerWidth = document.querySelector('.rishi-has-blocks .site-content > .rishi-container').clientWidth;
		var gbContainerWidth = (ContainerWidth - 20);

		if (document.querySelector('.rishi-has-blocks .site-main .entry-content') !== null) {
			var gbContentWidth = document.querySelector('.rishi-has-blocks .site-main .entry-content').clientWidth;
		}

		var gbMarginFull = (parseInt(gbContentWidth) - parseInt(gbWindowWidth)) / 2;
		var gbMarginFull2 = (parseInt(gbContentWidth) - parseInt(gbContainerWidth)) / 2;
		var gbMarginCenter = (parseInt(gbContentWidth) - parseInt(gbWindowWidth)) / 2;
		var AlignFull = document.querySelector(".rishi-has-blocks.full-width .site-main .entry-content .alignfull");
		var AlignWide = document.querySelector(".rishi-has-blocks.full-width .site-main .entry-content .alignwide");
		//checkforAlignFull    
		if (AlignFull !== null) {
			const alignFullStyle = {
				maxWidth: gbWindowWidth + "px",
				width: gbWindowWidth + "px",
				marginLeft: (gbMarginFull - 1.5) + "px"
			}
			Object.assign(AlignFull.style, alignFullStyle);
		}

		//check for WideAlignment
		if (AlignWide !== null) {

			//creating object
			const alignWideStyle = {
				maxWidth: gbContainerWidth + "px",
				width: gbContainerWidth + "px",
				marginLeft: gbMarginFull2 + "px"
			}
			//assigningobject
			Object.assign(AlignWide.style, alignWideStyle);
		}
	}
});
