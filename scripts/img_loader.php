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
	$overlay = new Imagick();
	$image = new Imagick('../img/door.jpg');

	error_log($pic);

	$overlay->readimageblob(base64_decode(preg_replace("(data.*base64,)", "", $pic)));
	$overlay->setImageColorspace(Imagick::COLORSPACE_SRGB);
	$image->setImageColorspace(Imagick::COLORSPACE_SRGB); 
	$image->compositeImage($overlay, Imagick::COMPOSITE_CLEAR, 0, 0);

	$output = "data:image/jpg;base64,".base64_encode($image->getImageBlob());

	$overlay->destroy();
	$image->destroy();

	error_log($output);
	return $output;
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
