<?php
session_start();
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
include "koneksi.php";
$id=$_GET['id'];
echo $id;
mysqli_query($conn,"UPDATE tb_user_booking SET `status`=1 WHERE id='$id';");
header("location:userDataDetail.php");
 ?>