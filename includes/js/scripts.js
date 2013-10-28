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
		m1_speed = $(this).attr( 'mp_brick_parallax_m1_speed' );
		m2_speed = $(this).attr( 'mp_brick_parallax_m2_speed' );
				
		//If this brick is in view
		if ( mp_brick_y < windowHeight && mp_brick_y > ( 0 - mp_brick_height ) ){
											
			var yPos_bg = -mp_brick_y+(mp_brick_y*bg_speed); //bg_speed = .1 to 1 ... 1 is stationary (no movement)
			
			var yPos_media_type_1 = -mp_brick_y+(mp_brick_y*m1_speed);
			
			var yPos_media_type_2 = -mp_brick_y+(mp_brick_y*m2_speed);
						
			// Move the background			
			mp_brick_bg.css( '-webkit-transform', 'translate3d(0px, ' + yPos_bg + 'px, 0px)' );
			
			//First Media Type
			mp_brick.find( '.mp-brick-left' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_1 + 'px, 0px)' );
			mp_brick.find( '.mp-brick-centered-first').css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_1 + 'px, 0px)' );
			
			//Second Media Type
			mp_brick.find( '.mp-brick-right' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_2 + 'px, 0px)' );
			mp_brick.find( '.mp-brick-centered-second').css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_2 + 'px, 0px)' );
						
		}
	}); 
}

function mp_parallax_isMobile() {
  var index = navigator.appVersion.indexOf("Mobile");
  return (index > -1);
}

jQuery(document).ready(function($){
	
	//Only run Parallax on desktops. Mobile browsers aren't ready.
	if (!mp_parallax_isMobile()){
		
		//Run on page load	
		mp_parallax($);
		
		//Run on Scroll
		$(window).scroll(function() {
			mp_parallax($);
		});
	}
	
}); 