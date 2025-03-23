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
							<h4>Update Your KYC</h4>
						</div>
					</div>
					 
				</div>                <!-- row -->
                <div class="row">
                    
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
						<?php 
						$query=mysqli_query($con,"SELECT * FROM `income` WHERE `email`='$userid'");
						$row=mysqli_fetch_array($query);
						$pan=$row['pan_img'];
						$a1=$row['aadtar_fornt'];
						$a2=$row['aadtar_back'];
					   ?>
					   <div>
						<?php
						   if($a1==''){
							  ?>
					       <div class="col-xl-12" >				  
                            <div class="card-header">
                                <h4 class="card-title">Adhaar Front Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="kyc.php" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
											<input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>
                                            <input type="text" name="aadhaar_no" class="form-control" placeholder="Aadhar Number" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <center><img src="img/adhar.png"style="width:200px;"></center>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" placeholder="Aadhar Front Image" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="submit1" class="btn btn-primary" value="Upload">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
						   </div>	
							<?php
								    }else{
								        ?>
								        
								        <center><img src="aadhaar_pan/<?php echo $a1?>" width="200px"></center>
								        <hr>
								        <?php
								    }
								?>
									<!-- end col -->
                                             <?php
                    							if(isset($_POST['submit1'])){
                    							    $userid=$_POST['userid'];
                    								$aadhaar_no=$_POST['aadhaar_no'];
                    								 $image=$_FILES["image"]["name"];
	                                                 $extensions=array('image/jpg','image/jpeg','image/png');
                    								
                    								if($image!=''){
                    									$query=mysqli_query($con,"UPDATE `income` SET `aadhaar_no`='$aadhaar_no',`aadtar_fornt`='$image' WHERE `email`='$userid'");
                    									$query=mysqli_query($con,"UPDATE `user` SET `aadhaar`='aadhaar_no' WHERE `email`='$userid'");
                    									$newname = $image;  
                    		                            $target = 'aadhaar_pan/'.$newname;
                    		                            move_uploaded_file( $_FILES['image']['tmp_name'], $target);
                    									$num=mysqli_num_rows($sql_check);
                    								if($query){
                    								    echo '<script>alert("Upload Successful.");window.location.assign("kyc.php");</script>';
                    								}	
                    								}else{
                    										echo '<script>alert("Add Photo.");window.location.assign("kyc.php");</script>';
                    								}
                    							}
                                           ?>
                                           <?php
								    if($a2==''){
								      ?>
							  <div class="col-xl-12">				  
                            <div class="card-header">
                                <h4 class="card-title">Adhaar Back Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="kyc.php" method="POST" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>  
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <center><img src="img/adhar_back.png"style="width:200px;"></center>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" placeholder="Aadhar Back Image" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="submit2" class="btn btn-primary" value="Upload">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
						   </div>
						   <?php
								}else{
									?>
									<center><img src="aadhaar_pan/<?php echo $a2?>" width="200px"></center>
									<hr>
									<?php
								}
							?>       
										 <?php
											$msg="";
											if(isset($_POST['submit2'])){
												$userid=$_POST['userid'];
												 $image=$_FILES["image"]["name"];
												 $extensions=array('image/jpg','image/jpeg','image/png');
												
												if($image!=''){
													$query=mysqli_query($con,"UPDATE `income` SET `aadtar_back`='$image' WHERE `email`='$userid'");
													$newname = $image;  
													$target = 'aadhaar_pan/'.$newname;
													move_uploaded_file( $_FILES['image']['tmp_name'], $target);
													$num=mysqli_num_rows($sql_check);
												if($query){
													echo '<script>alert("Upload Successful.");window.location.assign("kyc.php");</script>';
												}	
												}else{
														echo '<script>alert("Add Photo.");window.location.assign("kyc.php");</script>';
												}
											}
									   ?>
										 
								 <?php
									if($pan==''){
									  ?>
						  <div class="col-xl-12">				  
                            <div class="card-header">
                                <h4 class="card-title">Pan Card Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="kyc.php" method="POST" enctype="multipart/form-data">
                                       <input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>
									   <div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="pan_no" class="form-control" placeholder="Pancard Number" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <center><img src="img/pan.png"style="width:200px;"></center>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="file" name="image" class="form-control" placeholder="Pancard Image" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="submit3" class="btn btn-primary" value="Upload">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
						   </div>
						   <?php
								}else{
									?>
									<center><img src="aadhaar_pan/<?php echo $pan?>" width="200px"></center>
									<hr>
									<?php
								}
							?>       
										 <?php
											$msg="";
											if(isset($_POST['submit3'])){
												$pan_no=$_POST['pan_no'];
												 $image=$_FILES["image"]["name"];
												 $extensions=array('image/jpg','image/jpeg','image/png');
												$userid=$_POST['userid'];
												if($image!=''){
													$query=mysqli_query($con,"UPDATE `income` SET `pan_no`='$pan_no',`pan_img`='$image' WHERE `email`='$userid'");
														$query=mysqli_query($con,"UPDATE `user` SET `pan`='$pan_no' WHERE `email`='$userid'");
													$newname = $image;  
													$target = 'aadhaar_pan/'.$newname;
													move_uploaded_file( $_FILES['image']['tmp_name'], $target);
													$num=mysqli_num_rows($sql_check);
												if($query){
													echo '<script>alert("Upload Successful.");window.location.assign("kyc.php");</script>';
												}	
												}else{
														echo '<script>alert("Add Photo.");window.location.assign("kyc.php");</script>';
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