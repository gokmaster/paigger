$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
		var hidden_id = $("#hidden_input").val();
        $('.show_more').hide();
        $('.loading').show();
        $.ajax({
            type:'POST',
            url:'function/fetch_pages.php',
            data:{'id':ID , 'user_id':hidden_id},
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.page_list').append(html);
				$('.loading').hide();
            }
        }); 
    });
});