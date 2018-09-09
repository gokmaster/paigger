
$(document).ready(function(){
	
	$('#txtSearch').keypress(function(event){
	
		var keyword = $("#txtSearch").val();
		var keyword = $.trim(keyword);
		
		if (keyword != null && keyword != "")
		{
			$('#btnSearch').prop("disabled",false);					
																	
		} else {
			$('#btnSearch').prop("disabled",true);
		}
	});
	
	
}); //document.ready