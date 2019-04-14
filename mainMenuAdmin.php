<?php 
session_start(); 
$title="Main Menu Travel";
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
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/mainMenuStyle.css">
	<body>		
		<div class="container-fluid">
			<nav class="navbar navbar-default" role="navigation">
				<div class="row navLayout">
					<div class="col-md-11">
						<h1>Recommendation Haji</h1>
					</div>
					<div class="col-md-1">
						<a type="button" class="btn btn-danger" style="margin: 10px; padding: 10px;" href="logout.php">Logout</a>
					</div>
				</div>
			</nav>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<a href="travelAdmin.php"><button type="button" class="btn btn-default mainMenu">Travel Admin</button></a>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
		<?php include("./templates/footer.php"); ?>
		<script>
			$(document).ready(function() {
				
			});
		</script>
	</body>
</html>