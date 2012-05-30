$(document).ready(function() {
 
	// initialize scrollable
	var root = $(".slideshow").scrollable({circular: true, speed: 800, initialIndex: 0, size: 1, onBeforeSeek: function() {
		console.info("jou");
	}}).autoscroll({autostart: true, interval: 5500, autopause: false, step: 1});
 	
 	window.api = root.data("scrollable");
});