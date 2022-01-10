<?php
require_once "database/studentManager.php";
$id = $_GET['id'];
Delete($id);
die();

?>