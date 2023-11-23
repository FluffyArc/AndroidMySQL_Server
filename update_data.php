<?php
	include 'koneksi.php';
	$id		= $_POST['id'];
	$cap 	= $_POST['caption'];
	
	$query = "UPDATE products SET caption='".$cap."' WHERE id='".$id."'";
	$result = mysqli_query($conn, $query) or die('Error query:  '.$query);
	if ($result == 1){
		$response['message']="Success Update";
	}
	else{
		$response['message']="Failed Update";
	}
	echo json_encode($response);
	mysqli_close($conn);
?>