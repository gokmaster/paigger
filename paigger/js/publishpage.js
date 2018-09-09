//publish page
	function publishpage() {
		$("#btnPublish").prop("disabled",true);
		remove_empty_lastchild_p(); //remove empty <p> which is last child
		remove_nbsp_from_p(); //remove &nbsp from <p>
		
		var title = document.getElementById("txtpagetitle").value;		
		var content = $("#textarea").html();
		
		if (title != null && title != ""
			&& content != null && content != "")
		{		
			$.post("function/publishpage.php", 
				{ pagetitle: title , pagecontent: content},
				function(result){ 
						$("#hidden_p_id").val(result); }
			); // post
			$("#hiddendiv").show();			
		} else {
			alert("Error: Page title and content cannot be blank.");
                        $("#btnPublish").prop("disabled",false);
		}
		
	}  //publish page
	
	// save page
	function savepage() {
                $("#btnSavePage").prop("disabled",true);
		remove_empty_lastchild_p(); //remove empty <p> which is last child
		remove_nbsp_from_p(); //remove &nbsp from <p>
		
		var title = document.getElementById("txtpagetitle").value;		
		var content = $("#textarea").html();
		var p_id = $("#hidden_p_id").val();
			
		if (title !== null && title !== ""
			&& content !== null && content !== "")
		{		
			$.post("function/savepage.php", 
				{ pagetitle: title , pagecontent: content, pageid: p_id}
				
			); // post
			$("#hiddendiv").show();			
		} else {
			alert("Error: Page title and content cannot be blank.");
                        $("#btnSavePage").prop("disabled",false);
		}
		
	} 
	
	
	//share page
	function sharePage() {
            var loading = "<div class=loadingDiv ></div>";
            var page_audience;
            
            $("#btnShare").prop("disabled",true);
            $("#btnShare").prepend(loading);
		var any_error = "no";
                
		
		// if group option is selected
		if ($("#groupOption").is(":checked")) {
			
			if ($('[name="groupSelect"]').is(':checked')) {
				page_audience = $('input:radio[name=groupSelect]:checked').val();
			} else { 
				// if no group is selected
				$("#selectGrpMsg").html("Please, select a group.");
				var any_error = "yes"
				$("#btnShare").prop("disabled",false);
                                $(".loadingDiv").remove();
			}
		
		} else { // if Only Me or Public option is selected
			page_audience = $('input:radio[name=audience]:checked').val();
		}
		
		if (any_error == "no") {
			var page_id = $("#hidden_p_id").val();
			$.post("function/updatePageAudience.php", 
				{ page_audience: page_audience, page_id: page_id} ,
				function(result){ 
						$("#hiddendiv").html(result); 
                                                 $(".loadingDiv").remove();
                                            }
				
			); //post
		}
		$("#btnShare").prop("disabled",false);		
	}  //share page
	
	
	// show Group selection
	function showGroupSelection() {
		
		$("#groupSelectDiv").show();		
	}
	
	
	// hide Group selection
	function hideGroupSelection() {
		
		$("#groupSelectDiv").hide();
	}