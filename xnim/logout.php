<?php
require_once "../nci/session.php";
session_destroy();
header("Location: index.php");
?>
