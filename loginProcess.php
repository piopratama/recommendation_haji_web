<?php
session_start();
if(isset($_POST["username"]) && isset($_POST["password"]))
{
	require 'koneksi.php';

	$usernamed=$_POST["username"];
	$password=$_POST["password"];
	$level=$_POST["level"];

	$sql = "SELECT level FROM tb_login WHERE username=?";
	$stmt = $conn->prepare($sql);
	$stmt->bind_param('s',$usernamed);
	$stmt->execute();
	$stmt->bind_result($level);
	if($row=$stmt->fetch()){}
	$no=1;
	$b=$level;
	$stmt->close();
	if($b=='0'){
		
		$sql = "SELECT id,username FROM tb_login WHERE username = '$usernamed' AND `password`=MD5('".$password."');";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
				$_SESSION["username"]=$usernamed;
				$_SESSION["id_login"]=$row["id"];
				$_SESSION["level_user"]=1;
			}
			$sql1 = mysqli_query($conn, "update tb_employee set online_status='1' where username='$usernamed'");
			header("location:mainMenuAdmin.php");
			}else{
			$_SESSION["message"]="Login Failed";
			header("location:index.php");
			}
	}
	elseif ($b=='1'){
		
		$sql = "SELECT id,username FROM tb_login WHERE username = '$usernamed' AND `password`=MD5('".$password."');";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$_SESSION["username"]=$usernamed;
				$_SESSION["id_login"]=$row["id"];
				$_SESSION["level_user"]=0;
			}
			$sql1 = mysqli_query($conn, "update tb_employee set online_status='1' where username='$usernamed'");
			header("location:mainMenuTravel.php");
		}else{
			$_SESSION["message"]="Login Failed";
			header("location:index.php");
		}
	}
	else
	{
		$_SESSION["message"]="Login Failed";
		header("location:index.php");
	}
	
	$conn->close();

}
else
{
	$_SESSION["message"]="Login Failed";
	header("location:index.php");
}
?>