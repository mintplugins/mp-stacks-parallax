function mp_parallax($){
					
	$('.mp-brick-parallax').each(function(){
		
		//Window Height
		var	windowHeight = $(window).height();
		
		//Brick variables
		var mp_brick = $(this);
		var mp_brick_height = mp_brick.height();
		var mp_brick_bg = $(this).find('.mp-brick-bg'); 
		
		//Brick position variables
		var mp_brick_offset = $(mp_brick).offset();
		var mp_brick_offset_from_top = mp_brick_offset.top;
		var mp_brick_y = mp_brick_offset_from_top-$(window).scrollTop()		
		
		//Speed variables
		bg_speed = $(this).attr( 'mp_brick_parallax_bg_speed' );
		m1_speed = $(this).attr( 'mp_brick_parallax_c1_speed' );
		m2_speed = $(this).attr( 'mp_brick_parallax_c2_speed' );
				
		//If this brick is in view
		if ( mp_brick_y < windowHeight && mp_brick_y > ( 0 - mp_brick_height ) ){
			
			//If Background speed is less than .4
			if (bg_speed < .2){
				
				//Give the background no movement at all
				mp_brick_bg.addClass('mp-fixed-parallax');	
			}
			//Otherwise move it based on parent's speed
			else{
											
				var yPos_bg = -mp_brick_y+(mp_brick_y*bg_speed); //bg_speed = .09 to .1 ... .01 is stationary (no movement)
				
				// Move the background			
				mp_brick_bg.css( '-webkit-transform', 'translate3d(0px, ' + yPos_bg + 'px, 0px)' );
				mp_brick_bg.css( 'transform', 'translate3d(0px, ' + yPos_bg + 'px, 0px)' );
			}
			
			//If Content-Type 1's speed is less than .3
			if (m1_speed < .2){
				
				//Give the ct no movement at all
				var yPos_content_type_1 = -mp_brick_y;
			}
			//Otherwise move it based on parent's speed
			else{
											
				var yPos_content_type_1 = -mp_brick_y+(mp_brick_y*m1_speed);
				
			}
			
			//Move First Media Type
			mp_brick.find( '.mp-brick-first-content-type' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_content_type_1 + 'px, 0px)' );
			mp_brick.find( '.mp-brick-first-content-type' ).css( 'transform', 'translate3d(0px, ' + yPos_content_type_1 + 'px, 0px)' );
			
			//If Content-Type 2's speed is less than .4
			if (m1_speed < .2){
				
				//Give the ct no movement at all
				var yPos_content_type_1 = -mp_brick_y;
			}
			//Otherwise move it based on parent's speed
			else{
											
				var yPos_content_type_2 = -mp_brick_y+(mp_brick_y*m2_speed);
				
			}	
			
			//Move Second Media Type
			mp_brick.find( '.mp-brick-second-content-type' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_content_type_2 + 'px, 0px)' );
			mp_brick.find( '.mp-brick-second-content-type' ).css( 'transform', 'translate3d(0px, ' + yPos_content_type_2 + 'px, 0px)' );					
		}
	}); 
}

function mp_parallax_isMobile() {
  var index = navigator.appVersion.indexOf("Mobile");
  return (index > -1);
}

jQuery(document).ready(function($){
	
	$('.mp-brick-parallax').each(function(){
		//Show. This prevents it from "jumping" when the DOM is loaded
		$(this).css('visibility', 'visible');
	})
	
	//Only run Parallax on desktops. Mobile browsers aren't ready.
	if (!mp_parallax_isMobile()){
		
		//Run on page load	
		mp_parallax($);
		
		//Run on Scroll
		$(window).scroll(function() {
			mp_parallax($);
		});
				
		//Function that waits for resize end - so we don't re-process while re-sizing
		var mp_stacks_parallax_resize_timer;
		$(window).resize(function(){
			clearTimeout(mp_stacks_parallax_resize_timer);
			mp_stacks_parallax_resize_timer = setTimeout(mp_stacks_parallax_resize_end, 2);
		});
		
		//Custom Event which fires after resize has ended
		function mp_stacks_parallax_resize_end(){
			
			mp_parallax($);
			
		}
									
						
	}
	
}); 