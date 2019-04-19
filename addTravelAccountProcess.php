<?php
session_start();
include_once 'koneksi.php';

$travel = $_POST['travelName'];
$password = $_POST['password'];
$passwordMD5= md5($password);
echo $passwordMD5;
$address = $_POST['address'];
$phone = $_POST['phone'];
$email=$_POST['email'];
$description=$_POST['description'];
$license = $_POST['license'];
$status=0;
$image_name = $_FILES['image']['name'];
$file_tmp=$_FILES['image']['tmp_name'];
$path='http://192.168.100.5/github/recommendation_haji_service/thumbnail/';
$image=$path.$image_name;

$sql="INSERT INTO tb_travel(travel,`address`, telp, email, `description`, logo, license, status_travel) 
VALUES('$travel','$address','$phone','$email','$description', '$image', '$license', '$status')";
$result = mysqli_query($conn, $sql);
$last_id = $conn->insert_id;
move_uploaded_file($file_tmp,'assets/image/travel/'.$last_id.".jpg");
$imageLogo = $path.$last_id.".jpg";

$sql2="INSERT INTO tb_login(id,username,`password`, `level`) 
VALUES('$last_id','$travel','$passwordMD5', '1')";
$result = mysqli_query($conn, $sql2);

$sql3= "UPDATE tb_travel SET logo='$imageLogo' WHERE id='$last_id'";
mysqli_query($conn, $sql3); 
						
header("location:index.php");
?>