<?php

require_once "classes/db.php";

$db = new Connector();

// Get incomes
$db->query("select * from income order by id desc");
$incomes = $db->resultset();

// Display json
header('Content-Type: application/json');
echo json_encode($incomes);

 ?>
