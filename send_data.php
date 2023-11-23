<?php
	include 'koneksi.php';
	$img = $_POST['image'];
	$cap = $_POST['caption'];
	
	date_default_timezone_set('Asia/Jakarta');
	$path = 'images/'.date(format:"d-m-Y-his").'-'.rand(100, 10000).'.jpg';
	
	$query = "INSERT INTO products (image,caption) VALUES ('".$path."','".$cap."')";
	$result = mysqli_query($conn, $query) or die('Error query:  '.$query);
	if ($result == 1){
		file_put_contents($path, base64_decode($img));
		$response["message"]="Success Insert Image";
	}
	else{
		$response["message"]="Failed To Insert Image";
	}
	
	echo json_encode($response);
	mysqli_close($conn);
?>