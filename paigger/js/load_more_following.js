$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more_folwing',function(){
        var ID = $(this).attr('id');
		var hidden_id = $("#hidden_input").val();
        $('.show_more_folwing').hide();
        $('.loading_folwing').show();
        $.ajax({
            type:'POST',
            url:'function/fetch_following.php',
            data:{'id':ID , 'user_id':hidden_id},
            success:function(html){
                $('#show_more_main_folwing'+ID).remove();
                $('.following_list').append(html);
				$('.loading_folwing').hide();
            }
        }); 
    });
});