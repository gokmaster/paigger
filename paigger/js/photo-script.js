

    // Update Cover/profile Photo
    function useThisPhoto(image_element) {

            var src = $(image_element).attr('src').split('/');
            var filename = src[src.length - 1];
            //var img_url = "image/image_uploads/" + filename ;
            
            // updatephoto is declared in func_photo.js
            if (updatephoto == 'coverphoto') {
                    $.post("function/updateCoverPhoto.php", { imagefile: filename},
                            function(){ 
                            // refresh div (>*"," prevents nested div) (space before # is needed)
                            $("#coverphotoDiv").load(document.URL + " #coverphotoDiv>*",""); 
                            // Show the loading image.
                            $('#loading_coverphoto').show();
                            } 
                    ); //post
            }
            else if (updatephoto == 'profilephoto') {
                    $.post("function/updateProfilePhoto.php", { imagefile: filename},
                            function(){ 
                            // refresh div (>*"," prevents nested div) (space before # is needed)
                            $("#coverphotoDiv").load(document.URL + " #coverphotoDiv>*",""); 
                            // Show the loading image.
                            $('#loading_profilephoto').show();
                            } 
                    );	//post
            }


            $("#photoUpdateDiv").hide();
    }



