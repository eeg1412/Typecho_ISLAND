var CommonLib = function(){
	window.BREAK_POINT = 750;
}
CommonLib.prototype = {

	init:function(){
		var wid = jQuery(window).innerWidth();
		var scope = this;

		if(window.BREAK_POINT < wid) {
			this.background = new Background();
		}

		jQuery('#menu_btn a').on('click.common',function(event){
			//jQuery('header#masthead').slideToggle(500);
			jQuery('header#masthead, header#header_sub').toggleClass('open');
			jQuery('#menu_btn').toggleClass('close');
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});

		//sns
		jQuery('header .sns ul li').on('mouseenter',function(event){
        	jQuery(event.currentTarget).find('.icon').addClass('hvr');
        }).on('mouseleave',function(event){
        	jQuery(event.currentTarget).find('.icon').removeClass('hvr');
        });

		//to top
		jQuery('#to_top').on('click.top',function(){
			jQuery('body, html').stop(true,false).animate({'scrollTop':'0px'},750,'easeInOutExpo');
			(event.preventDefault) ? event.preventDefault():event.returnValue=false;
			return false;
		});
		jQuery('#to_top').on('mouseenter',function(event){
			jQuery('#to_top .icon').addClass('hvr');
		}).on('mouseleave',function(event){
			jQuery('#to_top .icon').removeClass('hvr');
		});

		var scope = this;
		jQuery(window).on('scroll.top',function(){
			scope.scroll();
        });
	},
	onStart:function(){


			if(jQuery('.page-header .title_area').length > 0){
				setTimeout(function(){
					jQuery('.page-header .title_area h3.poppin_l').addClass('anim');
				},100);
				setTimeout(function(){
					jQuery('.page-header .title_area .jp').addClass('anim');
				},600);

				setTimeout(function(){
					jQuery('.post_body').addClass('anim');
				},850);

			}else if(jQuery('.post_body').length > 0){
				jQuery('.post_body').addClass('anim');
			}

	},
	load:function(){
		var scope = this;
		if(jQuery('#loader').length > 0){
			jQuery('#loader').stop(true,false)
				.delay(250)
				.animate({opacity: 0},1000,'linear',function(){
					if(window.Index){
						jQuery('body, html').scrollTop(250);
						window.Index.load();
					}

					jQuery('#page').stop(true, false)
						.delay(50)
						.animate({opacity: 1}, 500, 'linear', function(){
							jQuery('#loader').remove();
							if(window.Index){
								jQuery('body, html').delay(250).
									animate({'scrollTop':0},750,'easeOutExpo');
								
							}
							scope.onStart();
						});
				});
			}else{
				this.onStart();
			}
	},
	scroll:function(){
		var scTop = jQuery(window).scrollTop();
        if(scTop > 250 && !jQuery('#to_top').hasClass('show')){
        	jQuery('#to_top').addClass('show');
        }
        if(scTop < 250 && jQuery('#to_top').hasClass('show')){
        	jQuery('#to_top').removeClass('show');
        }
	}
};
var _common;
document.addEventListener("DOMContentLoaded", function(event) {
	_common = new CommonLib();
	_common.init();
});
window.addEventListener('load',function(){
	_common.load();
});