<?php

require 'dbc.php';

$id = $_GET['id'];

$sql = sprintf("SELECT * FROM items where itm_id = %d ", $id);
$query = mysql_query( $sql );
$result = mysql_fetch_row($query);

if($result)
{
	echo json_encode($result);
} else {
	echo json_encode(array('Error' => 'Item not found'));
}


?>