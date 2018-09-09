    var selectedRange;

    $(document).ready(function(){

        // if last child is <p>, place cursor on it
        if ($("#textarea > p:last-child").length > 0) {
                $("#textarea > p:last-child").focus();
        } 
    });
	
  //------ save cursor position/ highlighted text of #textarea-----
        
    $('#textarea').keyup(function() { 
        selectedRange = saveSelection();
    }); 
    
    $('#textarea').mouseup(function() { 
        selectedRange = saveSelection();
    });  
          
  //---END--- save cursor position/ highlighted text-----	
	
	function showHeadingControls() {		
		$("#headingButtonsDiv").slideToggle();
	}
			
	// hide headingButtonsDiv when user clicks anywhere but the div
	$(document).mouseup(function (e)
	{
		click_outside_to_hide( $("#headingButtonsDiv"),  e);
	});
	
	function showlinkdiv()	{
		$(".controlsBox").hide();
		$("#linkbox").slideToggle();
	}

	function showimagediv()	{
		$(".controlsBox").hide();
		$("#imagebox").slideToggle();
	}
	
	function showVideoDiv()	{
		$(".controlsBox").hide();
		$("#videobox").slideToggle();
	}
	
	function showAdvanced() {
		$("#advancedControlsDiv").slideToggle();
	}
	
	
	
	//add link
	function addlink() {
	
            // restore the cursor position back to contenteditable div
            restoreSelection(selectedRange);
            document.getElementById("textarea").focus();

            var text = document.getElementById("linktext").value; 
            var url = document.getElementById("linkurl").value;

            // remove HTML tags if any
            var text = removeHTMLtags(text);
            var url = removeHTMLtags(url);

            // || represents OR
            if (text == null || text == "" || url == null || url == "") {
            alert("Text and url is required.");
            } else {		
            var content =  "<a href=" + url + " target=_blank>" + text + "</a> &nbsp" ;

            pasteHtmlAtCaret(content);
            //document.execCommand('insertHTML', false, content); //insertHTML is not compatible with internet explorer
            }
    }//add link 
	
	
//--------------------Video-------------------------------------------------
	// insert video
	function insertVideo() {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		var url = document.getElementById("videoURL").value;
		var youtube_id = youtube_parser(url);
		
		if (youtube_id != false) {
			var content = "<div class='page_video_container' contenteditable='false' ><iframe class='page_video' src='https://www.youtube.com/embed/" + youtube_id + "'></iframe></div>";
			pasteHtmlAtCaret(content);
		} else {
			alert("Please enter a valid Youtube URL");
		}
	}
	
	// load video controls when page_video_container is clicked
	$(document).on('click', '#textarea .page_video_container',function() {
		var btn_remove_video = "<input type=image onclick=removePageVideo(this) src=image/icon/close.gif alt='Remove video' title='Remove video' class=btnClose >";
		if ( $(this).find(".btnClose").length ) {
			// do nothing if btnClose already exists
		} else {
			$(this).append(btn_remove_video);
		}
	});
	
	function removePageVideo(btnRemoveVideo) {
		var video_container = $(btnRemoveVideo).parent();
		// remove container and all its child elements
		$(video_container).remove();
	}
	
		
	// hide remove_video_button when clicking anywhere outside video container
	 $(document).mouseup(function (e)
	{
		// remove button if exist
		if ($(".page_video_container").find(".btnClose").length ) {
			click_outside_to_remove($(".page_video_container"), $(".btnClose"), e )
		}
	});
	
//----------------END----Video-------------------------------------------------
	

