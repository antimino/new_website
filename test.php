<?php 
require "class/class.sql.php";
$SQL=new Database();
$result = $SQL->query("SELECT * FROM users");
var_dump($result);