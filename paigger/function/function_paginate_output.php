<?php
// $paginate is an array
function paginate_output($paginate, $total, $per_page) {
    if ($total > 0) {
        if ($total > $per_page) {

            if ($paginate['first'] != 0) {
                $page_to_show = $paginate['prev_page'];
                //previous
                echo "<a onclick='show_my_images($page_to_show)' title='Previous'>&nbsp <<- &nbsp</a> &nbsp";
            }


            $last_num = $paginate['page'] + 3; // last page to be be displayed on paginate list
            if (count( $paginate['all_pages'] ) < $last_num){
                $last_num = count($paginate['all_pages']);
            } 

            // list starts from three pages before current page
            // e.g. if you are on page 4, then 4-4 = 0; and $paginate['all_pages'][0] corresponds to page 1, which is three pages from page 4
            for ($i=$paginate['page']-4; $i<$last_num; $i++){
                if ($i< 0) {  
                    $i = 0; // list cannot start from a negative page, so set $i to 0 which corresponds to page 1. 
                } 
                $page_number = $paginate['all_pages'][$i];
                if ( $page_number != $paginate['page'] ){ //if not equal to current page you are viewing
                    echo "<a onclick='show_my_images($page_number)'>&nbsp $page_number &nbsp</a>";
                }else {
                    echo "<span class=paginate_selected >&nbsp $page_number &nbsp</span>";
                }
            }

            if ($paginate['last'] < $total) {
                $page_to_show = $paginate['next_page'];
                //next
                echo "&nbsp <a onclick='show_my_images($page_to_show)' title='Next'>&nbsp ->> &nbsp</a>";
            }

        }//if ($total > $per_page)
    }
       
} //function




?>
	
	
	
	
		
		

