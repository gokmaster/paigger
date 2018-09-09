$(document).ready(function(){
	// when show_more_replies link is clicked
	// (.on works with dynamically generated elements)
    $(document).on('click','.show_more_replies_link',function(){
	
        $(this).prepend("<div class=loadingDiv2></div>");
		
		// $(this) refers to show_more_replies link
		var btn_show_replies = $(this);
		var parent_container = $(this).parent();
		var cmnt_id = $(parent_container).find(".cmt_id").val();
        						
        $.ajax({
            type:'POST',
            url:'function/fetch_cmt_replys.php',
            data:{'cmt_id':cmnt_id},
            success:function(html){
				//alert("successful");
                $(parent_container).find(".reply_div").remove();
				$(parent_container).append("<a class=hide_replies>Hide replies</a>");
				$(parent_container).append(html);
                $(btn_show_replies).hide();		
				$(".loadingDiv2").remove();
            } 
			
        }); 
		
    });
});