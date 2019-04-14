<?php
session_start();

$title="Travel Detail";

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
$user = mysqli_query($conn, "SELECT tb_user_packet.id, `name`, packet, tb_user_packet.description, status_book FROM tb_user_packet INNER JOIN tb_user ON tb_user_packet.id_user=tb_user.id 
INNER JOIN tb_packet ON tb_user_packet.id_packet=tb_packet.id");
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
                <table id="example" class="table table-bordered" style="width: 100%">
                <h1>Edit Travel Ditail</h1>

                    <a type="button" class="btn btn-danger glyphicon glyphicon-arrow-left" href="mainMEnuTravel.php" style="margin:0 5px 10px 0"></a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Packet</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach($user as $data) {?>
                        <tr>
                            <td><?php echo $no;?></td>
                            <td><?php echo $data["name"];?></td>
                            <td><?php echo $data["packet"];?></td>
                            <td><?php echo $data["description"];?></td>
                            <td><?php 
                            if($data["status_book"]==0)
                            {
                               echo ("Waiting Approvment"); 
                            }
                            else
                            {
                                echo("Approved");
                            }
                            
                            ?></td>
                            <td>
                                <button class="btn btn-danger deleteStatusUser" id="<?php echo $data['id']; ?>"><span class="glyphicon glyphicon-trash"></span></button>
                                <a type="button" class="btn btn-success" href="userDataDetail.php?id=<?php echo $data['id']?>">Detail</a>
                            </td>
                        </tr>
                        <?php $no++;}?>
                    </tbody>
                </table>
			</div>
		</div>
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="deleteStatusUser.php" method="POST">
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

                $("#example").on('click','.deleteStatusUser', function(){
					$("#id_delete").val($(this).attr('id'));
                    $("#exampleModal2").modal('show');
				});
			});
		</script>        
	</body>
</html>