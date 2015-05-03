<?php

try {
	$m = new Mongo();
	$db = $m->doors;
	$collection = $db->submissions;
	$id = uniqid();

	if(isset($_POST['pic']))
		addToMongo(array('id'=>$id, 'pic'=>generatePic($_POST['pic'])), $id);
	else
		error_log("No data received");

} catch(MongoConnectionException $e){
	echo "Error Cannot connect to MongoDB.";
}

function generatePic($pic){
	header('Content-Type: image/jpg');

	$bg = imagecreatefromjpeg('/img/door.jpg');
	$img = imagecreatefromstring(base64_decode($pic));

	imagecopymerge($bg, $img, 0, 0, 0, 0, imagesx($bg), imagesy($bg), 75);

	$final = base64_encode(imagejpeg($bg, null, 100));

	error_log($final);

	return $final;
}

function addToMongo($document, $id){
	global $collection;

	$idQuery = array('id' => $id);
	if($collection->find($idQuery)->count() == 0){
		error_log("Added new picture");
		$collection->insert($document);
	}
	else
		error_log("Picture already exists");
}

?>