//--------Text editor formatting----------------

	function bold(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
	
		document.execCommand('bold');
		isButtonActive();
	}
	
	function italic(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('italic');
		isButtonActive();
	}
	
	function underline(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('underline');
		isButtonActive();
	}
	
	function bulletedList(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
	
		document.execCommand('insertUnorderedList');
		isButtonActive();
	}
	
	function orderedList(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('insertOrderedList');
		isButtonActive();
	}
	
	$('#btnJustifyLeft').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('justifyLeft');
		isButtonActive();
	});
	
	$('#btnJustifyCenter').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('justifyCenter');
		isButtonActive();
	});
	
	$('#btnJustifyRight').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('justifyRight');
		isButtonActive();
	});
	
	$('#btnJustify').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('justifyFull');
		isButtonActive();
	});
	
	$('#btnOutdent').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('outdent');
		isButtonActive();
	});
	
	$('#btnIndent').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('indent');
		isButtonActive();
	});
	
	function strikethrough(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('strikeThrough');
		isButtonActive();
	}
	
	function horizontalRule(clickedButton) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('insertHorizontalRule');
		isButtonActive();
	} 
	
	//------------Block level formating----
	
	function para(buttontext) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('insertParagraph');
				
		closeThis($("#btnParagraph"));
		
		$('#btnShowHeadingControls').val(buttontext);
	} 
		
	function heading(headingSize,buttontext) {
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		document.execCommand('formatBlock', false, '<'+headingSize+'>');
		
		closeThis($("#btnParagraph"));
		
		$('#btnShowHeadingControls').val(buttontext);
	}
	
	//-------------Blockquote--------------
	 $('#btnQuote').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		var selectedElement = getSelectionContainerElement();
		var selectedElementName = selectedElement.nodeName.toUpperCase();
		
		if ( selectedElementName == 'BLOCKQUOTE' ) {
			document.execCommand('formatBlock', false, '<p>');
			$('#btnQuote').removeClass('activeButton');
		} else {
			document.execCommand('formatBlock', false, '<blockquote>');
			var currentBlockquote = window.getSelection().focusNode.parentNode;
			$(currentBlockquote).addClass("styled_quote");
			$('#btnQuote').addClass('activeButton');
		}
		
	});
		
	// show btn_remove_blockquote
	$(document).on('click', '#textarea .styled_quote',function() {
		var block = $(this);
		var btn_remove_blockquote = "<input type=image onclick=removeBlockFormatting(this) src=image/icon/remove.jpg alt='Remove blockquote-formatting' title='Remove blockquote-formatting' class=btnCloseLeft >";
		if ( $(block).find(".btnCloseLeft").length ) {
			// do nothing if btnCloseLeft already exists
		} else {
			$(block).append(btn_remove_blockquote);
		}
			
	});
	
	// hide btn_remove_blockquote when clicking anywhere outside blockquote
	 $(document).mouseup(function (e)
	{
		// remove button if exist
		if ($("blockquote").find(".btnCloseLeft").length ) {
			click_outside_to_remove($("blockquote"), $(".btnCloseLeft"), e )
		}
	});
		
	//---------END----Blockquote--------------
	
	
	//-------------Code--------------
	 $('#btnCode').click(function (e) {	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange);
		document.getElementById("textarea").focus();
		
		var selectedElement = getSelectionContainerElement();
		var selectedElementName = selectedElement.nodeName.toUpperCase();
		
		if ( selectedElementName == 'PRE' ) {
			document.execCommand('formatBlock', false, '<p>');
			$('#btnCode').removeClass('activeButton');
		} else {
			document.execCommand('formatBlock', false, '<pre>');
			$('#btnCode').addClass('activeButton');
		}
		
	});
		
	// show btn_remove_code
	$(document).on('click', '#textarea pre',function() {
		var codeblock = $(this);
		var btn_remove_code = "<input type=image onclick=removeBlockFormatting(this) src=image/icon/remove.jpg alt='Remove code-formatting' title='Remove code-formatting' class=btnCloseLeft >";
		if ( $(codeblock).find(".btnCloseLeft").length ) {
			// do nothing if btnCloseLeft already exists
		} else {
			$(codeblock).append(btn_remove_code);
		}
			
	});
	
        // hide btn_remove_code when clicking anywhere outside codeblock
	 $(document).mouseup(function (e)
	{
		// remove button if exist
		if ($("pre").find(".btnCloseLeft").length ) {
			click_outside_to_remove($("pre"), $(".btnCloseLeft") , e)
		}
	});
			
	//---------END----Code--------------
	
//--------END-----Text editor formatting ----------------




