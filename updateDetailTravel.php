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

include 'koneksi.php';
$id=$_POST['id'];
$packet=$_POST['packet'];
$date_start=$_POST['date_start'];
$date_end=$_POST['date_end'];
$type=$_POST['type'];
$price=$_POST['price'];
$description=$_POST['description'];

$sql= "UPDATE tb_packet SET packet='$packet', date_start='$date_end', `type`='$type',price='$price',`description`='$description' WHERE id='$id'";

mysqli_query($conn, $sql); 
//echo $sql;
header("location:travelDetail.php");
?>