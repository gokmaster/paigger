
	// show my images
	function show_my_images(page_number) {
		$("#imgUploadDiv").hide();
		$("#myImagesDiv").show();
		$("#btnBacktoUpload").show();
                fading_background( $("#myImagesDiv") ); // call function to change background for few seconds
               		
		
                $.post("function/load_my_images.php", 
                        {pageNumber:page_number}, 
                        function(result){ 
                            $("#myImagesDiv").html(result);
                        } //function(result)
                            
		); //$.post
	}
	
	// show image_upload_div
	function show_img_upload_div() {
		$("#myImagesDiv").hide();
		$("#btnBacktoUpload").hide();
		$("#imgUploadDiv").show();
	}

//------------image----------------------------------------------	
	//insert image
	function addimage(image_element) {
	
		// restore the cursor position back to contenteditable div
		restoreSelection(selectedRange); // selectedRange variable and restoreSelection function is defined in pagecreate-jscript.js; 
		document.getElementById("textarea").focus();
		
		// get only filename of image excluding the filepath
		var src = $(image_element).attr('src').split('/');
		var filename = src[src.length - 1];
		
		//generate random number to be used as id
		var id1 = Math.floor((Math.random() * 1998877) + 1); 
		var id2 = Math.floor((Math.random() * 9998877) + 1); 
		var imgId = "img" + id1 + "n" + id2;
		
		
		var url = "image/image_uploads/" + filename ;
		
		var image =  "<img class=pageimage alt=page-image src=" + url + " id=" + imgId + " />" ;
				
		var content = "<div class='pageimage_container' contenteditable='false' id=container" + imgId + ">" + image + "</div> &nbsp" ;
		
		pasteHtmlAtCaret(content);
		
	}//insert image
		
	// remove page-image
	function removePageImage(btn_remove_img) {
		var page_img_container = $(btn_remove_img).parent().parent();
                var img_container_parent = $(page_img_container).parent();
                
                if (img_container_parent.hasClass('alignCenter') ) {
                    page_img_container.unwrap();// remove parent container
                }
		// remove container and all its child elements
		$(page_img_container).remove();
	} 
	
	// Align page-image Left
	function alignImageLeft(btn_align) {
            var page_img_container = $(btn_align).parent().parent();
            var img_container_parent = $(page_img_container).parent();

            // if does not have alignLeft class
            if (!page_img_container.hasClass('alignLeft') ) {
                    page_img_container.addClass('alignLeft');
            }

            if (page_img_container.hasClass('alignRight') ) {
                    page_img_container.removeClass('alignRight');
            }

            if (img_container_parent.hasClass('alignCenter') ) {
                    page_img_container.unwrap();// remove parent container
            }
            
            realign_image( $(btn_align) ); // call function to realign image
	}
	
	// Align page-image Right
	function alignImageRight(btn_align) {
            var page_img_container = $(btn_align).parent().parent();
            var img_container_parent = $(page_img_container).parent();

            // if does not have alignRight class
            if (!page_img_container.hasClass('alignRight') ) {
                    page_img_container.addClass('alignRight');
            }

            if (page_img_container.hasClass('alignLeft') ) {
                    page_img_container.removeClass('alignLeft');
            }

            if (img_container_parent.hasClass('alignCenter') ) {
                    page_img_container.unwrap();// remove parent container
            }
            
            realign_image( $(btn_align) ); // call function to realign image
	}
	
		// Align page-image Center
	function alignImageCenter(btn_align) {
            var page_img_container = $(btn_align).parent().parent();
            var img_container_parent = $(page_img_container).parent();

            // if parent container does not have  alignCenter class
            if (!img_container_parent.hasClass('alignCenter') ) {
                // wrap page_img_container in parent container with alignCenter class
                $(page_img_container).wrapAll("<div class='alignCenter' contenteditable='false'>");
            }

            if (page_img_container.hasClass('alignLeft') ) {
                    page_img_container.removeClass('alignLeft');
            }

            if (page_img_container.hasClass('alignRight') ) {
                    page_img_container.removeClass('alignRight');
            }
            
            realign_image( $(btn_align) ); // call function to realign image
	}
	
		// No Alignment for page-image 
	function alignImageNone(btn_align) {
            var page_img_container = $(btn_align).parent().parent();
            var img_container_parent = $(page_img_container).parent();

            if (img_container_parent.hasClass('alignCenter') ) {
                page_img_container.unwrap();// remove parent container
            }

            if (page_img_container.hasClass('alignLeft') ) {
                    page_img_container.removeClass('alignLeft');
            }

            if (page_img_container.hasClass('alignRight') ) {
                    page_img_container.removeClass('alignRight');
            }

            realign_image( $(btn_align) ); // call function to realign image
	}
        
        // resize image using input-slider (input type=range)
	$(document).on('change', '#inputslide',function() {
            
            // $(this) refers to input-slider
            var pic1 = $(this).parent().parent().find(".pageimage");
            var picId = pic1.attr("id");
            var pic = document.getElementById(picId);
            var slideAmount =  $(this).val() ;

            pic.style.width = slideAmount + "px";
            
            realign_image( $(this) ); // call function to realign image
	});
        
        // rotate image 90 gegrees clockwise
	function rotateRight(btn_rotate_right) {
            $.ajaxSetup({async:false});  //execute synchronously
            var pic = $(btn_rotate_right).parent().parent().find(".pageimage");  
            var rotation_value = 90;  
                        
            var angle_rotated = rotate_element(pic , rotation_value); // call function to rotate pic
            
            var pic_container = $(pic).parent();
            
            realign_element_after_rotation(pic, pic_container, angle_rotated); // call function to realign pic and its container
            $.ajaxSetup({async:true});  //return to default setting
	} 
        
        // rotate image 90 gegrees anti-clockwise
	function rotateLeft(btn_rotate_left) {
            $.ajaxSetup({async:false});  //execute synchronously
            var pic = $(btn_rotate_left).parent().parent().find(".pageimage");  
            var rotation_value = -90;  
                        
            var angle_rotated = rotate_element(pic , rotation_value); // call function to rotate pic
            
            var pic_container = $(pic).parent();
            
            realign_element_after_rotation(pic, pic_container, angle_rotated); // call function to realign pic and its container
            $.ajaxSetup({async:true});  //return to default setting
             
	} 
	
	
	// load image controls when page-image is clicked
	 $(document).on('click', '#textarea .pageimage',function() {
		
		var img_width = $(this).width();
		var inputslide = "<input id=inputslide contenteditable='true' title='Resize image' class=inputslide type=range min=150 max=820 step=10 value="+ img_width +" > <br>";
		
		var btn_align_left = "<input type=image onclick=alignImageLeft(this) src=image/icon/align_left.jpg alt='Align left' title='Align left' class=btnAlign >";
		var btn_align_center = "<input type=image onclick=alignImageCenter(this) src=image/icon/align_center.jpg alt='Align Center' title='Align center' class=btnAlign >";
		var btn_align_right = "<input type=image onclick=alignImageRight(this) src=image/icon/align_right.jpg alt='Align right' title='Align right' class=btnAlign >";
		var btn_align_none = "<input type=image onclick=alignImageNone(this) src=image/icon/align_none.jpg alt='No alignment' title='No alignment' class=btnAlign >";
                var btn_rotate_left = "<br> <input type=image onclick=rotateLeft(this) src=image/icon/rotate_left.jpg alt='Rotate left 90 degrees' title='Rotate left 90 degrees' class=btnImgControls >";
                var btn_rotate_right = "<input type=image onclick=rotateRight(this) src=image/icon/rotate_right.jpg alt='Rotate right 90 degrees' title='Rotate right 90 degrees' class=btnImgControls >";
                var btn_remove_img = "<input type=image onclick=removePageImage(this) src=image/icon/remove.jpg alt='Remove image' title='Remove image' class=btnImgControls >";
		var image_controls_div = "<div class='pageimage_inner_box' contenteditable='false' >" + inputslide + btn_align_left + btn_align_center + btn_align_right + btn_align_none + btn_rotate_left + btn_rotate_right + btn_remove_img +"</div>";
		
		if ( $(this).parent().find(".pageimage_inner_box").length ) {
			// do nothing if pageimage_inner_box already exists
		} else {
			$(this).parent().append(image_controls_div);
		}
	 
		// make pageimage container editable
		$(this).parent().attr('contenteditable','true');
		
	 });

	 
	 // remove image controls when clicking anywhere outside the image-controls container
	 $(document).mouseup(function (e)
	{
		var container = $(".pageimage_inner_box");

		if (!container.is(e.target) // if the target of the click isn't the container...
			&& container.has(e.target).length === 0) // ... nor a descendant of the container
		{
			container.remove(); // remove this container and its child elements
						
			$('.pageimage_container').attr('contenteditable','false'); // make pageimage_container non-editable
		}
	});
	
