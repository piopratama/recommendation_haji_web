<?php
session_start();
if(empty($_SESSION['username'])){
	header("location:index.php");
}
else
{
	if(!empty($_SESSION['level_user']))
	{
		if($_SESSION["level_user"]==0)
		{
			header("location:index.php");
		}
	}
}
include "koneksi.php";
$id=$_GET['id'];
echo $id;
mysqli_query($conn,"UPDATE tb_travel SET status_travel=1 WHERE id='$id';");
header("location:travelAdmin.php");
 ?>