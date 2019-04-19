<?php
session_start();

$title="Travel Detail";
$id_login=$_SESSION["id_login"];
if(empty($_SESSION['username'])){
	header("location:index.php");
}
else
{
	if(!empty($_SESSION['level_user']))
	{
		if($_SESSION["level_user"]==1)
		{
			header("location:index.php");
		}
	}
}
include_once 'koneksi.php';

$packet = $_POST['packet'];
$dateStart = $_POST['dateStart'];
$dateEnd = $_POST['dateEnd'];
$type=$_POST['type'];
$price=$_POST['price'];
$description=$_POST['description'];

$sql="INSERT INTO tb_packet(id_travel ,packet,date_start, date_end, `type`, price, `description`) VALUES('$id_login','$packet','$dateStart','$dateEnd','$type','$price', '$description')";
$result = mysqli_query($conn, $sql);

								
header("location:travelDetail.php");
?>