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
$id=$_POST['id_delete'];
echo $id;
mysqli_query($conn,"DELETE FROM tb_user_booking WHERE id='$id'");
header("location:userDataDeail.php");
 ?>