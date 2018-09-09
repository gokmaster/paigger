
	// When like button is clicked
    function like_page(page_id) {
		// loading 
		$("#likes_div").prepend("<div class=loadingDiv ></div>");
				
		$.post("function/like_page.php", 
				{id: page_id}, 
				function(result){ 
					// refresh div (>*"," prevents nested div) (space before # is needed)
					//$('#likes_div').load(document.URL +  " #likes_div>*","");  
					$("#likes_div").html(result); }
		); //$.post
	}
	
	
		// When unlike button is clicked
    function unlike_page(page_id) {
		// loading 
		$("#likes_div").prepend("<div class=loadingDiv ></div>");
				
		$.post("function/unlike_page.php", 
				{id: page_id}, 
				function(result){ 
					// refresh div (>*"," prevents nested div) (space before # is needed)
					//$('#likes_div').load(document.URL +  " #likes_div>*","");  
					$("#likes_div").html(result); }
		); //$.post
	}
	