//--------Change text editor buttons' background-color based on selected text under the cursor----------------
    $('#textarea').mouseup(function (e) {
           isButtonActive();
           selected_blockLevelElement(e);
   });

   $('#textarea').keyup(function(e){
           isButtonActive();
		
    });
		
    function isButtonActive() {
            var textformat = ["bold", "italic", "underline", "insertUnorderedList", "insertOrderedList",
                                            "strikeThrough", "insertHorizontalRule", "justifyRight", "justifyLeft", "justifyCenter", 
                                            "justifyFull", "outdent", "indent" ];

            var txt_editor_button = ["#btnBold", "#btnItalic", "#btnUnderline", "#btnBulletedList", "#btnOrderedList",
                                                    "#btnStrikethrough", "insertHorizontalRule", "#btnJustifyRight", "#btnJustifyLeft", "#btnJustifyCenter",
                                                    "#btnJustify", "#btnOutdent", "#btnIndent" ];

            max_count = textformat.length;

            for (i = 0; i < max_count; i++) {
                     if (document.queryCommandState(textformat[i]) ) {
                            $(txt_editor_button[i]).addClass('activeButton');
                    } else {
                            $(txt_editor_button[i]).removeClass('activeButton');
                    }
            }		

    } // isButtonActive
	
	
    //------------------Which Active button corresponds with the selected block ---------------------
    function selected_blockLevelElement(e) {

            $('#btnShowHeadingControls').removeClass('activeButton');
            $('#btnCode').removeClass('activeButton');
            $('#btnQuote').removeClass('activeButton');

            //var e = event || window.event;
            var node = e.target;
            var buttontext = 'Paragraph';
            var selected_block;

            while(node.nodeName.toUpperCase() != 'DIV') {

                    if (node.nodeName.toUpperCase() == 'H1') { 
                            buttontext = 'Heading 1';
                    } else
                    if (node.nodeName.toUpperCase() == 'H2') { 
                            buttontext = 'Heading 2';
                    } else
                    if (node.nodeName.toUpperCase() == 'H3') { 
                            buttontext = 'Heading 3';
                    } else
                    if (node.nodeName.toUpperCase() == 'H4') { 
                            buttontext = 'Heading 4';
                    } else
                    if (node.nodeName.toUpperCase() == 'H5') { 
                            buttontext = 'Heading 5';
                    } else
                    if (node.nodeName.toUpperCase() == 'H6') { 
                            buttontext = 'Heading 6';
                    } else
                    if (node.nodeName.toUpperCase() == 'PRE') { 
                            $('#btnCode').addClass('activeButton');
                    } else
                    if ( $(node).hasClass('styled_quote') ) { 
                            $('#btnQuote').addClass('activeButton');
                    }

                    $('#btnShowHeadingControls').addClass('activeButton');
                    $('#btnShowHeadingControls').val(buttontext);
                    selected_block = node.nodeName.toUpperCase();
                    node = node.parentNode;
            }
            return selected_block;
    } //END---Which Active button corresponds with the selected block
		
		
//--------END---Change text editor buttons' background-color based on selected text under the cursor----------------
	
	

