$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
		var group_id = $('#hidden_input').val();
        $('.show_more').hide();
        $('.loading').show();
        $.ajax({
            type:'POST',
            url:'function/fetch_group_pages.php',
            data:{'id':ID , 'group_id': group_id },
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('#grp_home_div').append(html);
				$('.loading').hide();
            }
        }); 
    });
});