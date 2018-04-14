$(document).ready(function(){
						   
                var first= 0;
                var speed = 3500;
		var pause = 6500;
						   
                function removeFirst(){
			first = $('ul#sekilas li:first').html();
			$('ul#sekilas li:first').animate({opacity:0}, speed)
			.hide('slow', function(){
                            $(this).remove();
                        });
			addLast(first);						   
		}
		function addLast(first){
			last = '<li style="display:none">'+first+'</li>';
			$('ul#sekilas').append(last)
			$('ul#sekilas li:last')
			.animate({opacity:1}, speed)
			.show()
		}
                
		interval =setInterval(removeFirst, pause);
});
