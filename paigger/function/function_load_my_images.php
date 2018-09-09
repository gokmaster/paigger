<?php
function load_my_images($onclick_command) {
    
   

    //retrieve file containing database connection
    include "./dbconn.php";
    
    $paginate = array();
    $total_img = 0;
    
    if(isset($_SESSION["user_id"]) )
    {
        $user_id = $_SESSION["user_id"];

        //-------------Get total images that belong to a user----------------------------
        // mysqli prepared statements is used to prevent sql injection
        // prepare and bind
        $stmt = mysqli_prepare($con, "SELECT count(id) FROM p_images WHERE user_id = ? ORDER BY upload_date DESC");
        mysqli_stmt_bind_param($stmt, "i", $user_id); //s = string, d = double, i = integer

        // execute query
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        //bind the result of that query to variables
        mysqli_stmt_bind_result($stmt, $num);

        mysqli_stmt_fetch($stmt);

        $total_img = $num;

        mysqli_stmt_close($stmt);

        //-----------------------------------------------------------------------
        include_once './function_paginate.php';
        $current_page = isset($_POST['pageNumber']) ? $_POST['pageNumber'] : '';
        $per_page = 10;
        $paginate = paginate($current_page, $total_img, $per_page);
        
        $start_from = $paginate['first'];

        // mysqli prepared statements is used to prevent sql injection
        // prepare and bind
        // $start_from starts from the next record e.g. if $start_from = 10, it will start from record 11.
        $stmt = mysqli_prepare($con, "SELECT filename FROM p_images WHERE user_id = ? ORDER BY upload_date DESC LIMIT $start_from, $per_page");
        mysqli_stmt_bind_param($stmt, "i", $user_id); //s = string, d = double, i = integer

        // execute query
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);

        //bind the result of that query to variables
        mysqli_stmt_bind_result($stmt, $imagefile);

        $rowCount = mysqli_stmt_num_rows( $stmt );

        if ($rowCount > 0) {
            while (mysqli_stmt_fetch($stmt)) {
                    echo "
                    <input type=\"image\"  onclick=$onclick_command  
                            class='image_preview' alt=image-preview src=\"image/image_uploads/$imagefile\" >
                    ";
            }
        } else { echo "No images have been uploaded previously.";}

        mysqli_stmt_close($stmt);
        mysqli_close($con);
   
    
        echo "
        <div class='paginate_div'>
            <hr>";

            include_once './function_paginate_output.php';
            paginate_output($paginate, $total_img, $per_page); // echo out paginate list

        echo "
            <hr>
        </div>";
    
    } //if
    
}// function
?> 

