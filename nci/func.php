<?php
require_once "nci/session.php"; 
require_once "nci/dbc.php";


function category_tree( $parent = 0 ){
    echo "<ul>";
    $sql = sprintf("SELECT * FROM categories where cat_parent_id = %d order by cat_order asc", $parent);
    $r = mysql_query( $sql );
    while($rs = mysql_fetch_array($r) ){
        	$item = sprintf("<li> <a href = 'listing.php?id=%s' >%s</a> </li>", $rs['cat_id'] , $rs['cat_name']);
        echo $item;
        category_tree( $rs['cat_id']);
    }
    mysql_free_result( $r );
    echo "</ul>";
}

// Add single item to session
function add_single_item($item)
{
	if (is_array($item))
	{
		$name = $item[0];
		$price = $item[1];
		$desription = $item[2];
		
	} else {
		return 'Not valid';
	}
}

?>