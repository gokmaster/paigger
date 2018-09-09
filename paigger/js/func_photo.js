var updatephoto = "none"; // which photo to update? coverphoto or profile photo

    function show_photoUpdateDiv(photoToUpdate) {
        $("#photoUpdateDiv").show();
        updatephoto = photoToUpdate;
    }
	
    function hide_photoUpdateDiv() {
            $("#photoUpdateDiv").hide();
    }

    // show my images
    function show_my_images(page_number) {

            $("#imgUploadDiv").hide();
            $("#myImagesDiv").show();
            $("#btnBacktoUpload").show();
            fading_background( $("#myImagesDiv") ); // call function to change background for few seconds


            $.post("function/load_my_images_coverphoto.php", 
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

    // When coverphoto finishes loading, hide loading image
    $('#coverphoto').on('load', function(){
      // Fade out and hide the loading image.
      $('#loading_coverphoto').fadeOut(100); // Time in milliseconds.
    });

    $('#profilePic').on('load', function(){
      // Fade out and hide the loading image.
      $('#loading_profilephoto').fadeOut(100); // Time in milliseconds.
    });


