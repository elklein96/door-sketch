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
	$overlay->readimageblob(base64_decode(preg_replace("(data.*base64,)", "", $pic)));
	
	/*$bottom_image = imagecreatefromjpeg('../img/door.jpg'); 
	$top_image = imagecreatefromstring(preg_replace("(data.*base64,)", "", $pic)); 
	imagesavealpha($top_image, true); 
	imagealphablending($top_image, true); 
	imagecopy($bottom_image, $top_image, 0, 0, 0, 0, imagesx($top_image), imagesy($top_image), 75); 

	ob_start(); 
		imagejpeg($bottom_image);
		$image_data = ob_get_contents(); 
	ob_end_clean(); 

	$output = "data:image/jpg;base64,".base64_encode($image_data);

	imagedestroy($bottom_image);
	imagedestroy($top_image);*/

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
