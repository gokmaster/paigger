$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more_comments',function(){
	
        var ID = $(this).attr('id'); // $(this) refers to .show_more_comments element
		var show_more_main = $(this).parent();
		var loading_element = $(this).parent().find('.loading');
		var pageID = $(show_more_main).parent().find('.hidden_page_id').val(); //$(show_more_main).parent() refers to #commentSection div
		
        $(this).hide();
        $(loading_element).show();
        $.ajax({
            type:'POST',
            url:'function/fetch_comments.php',
            data:{'cmt_id':ID , 'page_id':pageID },
            success:function(html){
                $(show_more_main).remove();
                $('#commentSection').append(html);
				$(loading_element).hide();
            }
        }); 
    });
});