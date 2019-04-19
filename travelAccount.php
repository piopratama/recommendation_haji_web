<?php
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/detailTravelStyle.css">
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
            <div class="row tableLayout">
            <div class="col-md-4 sidebar">
					<a type="button" href="travelDetail.php" class="btn btn-danger glyphicon glyphicon-arrow-left"></a>
				</div>
				
				<div class="col-md-8 articles">
					<div class="row">
						<div class="col-md-12" style="margin: 10px 0px">
							<form action="addTravelAccountProcess.php" method="POST" role="form" enctype="multipart/form-data">
								<table>
									<tr>
										<td>	
                                            <div class="form-group">
                                                <label for="">Travel Name :</label>
                                                <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="travelName" required="required">
                                            </div>
                                        </td>
									</tr>
                                    <tr>
										<td>	
                                            <div class="form-group">
                                                <label for="">Password :</label>
                                                <input type="password" style="width: 200%; margin-bottom: 5px;" class="form-control" name="password" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>										
										<td>	
                                            <div class="form-group">
                                                <label for="">Address :</label>
                                                <input type="text" style="width: 200%; height:200%; margin-bottom: 5px;" class="form-control" name="address" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>										
										<td>	
                                            <div class="form-group">
                                                <label for="usr">Phone :</label>
                                                <input type="text" style="width: 200%; height:200%; margin-bottom: 5px;" class="form-control" name="phone" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>	
                                            <div class="form-group">
                                                <label for="usr">Email :</label>
                                                <input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="email" id="usr" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td><label for="usr">Description :</label>
										<input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="description" id="usr" required="required"></td>
									</tr>
                                    <tr>
										<td><label for="usr">Licesnse :</label>
										<input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="license" id="usr" required="required"></td>
									</tr>
									<tr>
										<td>
                                            <label for="usr">Image</label>
                                            <input type="file" style="width: 200%; margin-bottom: 10px; height:200%;" class="form-control" name="image" id="usr" required="required">
										</td>
									</tr>
									<tr>
										<td><button type="submit" class="btn btn-success" id="add_item_btn" name=Submit>Submit</button></td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="deleteDetailTravel.php" method="POST">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Delete User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id_delete" id="id_delete" class="form-control" placeholder="id" require="required">
                        </div>
                        <p>Are you sure want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>
		<?php include("./templates/footer.php"); ?>
		<script>
			$(document).ready(function() {
				$("#example").DataTable();

                $("#example").on('click','.deleteDetailTravel', function(){
					$("#id_delete").val($(this).attr('id'));
                    $("#exampleModal2").modal('show');
				});
			});
		</script>
	</body>
</html>


