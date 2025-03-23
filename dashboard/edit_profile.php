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
							<h4>Edit Profile</h4>
						</div>
					</div>
					
				</div>                <!-- row -->
                <div class="row" >
                    
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="edit_profile.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="email" name="email" class="form-control" placeholder="Your E-mail" style="back" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="mobile" class="form-control" placeholder="Your Mobile Number" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="address" class="form-control" placeholder=" Address" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="city" class="form-control" placeholder=" City" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="state" class="form-control" placeholder=" State" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="pincode" class="form-control" placeholder=" Pincode" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="aadhaar_no" class="form-control" placeholder=" Aadhar Number" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="pan_no" class="form-control" placeholder="Pan Card Number" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
											<label for="files">Your Pic</label>
                                            <input type="file" name="image" id="files" class="form-control" placeholder="Your Image " required>
                                            </div>
                                        </div>

										
                                        
                                        <div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
								<?php 
									if(isset($_POST['submit'])){
										
										$userid=$_POST['userid'];
										$email=$_POST['email'];
										$mobile=$_POST['mobile'];
										$address=$_POST['address'];
										$city=$_POST['city'];
										$state=$_POST['state'];
										$pincode=$_POST['pincode'];
										$aadhaar_no=$_POST['aadhaar_no'];
										$pan_no=$_POST['pan_no'];
										$image=$_FILES["image"]["name"];
											$extensions=array('image/jpg','image/jpeg','image/png');
										
										$newname = $image;  
										$target = 'aadhaar_pan/'.$newname;
										move_uploaded_file( $_FILES['image']['tmp_name'], $target);
										$query=mysqli_query($con,"SELECT * FROM `income` WHERE `aadhaar_no`='$aadhaar_no'");
									if($row=mysqli_num_rows($query)==0){	
									$query=mysqli_query($con,"UPDATE `user` SET `email1`='$email',`mobile`='$mobile',`address`='$address',`city`='$city',`state`='$state',`pincode`='$pincode',`aadhaar`='$aadhaar_no',`image`='$image',`pan`='$pan_no' WHERE `email`='$userid'");
										$query=mysqli_query($con,"UPDATE `income` SET `aadhaar_no`='',`pan_no`='' WHERE `email`='$userid'");
										
									}else{
											echo"<script>alert('This Mobile Already used');window.location.assign('edit_profile.php');</script>";
									}
										echo"<script>alert('Update Successful');window.location.assign('edit_profile.php');</script>";
									}
									function mobile_check($mobile){
								global $con;
								
								$query =mysqli_query($con,"select * from user where userid='$userid'");
								if(mysqli_num_rows($query)>0){
									return false;
								}
								else{
									return true;
								}
							}
								?>
                            </div>
                        </div>
					</div>
					
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">My Profile</h4>
                            </div>
                            <div class="card-body">
								<?php
                                    $userid = $_SESSION['userid'];
                                    					if($con){
                                    
                                    						$query = "SELECT * FROM user where email='$userid'";
                                    							$res = mysqli_query($con, $query);
                                    
            								if(mysqli_num_rows($res)>0){
            									$x=mysqli_fetch_assoc($res);
            										
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Profile Pic:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['image'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Name:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['name'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Mobile Number:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['mobile'].' '."</font>".' '."</b>".' '.'</h6>';
            										echo "<h6><font color='#2b3d51' face='Arial Black'>Email:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['email'].' '."</font>".' '."</b>".' '.'</h6>';
            										echo "<hr>";
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Address:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['state'].' '."</font>".' '."</b>".' '.'</h6>';
            								echo "<h6><font color='#2b3d51' face='Arial Black'>City:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['city'].' '."</font>".' '."</b>".' '.'</h6>';
            								echo "<h6><font color='#2b3d51' face='Arial Black'>Pincode:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['pincode'].' '."</font>".' '."</b>".' '.'</h6>';
            									
            										echo "<hr>";
            										echo "<h6><font color='#2b3d51' face='Arial Black'>Aadhaar:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['aadhaar'].' '."</font>".' '."</b>".' '.'</h6>';
            								
            									echo "<h6><font color='#2b3d51' face='Arial Black'>PAN NUMBER:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['pan'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<hr>";
            									
            								
            										
            								
            									
                                    			}
                                    		}
                                    ?>
								
                            </div>
                        </div>
					</div>
					
					
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