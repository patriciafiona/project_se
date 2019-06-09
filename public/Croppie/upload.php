<?php

//upload.php
$koneksi	= mysqli_connect('localhost', 'root', '', 'project_se');

if(isset($_POST["image"]))
{
	$data = $_POST["image"];

	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imageName = '../foto/'. time() . '.png';

	file_put_contents($imageName, $data);

	echo '<img src="'.$imageName.'" class="rounded-circle" />';
	
	//Coba masukkin ke dalam database img nya
	$image_name = addslashes($imageName);
	
	//coba masukkin ke database
	
	$sql="	Update users (foto) 
			VALUES ('$image_name')
			WHERE id = ''";
			
	mysqli_query($koneksi,$sql);

}

?>