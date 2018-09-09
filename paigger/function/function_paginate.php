<?php
function paginate($page, $total, $per_page) {
    if(!is_numeric($page)) { $page = 1; }
    if(!is_numeric($per_page)) { $per_page = 10; }
    if($page > ceil($total / $per_page)) $page = 1;
    if($page == "" || $page == 0) { 
        $page = 1;
        $start = 0;
        $end = $per_page;
    } else {
        $start = ($page * $per_page) - ($per_page); // first item on the particular page
        $end = $start + $per_page; // last item on the particular page
    }

    $prev_page = "";
    $next_page = "";
    $all_pages = array();
    $selected = "";
    $enabled = false;

    if($total > $per_page) {
        $enabled = true;
        $prev = $page - 1;
        $prev_page = ($prev == 0) ? 0 : $prev;

        $next = $page + 1;
        $total_pages = ceil($total/$per_page);

        $next_page = ($next <= $total_pages) ? $next : 0;

        for($x=1;$x<=$total_pages;$x++) {
            $all_pages[] = $x;
            $selected = ($x == $page) ? $x : $selected; 
        }
    }

    return array(
        "per_page" => $per_page,
        "page" => $page,
        "prev_page" => $prev_page,
        "all_pages" => $all_pages,
        "next_page" => $next_page,
        "selected" => $selected,
        "first" => $start,
        "last" => $end,
        "enabled" => $enabled
    );
}

// example: we are in page 2, we have 50 items, and we're showing 10 per page
//so call this function by paginate(2, 50, 10));
/* this will return:

 Array
(
    [per_page] => 10
    [page] => 2
    [prev_page] => 1
    [all_pages] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => 4
            [4] => 5
        )
    [next_page] => 3
    [selected] => 2
    [first] => 10
    [last] => 20
    [enabled] => 1
)
 */

?>
	
	
	
	
		
		

