<?php

if(isset($_POST['img'])){

    $data = $_POST['img'];
    $data = str_replace('data:image/png;base64,', '', $data);
    $data = str_replace(' ', '+', $data);
    $data = base64_decode($data);

    $file = 'img/submissions/'. uniqid() . '.png';
    $success = file_put_contents($file, $data);
}

else
	error_log("No data received");
?>