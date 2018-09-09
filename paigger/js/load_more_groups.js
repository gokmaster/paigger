$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more_groups',function(){
        var ID = $(this).attr('id');
		var hidden_id = $("#hidden_input").val();
        $('.show_more_groups').hide();
        $('.loading_groups').show();
        $.ajax({
            type:'POST',
            url:'function/fetch_groups.php',
            data:{'id':ID , 'user_id':hidden_id},
            success:function(html){
                $('#show_more_main_groups'+ID).remove();
                $('.group_list').append(html);
				$('.loading_groups').hide();
            }
        }); 
    });
});