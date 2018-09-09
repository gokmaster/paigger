<?php 
$editor_styles = "styles/pagecreate_styles.css";
?>
	<a id='scroll_to_textarea' ></a>
	<div class='editorControlsDiv' >
				
		<input id='btnBold' type='image' onclick='bold(this)' src='image/icon/bold.gif' alt='Bold' title='Bold' class='btnTextEditor' >
		<input id='btnItalic' type='image' onclick='italic(this)' src='image/icon/italic.gif' alt='Italic' title='Italic' class='btnTextEditor' >
		<input id='btnUnderline' type='image' onclick='underline(this)' src='image/icon/underline.gif' alt='Underline' title='Underline' class='btnTextEditor' >
		<input id='btnBulletedList' type='image' onclick='bulletedList(this)' src='image/icon/bulletlist.gif' alt='Bulleted list' title='Bulleted list' class='btnTextEditor' >
		<input id='btnOrderedList' type='image' onclick='orderedList(this)' src='image/icon/orderedlist.png' alt='Numbered list' title='Numbered list' class='btnTextEditor' >
		<input id='btnQuote' type='image' src='image/icon/quote.gif' alt='Blockquote' title='Blockquote' class='btnTextEditor' >
		<input type='image' onclick='showlinkdiv()' src='image/icon/link.png' alt='Link' title='Link' class='btnTextEditor' >
		<input type='image' onclick='showimagediv()' src='image/icon/image.png' alt='Image' title='Image' class='btnTextEditor' >
		<input id='btnCode' type='image' src='image/icon/code.gif' alt='Code' title='Code' class='btnTextEditor' >
			
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
                        <input type="file" name="file1" id="file1" accept="image/*" style="display:none;"> <br>
                        <progress id="progressBar" value="0" max="100" style="width:300px;display:none;"></progress>
                        <b id="status"></b>
                        <p id="loaded_n_total"></p>
                    </form>
                    <button id="btnAddImage" class="imagebutton" style="display:none;" onclick=addimage($('.image_preview')) >Insert Image</button> 
                    <hr>
                    <button id="btnMyImages"  onclick=show_my_images() >Select from My Images</button> 
		</div>
		
		<button id="btnBacktoUpload" style="display:none;"  onclick=show_img_upload_div() >Back to Upload</button> 
		<div id="myImagesDiv">		 	
		</div>
	</div>
	
			
	<div id="textarea" name="textarea" style="height:180px;" contenteditable>
		<span id='txtEnterContentHere'>Type your comment here...</span>
	</div>
	<div id='commentButtonsDiv'>
		<button id='btnComment' disabled>Comment</button>
	</div>
	
	

 