
function _(el){
    return document.getElementById(el);
}

$('#file1').change(function() { // when file is selected
    uploadFile();
});

function uploadFile(){
	
	// check if logged-in
	$.post("function/login_first.php", 
			
		function(result){ 
			$("body").append(result);
				
		} //function(result)
									
	); //$.post
	
	 var file = _("file1").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
	
	var ext = $('#file1').val().split('.').pop().toLowerCase();
	// check for valid file extension 
	if ($.inArray(ext, ['gif','png','jpg','jpeg']) == -1)  {              
    alert('Error: Invalid file. Only gif, png, jpg, or jpeg files are supported');               
    } else {
   
    var formdata = new FormData();
    formdata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "function/upload.php");
    ajax.send(formdata);
	}
}	
function progressHandler(event){
	 $("#progressBar").show();
    _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploaded... Processing image. <div class=loadingDiv2 ></div>";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
	$("#progressBar").hide();
	$(".imagebutton").show();
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
}
