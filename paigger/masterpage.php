<?php

// autoload classes
include_once "./class/vendor/autoload.php";

use  paigger\variable\siteUrl as siteUrl;

//--change this based where website folder is located
global $mydomain;

$siteUrl = new siteUrl();

$mydomain = $siteUrl->get_domain_url();

global $head;
global $searchTerm;
global $masterContent;
global $style;

$rightMenuContent;

include "html_form/right_pane_links.php"; // $sidebar_menu is defined here



// store url of current webpage so that user can return to this page after being directed to login page  
$_SESSION["current_url"] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// if user is logged in
if(isset($_SESSION["user_id"]) ) {
    $profile_pic = "image/image_uploads/" .$_SESSION["profile_pic"];
    $fname = $_SESSION["fname"];
    $lname = $_SESSION["lname"];
    $user_id = $_SESSION["user_id"];

    $rightMenuContent = "
        <ul style='margin-top:-3px;'>
            <li><a style=padding:0;>
                    <img src=$profile_pic width=30px height=30px alt=profile-picture >
                </a>
                <ul class='dropDownMenu' >
                    <li><a href=$mydomain/profile.php?user=$user_id >$fname $lname</a></li>
                    <li><a href=$mydomain/mypages.php >My Pages</a></li>
                    <li><a onclick='showDeleteAccountDiv() ' >Delete Account</a></li>
                    <li><a href=$mydomain/function/logout.php >Log out</a> </li>
                </ul>
            </li>
        </ul>  
    ";
} else { // if user is not logged in
    $rightMenuContent = "<a href=$mydomain/login_form.php >Login</a>";
}



$masterContent = <<<EOT
<!DOCTYPE html>
<html>

    <head>
        <title>$title</title>
        <meta charset="UTF-8">
        
        <!--optimise viewing on mobile devices-->
        <meta name="viewport" content="width=device-width, initial-scale=0.9">

        <!--favicon-->
        <link rel="shortcut icon" href="./image/icon/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./image/icon/favicon.ico" type="image/x-icon">
    
        <!--jquery google CDN-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    
        <!--jquery UI google CDN-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
        
        <link href="$mydomain/styles/styles.css" rel="Stylesheet" type="text/css" />
        <link href="$mydomain/styles/paigger_styles.css" rel="Stylesheet" type="text/css" />
                    
        $head
        
        <style type="text/css">
            $style
        </style>
    </head>

    <body>

            
        
        
    <div class="wrapper">
                
            <div class="menu">  
                
                <div class='left_menu_div' >
                
                    <li><a href="./home.php">
                        <img src="$mydomain/image/icon/logo.png" alt="logo" class="site_logo"> 
                        <b>Paigger</b>
                    </a></li>
                    <li class='search_bar'>
                        <form action="search.php" method="GET">
                            <input id='txtSearch' name='txtSearch' type='text' placeholder='Search' value='$searchTerm' maxlength='160' >
                            <input id='btnSearch' type='image' src='./image/icon/search.jpg' alt='Search' disabled>
                        </form>
                    </li>
                    
                </div> <!--left_menu_div-->
                
                <div class='right_menu_div' >	
                    $rightMenuContent 
                </div> <!--right_menu_div-->
                
                            
                
            </div> <!--menu-->
            
        <div class="adjustdiv" ></div>

        <div class="rightpane">
            $sidebar_menu  
        </div><!--rightpane-->

        $MainContent
        
        <div id="deleteAccountDiv" class='dialogBoxDiv' >
            <div class='dialogBoxHeading' >Delete Account</div>
            <p><b>Are you sure you want to delete your account?</b></p>
            <p>This will also delete all content you have created such as your pages, comments, images, etc.
            </p>
            <p><b>Warning: This cannot be undone</b></p>
            
            <input type="password" id="txtDeleteAccountPword" name="txtpword" placeholder="Enter password" required />
            
            <div id='delAccountResultDiv' class='red'></div>
            
            <span style='float:right;' >
                <button id='btnDeleteAccount' >Delete</button>
                <button class='greybutton' onclick='hideDeleteAccountDiv()' >Cancel</button>
            </span>
        </div>
        
        

        <div style="clear:both;"></div>




        
            
        <div id="footer" style="text-align:center;" >
                                
                <p>Copyright © Paigger. All rights reserved</p>
                <p>This website was founded and created by: G.S. Peng</p>
                
        </div> <!--footer-->

    </div> <!--wrapper -->
        
        
    </body>	

    <script type="text/javascript" src="js/func_invisible.js" ></script>
    <script type="text/javascript" src="js/search-script.js" ></script>
    <script type="text/javascript" src="js/delete_user_account.js" ></script>

</html>

EOT;

?>