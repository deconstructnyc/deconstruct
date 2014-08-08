$(function(){
	gallery_image_switch();
	cart_item_show();
	flip_section(".product_list > li", "Y");
	active_single_product_img();
	active_link();
	carousel_slider(".home_slider", 1, 1);
	required_fields();
	same_as_shipping();
	shipping();


	function shipping(){
			var shipping = parseInt($(".shipping_select > select").val());
			var subtotal = parseInt($(".sub_total").text());
			
			$(".shipping_calc").html(shipping);
			$(".full_total span").text(subtotal + shipping);

		$(".shipping_select > select").change(function(){
			shipping = parseInt($(this).val());
			$(".shipping_calc").html(shipping);
			$(".full_total span").text(subtotal + shipping);
		})
	}

	function required_fields(){
		$("input").change(function(){
			if($(this).attr('required') && $(this).val() == ""){
				$(this).css("border", "1px solid #f00");
				e.preventDefault();
			}else{
				$(this).css("border", "none");
			}
		})
		$(".guest_checkout_form").submit(function(e){
			$("input").each(function(){
				if($(this).attr('required') && $(this).val() == ""){
					$(this).css("border", "1px solid #f00");
					e.preventDefault();
				}else{
					$(this).css("border", "none");
				}
			})
		})
	}

	function same_as_shipping(){
		$("input[name='shipping_address']").change(function(){
			if($(this).is(":checked")){
				$("input[name='billing_address']").val($("input[name='address']").val());
				$("input[name='billing_address2']").val($("input[name='address2']").val());
				$("input[name='billing_city']").val($("input[name='city']").val());
				$("input[name='billing_state']").val($("input[name='state']").val());
				$("input[name='billing_zipcode']").val($("input[name='zipcode']").val());
			}else{
				$("input[name='billing_address']").val("");
				$("input[name='billing_address2']").val("");
				$("input[name='billing_city']").val("");
				$("input[name='billing_state']").val("");
				$("input[name='billing_zipcode']").val("");
			}
		})
	}
	
	function cart_item_show(){
		$(".shopping_cart_contain").hover(function(){
			$(this).toggleClass('active_cart');
		})
	}

	function flip_section(flip_section, flip_direction){
		$(flip_section).each(function(){
			var front_flip = $(flip_section + " .front_flip");
			var back_flip = $(flip_section + " .back_flip");
			var flip_container = $(flip_section + " .flip_container");
			var that = $(this);

			front_flip.wrapInner("<div class='front_flip_hold'/>");
			back_flip.wrapInner("<div class='back_flip_hold'/>");

			back_flip.css({"transform" : "rotate" + flip_direction + "(180deg)"})

			var front_flip_height = $(flip_section + " .front_flip_hold").outerHeight(true);
			// flip_container.height("330px");
			// flip_container.height(that.find("img").height()+5);
			$(window).resize(function(){
				flip_container.height(that.find("img").height());
			})
		})
		

		$(flip_section).each(function(){
			$(this).hover(function(){
				$(this).find(".flip_card").css({"transform" : "rotate" + flip_direction + "(180deg)"})				
				$(this).find(".back_flip").css({"-ms-backface-visibility" : "visible"})
			},function(){
				$(this).find(".flip_card").css({"transform" : "rotate" + flip_direction + "(0deg)"})			
				$(this).find(".back_flip").css({"-ms-backface-visibility" : "hidden"})
			})
		})
	}


	function active_single_product_img(){
		var value = $("#color option:selected").text();
		$(".single_product_img_list > li[name='" + value + "']").addClass("active_img");

		$("#color").change(function(){
			var value = $("#color option:selected").text();
			single_image_change();
			single_size_change();

			function single_image_change(){
				$(".single_product_img_list > li").removeClass("active_img");
				$(".single_product_img_list > li[name='" + value + "']").addClass("active_img");
			}

			function single_size_change(){
				$('#size').load((document.URL).substr(-1, 0) + '?c=' + value + ' #size option');
			}
		})
	}

	function gallery_image_switch(){
		$(".product_gallery > li").click(function(){
			$(this).parent().siblings(".single_product_image_contain").children(".single_product_image").html("");

			$(this).children("img").clone().appendTo($(this).parent().siblings(".single_product_image_contain").children(".single_product_image"));
		})
	}


	function active_link(){
		var page_link = $(location).attr('pathname');
		var page_split = page_link.split('/');
		var page_path = page_split[page_split.length -2];
		var parent_path = page_split[page_split.length -3];	

		$(".navigation > li > a, .submenu > li > a, .designers_list > li > a").each(function(){
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