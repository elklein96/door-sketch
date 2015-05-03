<?php

try {
	$m = new Mongo();
	$db = $m->doors;
	$collection = $db->submissions;

	if(isset($_POST['pic']))
		addToMongo($_POST['pic'], uniqid());
	else
		error_log("No data received");

} catch(MongoConnectionException $e){
	echo "Error Cannot connect to MongoDB.";
}

function addToMongo($document, $id){
	global $collection;

	error_log($document);

	$idQuery = array('id' => $id);
	if($collection->find($idQuery)->count() == 0){
		error_log("Added new picture");
		$collection->insert(json_decode($document));
	}
	else
		error_log("Picture already exists");
}

?>
