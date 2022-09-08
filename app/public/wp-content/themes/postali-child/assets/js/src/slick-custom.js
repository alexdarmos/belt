/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	// $('#awards-slider').slick({
	// 	dots: false,
	// 	infinite: true,
	// 	fade: true,
	// 	autoplay: true,
  	// 	autoplaySpeed: 5000,
  	// 	speed: 1300,
	// 	slidesToShow: 3,
	// 	slidesToScroll: 1,
	// 	prevArrow: false,
    // 	nextArrow: false,
    // 	swipeToSlide: true,
	// 	cssEase: 'ease-in-out'
	// });

	$('#awards-slider').slick({
		slidesToShow: 3,
		centerMode: true,
		slidesToScroll: 1,
	});

	$('.results-container').slick({
		dots: false,
		infinite: true,
		autoplay: true,
  		autoplaySpeed: 5000,
  		speed: 1300,
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: false,
    	swipeToSlide: false,
		cssEase: 'ease-in-out',
		nextArrow: $('.results-next-btn'),
	});
	
});