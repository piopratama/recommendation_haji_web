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
							<form action="addTravelDetailProcess.php" method="POST" role="form" enctype="multipart/form-data">
								<table>
									<tr>
										<td>	
                                            <div class="form-group">
                                                <label for="">Packet :</label>
                                                <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="packet" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>										
										<td>	
                                            <div class="form-group">
                                                <label for="">Date Start :</label>
                                                <input type="date" style="width: 200%; height:200%; margin-bottom: 5px;" class="form-control" name="dateStart" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>										
										<td>	
                                            <div class="form-group">
                                                <label for="usr">Date End :</label>
                                                <input type="date" style="width: 200%; height:200%; margin-bottom: 5px;" class="form-control" name="dateEnd" required="required">
                                            </div>
                                        </td>
									</tr>
									<tr>
										<td>	
                                            <div class="form-group">
                                                <label for="usr">Type</label>
                                                <select class="form-control myItem2" name="type" style="width: 200%;" require="required"> 
                                                    <option value="haji">haji</option>
                                                    <option value="umroh">umroh</option>
                                                </select>
                                            </div>
                                        </td>
									</tr>
									<tr>
										
										<td>
                                            <label for="usr">Price :</label>
                                            <input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="price" id="usr" required="required">
                                        </td>
									</tr>
									<tr>
										<td><label for="usr">Description</label>
										<input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="description" id="usr" required="required"></td>
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


