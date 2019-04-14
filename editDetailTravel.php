<?php
session_start();

$title="Update Detail Travel";

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
$id=$_GET['id'];
$data = mysqli_query($conn, "SELECT * from tb_packet WHERE id='$id'")
?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/jquery.dataTables.min.css">
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
                <div class="col-md-4" style="margin: 10px 0px">
                    <a type="button" class="btn btn-danger glyphicon glyphicon-arrow-left" href="travelDetail.php" style="margin:0 5px 10px 0"></a>
                    <?php while($d=mysqli_fetch_array($data)){?>
                    <form action="updateDetailTravel.php" method="POST" role="form" id="directPay_div">
                        <table>
                            <tr>
                                    
                                    <td>	<div class="form-group" hidden="true">
                                        <label for="usr">id :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="id" id="usr" value="<?php echo$d['id'];?>">
                                    </div></td>
                                </tr>
                                <tr>
                                    
                                    <td>	<div class="form-group">
                                        <label for="usr">Packet :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="packet" id="usr" value="<?php echo$d['packet'];?>">
                                    </div></td>
                                </tr>
                                <tr>
                                    
                                    <td>	<div class="form-group">
                                        <label for="usr">Date Start :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="date_start" id="usr" value="<?php echo $d['date_start'];?>">
                                    </div></td>
                                </tr>
                                <tr>
                                    
                                    <td>	<div class="form-group">
                                        <label for="usr">Date End :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 5px;" class="form-control" name="date_end" id="usr" value="<?php echo $d['date_end'];?>">
                                    </div></td>
                                </tr>
                                <tr>
                                    
                                    <td>	<div class="form-group">
                                        <label for="usr">Type :</label>
                                        <select class="form-control myItem2" name="type" style="width: 200%;">
                                            <option value="haji">haji</option>
                                            <option value="umroh">umroh</option>
										</select>
                                    </div></td>
                                </tr>
                                <tr>
                                    
                                    <td><label for="usr">Price :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="price" id="usr" value="<?php echo $d['price'];?>"></td>
                                </tr>
                                <tr>
                                    
                                    <td><label for="usr">Description :</label>
                                        <input type="text" style="width: 200%; margin-bottom: 10px;" class="form-control" name="description" id="usr" value="<?php echo $d['description'];?>"></td>
                                </tr>

                                <tr>
                                    <td><button type="submit" class="btn btn-success" id="add_item_btn" name=Submit>Submit</button></td>
                                </tr>                          
                        </table>
                    </form>
                    <?php }?>
                </div>
            </div>
		</div>