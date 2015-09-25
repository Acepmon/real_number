<?php

require_once "classes/db.php";

if (!empty($_POST)) {
	
	$object = $_POST['object'];
	$value = $_POST['value'];
	$type = $_POST['type'];
	$speed = $_POST['speed'];
	$al = $_POST['al'];

	$db = new Connector();

	if (strcmp($al, "asset") == 0) {

		$db->query("insert into assets(object, value, type, speed) values (:object, :value, :type, :speed)");
		$db->bind(":object", $object);
		$db->bind(":value", $value);
		$db->bind(":type", $type);
		$db->bind(":speed", $speed);
		$db->execute();

	} else if (strcmp($al, "liability") == 0) {

		$db->query("insert into liabilities(object, value, type, speed) values (:object, :value, :type, :speed)");
		$db->bind(":object", $object);
		$db->bind(":value", $value);
		$db->bind(":type", $type);
		$db->bind(":speed", $speed);
		$db->execute();

	}

}

header("Location: ../");
?>