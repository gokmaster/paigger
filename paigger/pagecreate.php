<?php
    if(!isset($_SESSION)){session_start();}

    if ( !isset($_SESSION["user_id"]) )
            {
            // redirect to login page
             header('Location: login_form.php');
              exit;
            }
	
  //Buffer larger content areas like the main page content
  ob_start();

?>

<div class="content">

	<input type="text" id="txtpagetitle" placeholder="Page Title" maxlength="90" 
		value='<?php include_once "function/get_page_title.php"; ?>' /> <br>	
		<div class='editorControlsDiv' >
			<input id='btnShowHeadingControls' type='button' onclick='showHeadingControls()'  value='Paragraph' >
			<div id='headingButtonsDiv' >
				<input id='btnParagraph' type='button' onclick='para("Paragraph")'  value='Paragraph' ><br>
				<input id='btnH1' type='button' onclick='heading("H1","Heading 1")'  value='Heading 1' ><br>
				<input id='btnH2' type='button' onclick='heading("H2","Heading 2")'  value='Heading 2' ><br>
				<input id='btnH3' type='button' onclick='heading("H3","Heading 3")'  value='Heading 3' ><br>
				<input id='btnH4' type='button' onclick='heading("H4","Heading 4")'  value='Heading 4' ><br>
				<input id='btnH5' type='button' onclick='heading("H5","Heading 5")'  value='Heading 5' ><br>
				<input id='btnH6' type='button' onclick='heading("H6","Heading 6")'  value='Heading 6' >
			</div>
			
			<input id='btnBold' type='image' onclick='bold(this)' src='image/icon/bold.gif' alt='Bold' title='Bold' class='btnTextEditor' >
			<input id='btnItalic' type='image' onclick='italic(this)' src='image/icon/italic.gif' alt='Italic' title='Italic' class='btnTextEditor' >
			<input id='btnUnderline' type='image' onclick='underline(this)' src='image/icon/underline.gif' alt='Underline' title='Underline' class='btnTextEditor' >
			<input id='btnBulletedList' type='image' onclick='bulletedList(this)' src='image/icon/bulletlist.gif' alt='Bulleted list' title='Bulleted list' class='btnTextEditor' >
			<input id='btnOrderedList' type='image' onclick='orderedList(this)' src='image/icon/orderedlist.png' alt='Numbered list' title='Numbered list' class='btnTextEditor' >
			<input id='btnQuote' type='image' src='image/icon/quote.gif' alt='Blockquote' title='Blockquote' class='btnTextEditor' >
			<input type='image' onclick='showlinkdiv()' src='image/icon/link.png' alt='Link' title='Link' class='btnTextEditor' >
			<input type='image' onclick='showimagediv()' src='image/icon/image.png' alt='Image' title='Image' class='btnTextEditor' >
			<input type='image' onclick='showVideoDiv()' src='image/icon/video.jpg' alt='Youtube Video' title='Youtube Video' class='btnTextEditor' >
			
			<input type='image' onclick='showAdvanced()' src='image/icon/more.gif' alt='Advanced' title='Advanced controls' class='btnAdvanced' >
			<div id='advancedControlsDiv'>
				<input id='btnJustifyLeft' type='image' src='image/icon/justify_left.gif' alt='Align left' title='Align left' class='btnTextEditor' >
				<input id='btnJustifyCenter' type='image' src='image/icon/justify_center.gif' alt='Align center' title='Align center' class='btnTextEditor' >
				<input id='btnJustifyRight' type='image' src='image/icon/justify_right.gif' alt='Align right' title='Align right' class='btnTextEditor' >
				<input id='btnJustify' type='image' src='image/icon/justify.gif' alt='Justify' title='Justify' class='btnTextEditor' >
				<input id='btnStrikethrough' type='image' onclick='strikethrough(this)' src='image/icon/strikethrough.gif' alt='Strikethrough' title='Strikethrough' class='btnTextEditor' >
				<input id='btnHorizontalRule' type='image' onclick='horizontalRule(this)' src='image/icon/hr.gif' alt='Horizontal line' title='Horizontal line' class='btnTextEditor' >
				<input id='btnOutdent' type='image' src='image/icon/outdent.gif' alt='Outdent' title='Outdent' class='btnTextEditor' >
				<input id='btnIndent' type='image' src='image/icon/indent.gif' alt='Indent' title='Indent' class='btnTextEditor' >
				<input id='btnCode' type='image' src='image/icon/code.gif' alt='Code' title='Code' class='btnTextEditor' >
			</div>
		</div>
		<div id="linkbox" class='controlsBox' >
			<input type=image onclick='closeThis(this)' src='image/icon/close.gif' alt='Close' title='Close' class='btnClose' >
			 <input type="text" id="linktext" placeholder="Text" /> 
			 <input type="url" id="linkurl" placeholder="url" /> 
			
			<button onclick="addlink()">Insert Link</button>
		</div>
		
		<div id="imagebox" class='controlsBox' >
			<input type=image onclick='closeThis(this)' src='image/icon/close.gif' alt='Close' title='Close' class='btnClose' >
			<div id="imgUploadDiv">		 
				<form id="upload_form" enctype="multipart/form-data" method="post">
                                    <input type="button" id="btnUpload" value="Upload an image" onclick="document.getElementById('file1').click();" />
                                    <input type="file" name="file1" id="file1" accept="image/*" style="display:none;">
                                    <br>
                                    <progress id="progressBar" value="0" max="100" style="width:300px;display:none;"></progress>
                                    <b id="status"></b>
                                    <p id="loaded_n_total"></p>
				</form>
				<button id="btnAddImage" class="imagebutton" style="display:none;" onclick=addimage($('.image_preview')) >Insert Image</button> 
				<hr>
				<button id="btnMyImages"  onclick='show_my_images(1)' >Select from My Images</button> 
			</div>
			
			<button id="btnBacktoUpload" style="display:none;"  onclick=show_img_upload_div() >Back to Upload</button> 
			<div id="myImagesDiv">		 
				
			</div>
		</div>
		
		<div id="videobox" class='controlsBox' >
			<input type=image onclick='closeThis(this)' src='image/icon/close.gif' alt='Close' title='Close' class='btnClose' >
			
			 <input type="url" id="videoURL" placeholder="URL of Youtube video" /> 
			
			<button onclick="insertVideo()">Insert Youtube Video</button>
		</div>
			
	 <div id="textarea" name="textarea" contenteditable>
		
		<?php include_once "function/get_page_content.php"; ?>
	</div>

	<?php
		if (isset($_GET["pageid"]) ) {
			$page_id = $_GET["pageid"];
			
			require_once "function/page_functions.php";
					
			if (page_belongs_to_user($page_id) ) {
				echo "<button id='btnSavePage' onclick=savepage() >Save</button>";
			} else {
				echo "
				<script>
					window.location.href = 'pagecreate.php';
				</script>
				";  // reload page
			}
		} else {
			echo "<button id='btnPublish' onclick=publishpage() >Publish page</button>";
		}
	?>

	<div id="hiddendiv" class='dialogBoxDiv' >
		<div class='dialogBoxHeading' >Page Audience</div>
		
		<p>Share this page with?</p>
		
		 <label><input id='onlyMeOption' onclick='hideGroupSelection()' type="radio" name="audience" value="only me"> Only me</label><br>
		 <label><input id='groupOption' onclick='showGroupSelection()' type="radio" name="audience" value="group"> Group</label><br>
		 <div id='groupSelectDiv' >
			<div id='selectGrpMsg' class='red' ></div>
			<?php require_once "function/group_selection.php"; ?>
		 </div>
		 <label><input id='publicOption' onclick='hideGroupSelection()' type="radio" name="audience" value="public" checked> Public</label><br><br>
		 
		 <button id='btnShare' onclick='sharePage()' >Share</button>
		
	</div>

	<input id='hidden_p_id' type="hidden" 
	<?php 
		if (isset($_GET["pageid"]) ) {
			$page_id = $_GET["pageid"]; 
			echo "value=$page_id";
		}
	?> >

</div> <!-- class=content -->



<script type="text/javascript" src="js/invisible_pagecreate.js" ></script>


<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "Paigger: Create Page";
	  
	  $head = "
	 <link href='styles/pagecreate_styles.css' rel='Stylesheet' type='text/css' />
	";
	  
	  $style = "
	
	";
	    

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>