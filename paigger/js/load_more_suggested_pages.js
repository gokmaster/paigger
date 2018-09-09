$(document).ready(function(){
	// when show_more button is clicked
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loading').show();
        $.ajax({
            type:'POST',
            url:'function/fetch_suggested_pages.php',
            data:{'id':ID },
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.suggested_pages_div').append(html);
				$('.loading').hide();
            }
        }); 
    });
});