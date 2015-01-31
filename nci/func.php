<?php
require_once "nci/session.php"; 
require_once "nci/dbc.php";


function category_tree( $parent = 0 ){
    $sql = sprintf("SELECT * FROM categories where cat_parent_id = %d order by cat_order asc", $parent);
    $r = mysql_query( $sql );
    while($rs = mysql_fetch_array($r) ){
        $sqlcnt = sprintf("SELECT count(1) as cnt FROM categories where cat_parent_id = %d order by cat_order asc", $rs['cat_id']);
        $cnt = mysql_fetch_array(mysql_query( $sqlcnt ));
            if($cnt['cnt'] <> 0){
                echo "<li class='active dropdown-tree open-tree'>";
                echo "<a class='dropdown-tree-a'><span class='badge pull-right'>42</span>".$rs['cat_name']."</a>";
                echo "<ul class='category-level-2 dropdown-menu-tree'>";

            }
            else{
                $item = sprintf("<li> <a href = 'list.php?id=%s' >%s</a> </li>", $rs['cat_id'] , $rs['cat_name']);
                echo $item;
            }   	
        category_tree( $rs['cat_id']);

    
    }
        echo "</ul></li>";

    mysql_free_result( $r );

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


//get page url

function get_url() {
 $pageURL = 'http';
 if (isset($_SERVER["HTTPS"])) {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}


//get ip of user
function get_ip(){
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
return $ip;
}

//log_page
function log_page($ip,$url,$pname,$camefrom){
mysql_query("INSERT INTO `page_log` (`page_name`, `user_ip`, `page_url`,`log_time`,`user_came_from`) VALUES ('$pname', '$ip', '$url',now(),'$camefrom')");
}

//get user came from

function user_came_from(){
if(isset($_SERVER['HTTP_REFERER'])){
    $camefrom = $_SERVER['HTTP_REFERER'];
}
else{
    $camefrom= "none";
}
return $camefrom;
}





//multi files get into array
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}
?>