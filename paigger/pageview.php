<?php
    if(!isset($_SESSION)){session_start();}
		
  //Buffer larger content areas like the main page content
  ob_start();
  
	//retrieve file containing database connection
	require_once "function/dbconn.php";
?>

<div class="content">
	
    <?php	
    $any_error = "no"; // Error relating to permission to view page
    $grp_id = "";
    $page_id = "";

    if(isset($_GET["pageid"]) )
    {
            $page_id = $_GET["pageid"];

            require_once "function/page_functions.php";

            $page_audience = page_audience($page_id);

            //--------- who has permission to view this page --------- 
            if ( $page_audience == "only me") {

                    // if page don't belong to user
                    if (!page_belongs_to_user($page_id) ) {
                            echo "<span class=red >You do not have permission to view this page.</span>" ;
                            $any_error = "yes";
                    } // if !page_belongs_to_user

            } else // if $page_audience is a group-id number
            if (is_numeric($page_audience) ) {

                    $logged_in_user = $_SESSION["user_id"];
                    $grp_id = $page_audience;

                    require_once "function/group_functions.php";

                    $group_privacy = fetch_group_privacy($grp_id);
                    $page_audience = fetch_group_name($grp_id);

                    if ($group_privacy == "closed") {

                            // if user is not a group member
                            if (!user_is_grp_member($grp_id,$logged_in_user) ) {
                                    // if page don't belong to user
                                    if (!page_belongs_to_user($page_id) ) {				
                                            echo "<span class=red >You do not have permission to view this page.</span>" ;
                                            $any_error = "yes";
                                    }
                            }
                    } // if $group_privacy

            } // if is_numeric($page_audience)

            //---------END-------who has permission to view this page---------



            if ($any_error == "no") {
                    // get page content from database
                    // prepare and bind
                    $stmt = mysqli_prepare($con, "SELECT content,page_title,page_date,user_id FROM page WHERE pageid = ? ");
                    mysqli_stmt_bind_param($stmt, "i", $page_id); //s = string, d = double, i = integer

                    // execute query
                    mysqli_stmt_execute($stmt);

                    // store result (this is needed in order for longtext field to not be empty when binded to variable)
                    mysqli_stmt_store_result($stmt);

                    //bind the result of that query to variables
                    mysqli_stmt_bind_result($stmt, $pagecontent,$pagetitle,$pagedate,$user_id);

                    $count = 0;

                    while (mysqli_stmt_fetch($stmt)) {
                            $count = $count + 1;

                            // date is converted to desired format
                            include_once "function/formatted_date_function.php";
                            $formatted_date = format_date($pagedate);

                            echo "
                            <div class=page > ";

                            if (page_belongs_to_user($page_id) ) {
                                    echo "
                                    <input id=btnMorePageOptions class=btnMoreOptions type=image src=image/icon/downarrow.gif alt='More options' title='More options' >
                                    <div id=moreOptionsDiv class=hiddenDropMenu >
                                            <button onclick=window.location.href='pagecreate.php?pageid=$page_id' >Edit Page</button> <br>
                                            <button onclick=showDeletePageDialogBox() >Delete Page</button>
                                    </div>";
                            }

                            echo "
                                    <h1 class=pagetitle >$pagetitle</h1>
                                    $pagecontent
                                    <div style=clear:both; ></div>
                            </div>
                            ";

                            require_once "function/user_info_functions.php";

                            $fname = fname($user_id);
                            $lname = lname($user_id);
                            $profile_pic = profile_pic($user_id);

                            echo "
                            <div class=page > 
                                    <span class=smalltext style='float:right;' >Shared with: ";

                                            // if group-id is a number, 
                                            //that would mean that $grp_id which was initially equal to "" 
                                            // is now equal to a group-id number, thus meaning that the page audience is a group
                                            // and therefore it is hyperlinked to its group-page.
                                            if (is_numeric($grp_id) ) {
                                                    echo "<a href=group.php?grp_id=$grp_id >". ucfirst($page_audience) ."</a>";
                                            } else {
                                                    echo ucfirst($page_audience);
                                            }
                            echo "
                                    </span>
                                    <span class=smalltext>$formatted_date</span> <br>
                                    <a href=profile.php?user=$user_id ><img src=image/image_uploads/$profile_pic class=medium_profile_pic  alt=profile-picture ></a>
                                    <a href=profile.php?user=$user_id class=smalltext >$fname $lname</a><br>
                                    <input type=hidden id=hidden_input value=$user_id >
                            ";

                            echo "
                                    <span id=followers class=smalltext>";

                                    // follow button
                                    require_once "function/check_follow.php";	

                                            // number of followers
                            echo "
                                            <span class=spnFollow >$num</span>
                                    </span>";

                                    // -----------page like button--------------
                                    include_once "function/likes_functions.php";

                                    if (!already_liked($page_id)) {
                                            $num_pagelikes = num_likes($page_id);
                                            // like_page() function is located in js/like-script.js
                                            echo "
                                            <div id='likes_div' class='float_right_div' >
                                                    <input onclick='like_page($page_id)' id='btnLike' class='like_button grey_img' type='image' alt='Like' title='Like' src='image/icon/like.png' /> $num_pagelikes
                                            </div>	
                                            ";
                                    } else {
                                            $num_pagelikes = num_likes($page_id);
                                            // unlike_page() function is located in js/like-script.js
                                            echo "
                                            <div id='likes_div' class='float_right_div' >
                                                    <input onclick='unlike_page($page_id)' id='btnUnlike' class='like_button' type='image' alt='Liked' title='You liked this' src='image/icon/like.png' /> $num_pagelikes
                                            </div>	
                                            ";
                                    }
                                    // -----------page like button---End--------------

                            echo "
                                    <div style=clear:both; ></div>";

                            echo "
                            </div>"; // class=page 


                    } // outer while loop

                    if ($count == 0) {
                            echo "Invalid page";
                    }





                    mysqli_stmt_close($stmt);
                    mysqli_close($con);

            } // if $any_error


            // deletePageDiv
            if (page_belongs_to_user($page_id) ) {
                    echo "
                    <div id='deletePageDiv' class='dialogBoxDiv' >
                            <div class='dialogBoxHeading' >Delete Page</div>

                            <p>Are you sure you want to delete this page?</p><br>

                            <span style='float:right;' >
                                     <button onclick='deletePage()' >Delete</button>
                                     <button class='greybutton' onclick='hideDeletePageDialogBox()' >Cancel</button>
                             </span>

                    </div>
                    ";
            }

    } else {
            echo "Error: Page not found.";
    }

    include "html_form/comment_editor.php";
    ?>

    <div class='deleteCommentDiv dialogBoxDiv' ></div>

    <div id='commentSection'>
    <?php
            include "function/comments.php";
    ?>
    </div>

</div> <!-- class=content -->



<input type='hidden' id='hidden_pageid' value=<?php echo $page_id; ?> > 
<script type="text/javascript" src="js/invisible_pageview.js" ></script>


<?php
	  //Assign all Page Specific variables
	  $MainContent = ob_get_contents();
	  ob_end_clean();
	  $title = "$pagetitle";
	  
	  $head = "
	  <link href=$editor_styles rel='Stylesheet' type='text/css' />
	"; // $editor_styles is declared in html_form/comment_editor.php
	  
	 $style = "
		
	";
	    

	  
	  //Apply the template
      include("masterpage.php");
      echo $masterContent; // defined in masterpage.php
?>