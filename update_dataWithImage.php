<?php
	include 'koneksi.php';
	$id		= $_POST['id'];
	$img 	= $_POST['image'];
	$cap 	= $_POST['caption'];
	
	date_default_timezone_set('Asia/Jakarta');
	$path = 'images/'.date(format:"d-m-Y-his").'-'.rand(100, 10000).'.jpg';
	
	$data = mysqli_query($conn,"SELECT * FROM products WHERE id='$id'");
	$d 	  = mysqli_fetch_array($data);
	unlink($d['image']);
	
	$query = "UPDATE products SET image='".$path."', caption='".$cap."' WHERE id='".$id."'";
	$result = mysqli_query($conn, $query) or die('Error query:  '.$query);
	if ($result == 1){
		file_put_contents($path, base64_decode($img));
		$response['message']="Success Update";
	}
	else{
		$response['message']="Failed Update";
	}
	echo json_encode($response);
	mysqli_close($conn);
?>