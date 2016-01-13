// Scroll
$(document).ready(function(){
	//Scroll function
	$(".scroll").click(function(event){
		//prevent the default action for the click event
		event.preventDefault();

		//get the full url - like mysitecom/index.htm#home
		var full_url = this.href;

		//split the url by # and get the anchor target name - home in mysitecom/index.htm#home
		var parts = full_url.split("#");
		var trgt = parts[1];

		//get the top offset of the target anchor
		var target_offset = $("#"+trgt).offset();
		var target_top = target_offset.top;

		//goto that anchor by setting the body scroll top to anchor top
		$('html, body').animate({scrollTop:target_top}, 500);
	});
	

	//use this function on the picture that you want them to fade on the hover 
	// All you gotta do is add class : fade
	$('.fade').hover(function(){
		$(this).fadeTo(500, 0.5);
	},function(){
		$(this).fadeTo(500, 1);
	});

	
	//Dropdown Menu function
	$('.dropdown').find('li').hover(function(){
		$('ul:first',this).css('visibility', 'visible').slideDown();
	},function(){
		$('ul:first',this).slideUp();
	});

	//Project hover fuction
	$('.project').find('.wrapper').hover(function(){
		$(this).find('.title').fadeIn();
		},function(){
		$(this).find('.title').fadeOut();
	});
	
	
	
});