// close this Div
	function closeThis(closebutton) {
		$(closebutton).parent().hide();
	}
	
	// remove element if clicking anywhere outside container
	function click_outside_to_remove(container, removeElement, e) {
		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.find(removeElement).remove();				
		}
	}
	
	// hide element if clicking anywhere outside container
	function click_outside_to_hide(container, e) {
		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.hide();			
		}
	}
        
        // Changing background colour for a few seconds only
	function fading_background(div_element) {
		var bg = $(div_element).css('background'); // store original background
		$(div_element).css('background', '#7fd5ef'); //change element background color
		
		setTimeout(function() {
			$(div_element).css('background', '#c9f5fc'); // change to 2nd background color 
		}, 1000); // waiting one second
		
		setTimeout(function() {
			$(div_element).css('background', bg); // change to back to original background color 
		}, 1500); // waiting one second
	
	}