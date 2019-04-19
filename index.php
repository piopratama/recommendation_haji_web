<?php 
session_start(); 
$title="Login";
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<body>		
		<div class="container" style="padding-top: 10%;">
			<div class="row">
				<div class="col-md-4">	
				</div>
				<div class="col-md-4" id="container-form">
					<form action="loginProcess.php" method="POST" role="form">
						<legend>Login</legend>
					
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" name="username" class="form-control" id="username" placeholder="Username" required="required">
						</div>
						
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="required">
						</div>
						<!-- <div class="form-group">
							<label>Level</label>
							<select name="level" class="form-control">
								<option value="admin">Admin</option>
								<option value="casier">Casir</option>
								
							</select>
						</div> -->	
						<a type="button" href="travelAccount.php" type="button" class="btn btn-success">Create Travel Account</a>
						<button type="submit" class="btn btn-primary">Login</button>
					</form>	
				</div>
				<div class="col-md-4">
					
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel2">Warning</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Login Failed.</p>
					<p>Please check your username and password are correct</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
        </div>
		
		<?php 
			$session_value=(isset($_SESSION['message']))?$_SESSION['message']:'';
			unset($_SESSION['message']);
		?>
		<?php include("./templates/footer.php"); ?>
		<script>
			$(document).ready(function() {
				var message='<?php echo $session_value;?>';
				if(message!="")
				{
					$("#exampleModal2").modal('show');
				}
			});
		</script>
	</body>
</html>