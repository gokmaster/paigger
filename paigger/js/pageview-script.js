
function showDeletePageDialogBox() {
	$("#deletePageDiv").show();
}

function hideDeletePageDialogBox() {
	$("#deletePageDiv").hide();
}

function deletePage() {
	$("#deletePageDiv").html('<div class=loadingDiv ></div> Deleting page. Please wait...');
	var page_id = $("#hidden_pageid").val();
		
	$.post("function/deletePage.php", 
		{page_id: page_id} ,
		function(result){ 
				$("#deletePageDiv").html(result); }
	); //post
}

// show moreOptionsDiv
$('#btnMorePageOptions').click(function (e) {
	$('#moreOptionsDiv').show();	
});

// hide hiddenDropMenu when user clicks anywhere outside it
$(document).mouseup(function (e) {
	click_outside_to_hide( $(".hiddenDropMenu"),  e);
});
	
	


