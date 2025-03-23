<!DOCTYPE html>
<html lang="en">


<head>
  <?php include("php_include/head.php");?>
</head>

<body>



    <!--Main wrapper start-->
    <div id="main-wrapper">

        
        <?php include("php_include/header.php");?>
        
        <?php include("php_include/side_menu.php");?>
        <!--Sidebar end-->

        <!--Content body start-->
        <div class="content-body">
            <div class="container-fluid">
				
				
				<div class="row page-titles mx-0">
					<div class="col-sm-6 p-md-0">
						<div class="welcome-text">
							<h4>Edit Password</h4>
						</div>
					</div>
					
				</div>                <!-- row -->
                <div class="row">
                    
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">Edit Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="edit_trn.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="password" name="old_password" class="form-control" placeholder="Old Password" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="password" name="new_password" class="form-control" placeholder="New Password" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Edit">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					                    <?php
                    							if(isset($_POST['submit'])){
                    								$userid=$_POST['userid'];
                    								$old_password=$_POST['old_password'];
                    								$new_password=$_POST['new_password'];
                    								$confirm_password=$_POST['confirm_password'];
                    								
                    								if($confirm_password==$new_password){
                    									$sql_check=mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$userid' AND `trn_password`='$old_password'");
                    									$num=mysqli_num_rows($sql_check);
                    									if($num>=1){
                    										$up=mysqli_query($con,"UPDATE `user` SET  `trn_password`='$new_password' WHERE `email`='$userid'");
                    										echo '<script>alert("Password Changed Successful.");window.location.assign("index.php");</script>';
                    									}else{
                    										echo '<script>alert("Old Password does not match.");window.location.assign("edit_trn.php");</script>';
                    									}
                    								}else{
                    										echo '<script>alert("New Password and Conform Password Should Match!!!.");window.location.assign("edit_trn.php");</script>';
                    								}
                    							}
                                           ?>
                </div>
            </div>
        </div>
        <!--Content body end-->


       <!--Footer start-->
       <?php include("php_include/footer.php");?>
        <!--Footer end-->

        

        
    </div>
    
    <!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
	<script src="js/deznav-init.js"></script>
	<script src="js/demo.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>

</html>