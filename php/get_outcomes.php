<?php
require_once "classes/db.php";

$db = new Connector();

// Get outcomes
$db->query("select * from logs order by id desc");
$outcomes = $db->resultset();

// Display json
header('Content-Type: application/json');
echo json_encode($outcomes);

 ?>