//------------image END----------------------------------------------

//----------------other functions---------------------------

// get rotation degrees
function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }
    return (angle < 0) ? angle + 360 : angle;
}

 // pass an element such as an image, div, etc. and rotation value such as 90, -90, etc to this function to rotate the element
function rotate_element(element , rotation_value) {
    
    var initial_angle = getRotationDegrees( $(element) );
    
    var angle = initial_angle + rotation_value;

    var rotate_string = "rotate(" + angle + "deg)";
    $(element).css({"-ms-transform": rotate_string , "-webkit-transform": rotate_string , "transform": rotate_string });
     /*-ms-transform -- IE 9 */
    /* -webkit-transform -- Chrome, Safari, Opera */
    return angle;
} 

function realign_element_after_rotation(element, container, angle_rotated) {
    
    $.ajaxSetup({async:false});  //execute synchronously
    
    var element_id = element.attr("id"); 
     //For getBoundingClientRect(), top and bottom are measured from the upper left corner of window 
    // - not from the top edge of the document in the browser window.
    var rect = document.querySelector('#'+element_id).getBoundingClientRect();

    var height = rect.height;
    var width = rect.width;
        
    var height_string = height + "px";
    $(container).css("height", height_string); //re-adjust height of container
    
    var width_string = width + "px";
    $(container).css("width", width_string); //re-adjust width of container
    
    if ((height > width) || (width > height) ) { //if not a square
                
        var element_distance_from_top = distance_from_top(element); // distance from original element to top of window
        var container_distance_from_top = distance_from_top(container);  // call function to get distance from top of window

        // shift_height would negative if width > height
        var shift_height = container_distance_from_top - element_distance_from_top; 

        var element_distance_from_left = distance_from_left(element); // distance from original element to left side of window
        var container_distance_from_left = distance_from_left(container);  // call function to get distance from left of window

        var shift_width = container_distance_from_left - element_distance_from_left; 
                
        var rotate_string = "rotate(" + angle_rotated + "deg)";
       
        var translate_string = "translate(" + shift_width + "px," + shift_height + "px)"; 

        // re-position element and rotate.
        $(element).css({"-ms-transform": translate_string + rotate_string , 
                        "-webkit-transform": translate_string + rotate_string , 
                        "transform": translate_string + rotate_string });  
              
    } // if 
    
    var parent_container = container.parent();
    if (parent_container.hasClass('alignCenter') ) {
         $(parent_container).css("height", height_string); //re-adjust height of parent container to height of its child container
    }
    
     $.ajaxSetup({async:true});  //return to default setting
} 

// this realigns the image and its container
function realign_image(img_controls_button) {
    $.ajaxSetup({async:false});  //execute synchronously
           
    rotateRight($(img_controls_button));
    rotateLeft($(img_controls_button)); 
  
    $.ajaxSetup({async:true});  //return to default setting
}

// distance from top of document
function distance_from_top(element) {
    var offset = $(element).offset();
    return offset.top;
}

function distance_from_left(element) {
   var offset = $(element).offset();
    return offset.left;
}