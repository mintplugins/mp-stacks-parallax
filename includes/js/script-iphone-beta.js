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
			
			//Left Media Type
			mp_brick.find( '.mp-brick-left' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_1 + 'px, 0px)' );
			
			//Right Media Type
			mp_brick.find( '.mp-brick-right' ).css( '-webkit-transform', 'translate3d(0px, ' + yPos_media_type_2 + 'px, 0px)' );
						
		}
	}); 
}

function mp_parallax_isMobile() {
  var index = navigator.appVersion.indexOf("Mobile");
  return (index > -1);
}

jQuery(document).ready(function($){
	
	if (!mp_parallax_isMobile()){
		//Set the background image div to be double the size of the brick
		$('.mp-brick-parallax').each(function(){
			//Brick variables
			var mp_brick = $(this);
			var mp_brick_height = mp_brick.height();
			var mp_brick_bg = $(this).find('.mp-brick-bg'); 
		});
		
		mp_parallax($);
		
		$(window).scroll(function() {
			mp_parallax($);
		});
	}
	else{
		
		//Wrap body is holding div which can have values which are not processed on 'body' or 'html'
		$( 'body' ).css('overflow', 'hidden');
			
		//Wrap body is holding div which can have values which are not processed on 'body' or 'html'
		$( 'body' ).wrapInner('<div id="mp-stacks-parallax-inner-site-wrap" />');
		
		//Wrap body is holding div which can have values which are not processed on 'body' or 'html'
		$( 'body' ).wrapInner('<div id="mp-stacks-parallax-outer-site-wrap" />');
		
		//Make the body position absolute and width 100%
		$('#mp-stacks-parallax-outer-site-wrap').css( 'position', 'absolute' );
		$('#mp-stacks-parallax-outer-site-wrap').css( 'width', '100%' );
		$('#mp-stacks-parallax-outer-site-wrap').css( 'height', '100%' );
		$('#mp-stacks-parallax-outer-site-wrap').css( 'margin', '0 auto' );
		$('#mp-stacks-parallax-outer-site-wrap').css( 'display', 'inline-block' );
		
		var myScroll;
		
		var indicators_array = [];
		
		$('.mp-brick-parallax').each(function(){
			
			//Speed variables
			bg_speed = $(this).attr( 'mp_brick_parallax_bg_speed' );
			m1_speed = $(this).attr( 'mp_brick_parallax_m1_speed' );
			m2_speed = $(this).attr( 'mp_brick_parallax_m2_speed' );
			
			
			//alert(bg_speed);
			//alert(Math.abs(bg_speed-100));
			//alert(Math.abs(bg_speed-100)/100);
			
			this_bricks_id = $(this).attr('id');
			
			this_brick = {
				el: document.getElementById(this_bricks_id),
				resize: false,
				ignoreBoundaries: true,
				speedRatioY:bg_speed,
			};
			
			indicators_array.push( this_brick );
		
		});
		
		myScroll = new IScroll('#mp-stacks-parallax-outer-site-wrap', {
			mouseWheel: true,
			indicators: indicators_array,
			click: true
		});
		
		document.addEventListener('touchmove', function (e) { 
			e.preventDefault();
			//alert($('#mp-stacks-parallax-inner-site-wrap').height());
			$('#mp-stacks-parallax-inner-site-wrap').css( 'height',$('#mp-stacks-parallax-inner-site-wrap').height() + 'px'); 
		}, false);
	}
}); 