//-----------------------Other functions---------------------------------------------

	// remove HTML tags
	function removeHTMLtags(html) {
		return $( $.parseHTML(html) ).text();
	}
	
	// extract Youtube_id from url
	function youtube_parser( youtubeLink){
		 
		if ( youtubeLink.match(/(youtube.com)/) ){
			var split_c = "v=";
			var split_n = 1;
		} else		 
		if ( youtubeLink.match(/(youtu.be)/) ){
			var split_c = "/";
			var split_n = 3;
		} else {
			return false; // invalid youtube link
		}
		 
		var getYouTubeVideoID = youtubeLink.split(split_c)[split_n];
		var cleanVideoID = getYouTubeVideoID.replace(/(&)+(.*)/, ""); // This is YouTube video ID.
		
		return cleanVideoID;
	}
	
	
	//------ Get container element of current selection at cursor position -----------
	function getSelectionContainerElement() {
		var range, sel, container;
		if (document.selection && document.selection.createRange) {
			// IE case
			range = document.selection.createRange();
			return range.parentElement();
		} else if (window.getSelection) {
			sel = window.getSelection();
			if (sel.getRangeAt) {
				if (sel.rangeCount > 0) {
					range = sel.getRangeAt(0);
				}
			} else {
				// Old WebKit selection object has no getRangeAt, so
				// create a range from other selection properties
				range = document.createRange();
				range.setStart(sel.anchorNode, sel.anchorOffset);
				range.setEnd(sel.focusNode, sel.focusOffset);

				// Handle the case when the selection was selected backwards (from the end to the start in the document)
				if (range.collapsed !== sel.isCollapsed) {
					range.setStart(sel.focusNode, sel.focusOffset);
					range.setEnd(sel.anchorNode, sel.anchorOffset);
				}
			}

			if (range) {
			   container = range.commonAncestorContainer;

			   // Check if the container is a text node and return its parent if so
			   return container.nodeType === 3 ? container.parentNode : container;
			}   
		}
	}
	
	// save the selected text or cursor position of contenteditable div
	 function saveSelection() {
		if (window.getSelection) {
			sel = window.getSelection();
			if (sel.getRangeAt && sel.rangeCount) {
				return sel.getRangeAt(0);
			}
		} else if (window.selection && window.selection.createRange) {
			return window.selection.createRange();
		} else {
                    return selectedRange; // no change to selectedRange
                }
	}
	
	// Restore the cursor back to contenteditable div
	function restoreSelection(range) {
		if (range) {
			if (window.getSelection) {
				sel = window.getSelection();
				sel.removeAllRanges();
				sel.addRange(range);
			} else if (window.selection && range.select) {
				range.select();
			}
		}
	}
	
	
	// insert html at cursor-position of contenteditable div
	function pasteHtmlAtCaret(html) {
		var sel, range;
		if (window.getSelection) {
			// IE9 and non-IE
			sel = window.getSelection();
			if (sel.getRangeAt && sel.rangeCount) {
				range = sel.getRangeAt(0);
				range.deleteContents();

				// Range.createContextualFragment() would be useful here but is
				// non-standard and not supported in all browsers (IE9, for one)
				var el = document.createElement("div");
				el.innerHTML = html;
				var frag = document.createDocumentFragment(), node, lastNode;
				while ( (node = el.firstChild) ) {
					lastNode = frag.appendChild(node);
				}
				range.insertNode(frag);

				// Preserve the selection
				if (lastNode) {
					range = range.cloneRange();
					range.setStartAfter(lastNode);
					range.collapse(true);
					sel.removeAllRanges();
					sel.addRange(range);
				}
			}
		} else if (document.selection && document.selection.type !== "Control") {
			// IE < 9
			document.selection.createRange().pasteHTML(html);
		}
	}// insert html at cursor-position of contenteditable div

	
	// remove html tags when user paste text into textarea
	/*document.querySelector("div[contenteditable]").addEventListener("paste", function(e) {
		e.preventDefault();
		var text = e.clipboardData.getData("text/plain");
		document.execCommand("insertHTML", false, text);
	}); */
	
	
		// remove the whole html element when backspace is pressed
	$('#textarea').on('keydown', function (event) {
		if (window.getSelection && event.which == 8) { // backspace
			// fix backspace bug in FF
			// https://bugzilla.mozilla.org/show_bug.cgi?id=685445
			var selection = window.getSelection();
			if (!selection.isCollapsed || !selection.rangeCount) {
				return;
			}

			var curRange = selection.getRangeAt(selection.rangeCount - 1);
			if (curRange.commonAncestorContainer.nodeType == 3 && curRange.startOffset > 0) {
				// we are in child selection. The characters of the text node is being deleted
				return;
			}

			var range = document.createRange();
			if (selection.anchorNode != this) {
				// selection is in character mode. expand it to the whole editable field
				range.selectNodeContents(this);
				range.setEndBefore(selection.anchorNode);
			} else if (selection.anchorOffset > 0) {
				range.setEnd(this, selection.anchorOffset);
			} else {
				// reached the beginning of editable field
				return;
			}
			range.setStart(this, range.endOffset - 1);


			var previousNode = range.cloneContents().lastChild;
			if (previousNode && previousNode.contentEditable == 'false') {
				// this is some rich content, e.g. smile. We should help the user to delete it
				range.deleteContents();
				event.preventDefault();
			}
		}
	});
	
	// insert paragraph if last child is not a paragraph or if not empty
	 $('#textarea').mouseup(function (e) {
		var last_child = $("#textarea").children().last();
		var trimmed = $.trim(last_child.html() );
		
		// if last_child is not <p> or last_child is not empty)
		if (
			(!(last_child.is('p') )) ||
			(  ( (trimmed.length > 6) ) ) 
		) { 
			$('#textarea').append('<p>&nbsp</p>');
		
		}    

	});
	
	// remove block formatting
	function removeBlockFormatting(btn_remove_formatting) {
		$(btn_remove_formatting).unwrap();
		$(btn_remove_formatting).remove();
	}
	
	// remove txtEnterContentHere
	$('#textarea').on('mousedown',function(){
		if ( $("#txtEnterContentHere").length > 0) {
			$("#txtEnterContentHere").remove();
		}
	});
	
	$('#textarea').on('keydown',function(){
		if ( $("#txtEnterContentHere").length > 0) {
			$("#txtEnterContentHere").remove();
		}
	});
	
	// remove &nbsp from paragraph
	function remove_nbsp_from_p() {
		$.ajaxSetup({async:false});  //execute synchronously
	
		$("#textarea p").each(function() {
				var $this = $(this);
				$this.html($this.html().replace(/&nbsp;/g, ''));
		});
		
		$.ajaxSetup({async:true});  //return to default setting
	}
	
	// remove empty paragraph which is last child
	function remove_empty_lastchild_p() {
		var last_child = $("#textarea").children().last();
		var trimmed = $.trim(last_child.html() );
		
		// if last_child is a <p> element and empty
		if (
			(last_child.is('p') ) &&
			 (trimmed.length == 0)  ) 
		{ 
			last_child.remove();
		
		} 
		
	}