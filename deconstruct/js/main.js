$(function(){
	carousel_slider(".home_slider", 1, 1);
	active_link();


	function active_link(){
		var page_link = $(location).attr('pathname');
		var page_split = page_link.split('/');
		var page_path = page_split[page_split.length -2];
		var parent_path = page_split[page_split.length -3];	

		$(".navigation > li > a, .clothing_type > ul > li > a").each(function(){
			var nav_link = $(this).attr('href');
			var nav_split = nav_link.split('/');
			var nav_path = nav_split[nav_split.length -2];
			var nav_parent = nav_split[nav_split.length -2];		

			if(nav_path == page_path){
				$(this).addClass('active_link')
			}
			if(nav_parent == parent_path){
				$(this).addClass('active_link');
			}
		})
	}


	function carousel_slider(sliderName, slideMin, autoSlide){
		$(sliderName).each(function(){
			if($(this).children("li").length > slideMin){
				$(this).wrap("<div style='position:relative' class='slider_contain'/>");
				$(this).wrap("<div class='slider'/>");
				var liwidth = 0;
				$(this).children("li").each(function(){
					$(this).css("float", "left")
					$(this).width(($(this).closest(".slider_contain").outerWidth() / slideMin) - ($(this).outerWidth(true) - $(this).width()))
					liwidth += $(this).outerWidth(true);
				})				
				$(this).width(liwidth);
		
				liwidth = $(this).children("li").outerWidth(true);

				$(this).closest(".slider_contain").append("<div class='slider_right'></div>");
				$(this).closest(".slider_contain").append("<div class='slider_left'></div>");

				var slideIndex = 0;
				var slideCap = $(this).children("li").length - (slideMin+1);

				$(this).css({'right' : liwidth + "px" });				
				$(this).children("li").css("right", 0).stop().css({
					"right" : "-=" + (liwidth) + "px"
				})
				$(this).css({"right": liwidth*2 + "px"}).prepend($(this).children("li:last-child"))

				var that = $(this);
				
				function slide_right(that){
					that.children("li").css("right", -liwidth + "px").stop().animate({
						"right" : "+=" + liwidth + "px"
					},1500);
					that.css({"right":liwidth + "px"}).append(that.children("li:first-child"))
				}

				if(autoSlide == 1){
					setInterval(function(){
						slide_right(that)
					}, 6000)
				}

				$(window).resize(function(){
					$(sliderName).children("li").each(function(){
						$(this).width(($(this).closest(".slider_contain").outerWidth() / slideMin) - ($(this).outerWidth(true) - $(this).width()))
						liwidth += $(this).outerWidth(true);
					})
					$(sliderName).width(liwidth);
					liwidth = $(sliderName).children("li").outerWidth(true);
					$(sliderName).css({"right": liwidth*2 + "px"});
					$(sliderName).children("li").css("right", 0).stop().css({
						"right" : "-=" + (liwidth) + "px"
					})
					slide_height();
				})

				$(this).closest(".slider_contain").children(".slider_right").click(function(){
					liwidth = $(sliderName).children("li").outerWidth(true);
					$(this).siblings(".slider").children(sliderName).children("li").css("right", -liwidth + "px").stop().animate({
						"right" : "+=" + liwidth + "px"
					});
					$(this).siblings(".slider").children(sliderName).css({"right":liwidth + "px"}).append($(this).siblings(".slider").children(sliderName).children("li:first-child"))					
				})

				$(this).closest(".slider_contain").children(".slider_left").click(function(){
					liwidth = $(sliderName).children("li").outerWidth(true);
					$(this).siblings(".slider").children(sliderName).children("li").css("right", 0).stop().animate({
						"right" : "-=" + (liwidth) + "px"
					})
					$(this).siblings(".slider").children(sliderName).css({"right": liwidth*2 + "px"}).prepend($(this).siblings(".slider").children(sliderName).children("li:last-child"))
				})
			}

		})
	}
})