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
							<h4>Update Bank Details</h4>
						</div>
					</div>
					
				</div>                <!-- row -->
                <div class="row" >
                    
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">Update Bank Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="bank_details.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" name="userid"  value="<?php echo $userid?>" required>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="account_number" class="form-control" placeholder="Account Number"  required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="bank_name" class="form-control" placeholder="Bank Name" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="ifsc_code" class="form-control" placeholder="IFSC Code" required>
                                            </div>
                                        </div>
										<div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="branch" class="form-control" placeholder="Bank Branch" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
											<label for="files">Passbook Image</label>
                                            <input type="file" name="image" id="files" class="form-control" placeholder="" required>
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
											$account_number=$_POST['account_number'];
											$bank_name=$_POST['bank_name'];
											$ifsc_code=$_POST['ifsc_code'];
											$branch=$_POST['branch'];
											
											$image=$_FILES["image"]["name"];
											$extensions=array('image/jpg','image/jpeg','image/png');
										
										
										$query=mysqli_query($con,"UPDATE `income` SET `bank_name`='$bank_name',`account_number`='$account_number',`ifsc_code`='$ifsc_code',`branch`='$branch',`bank_pass`='$image' WHERE `email`='$userid'");
										$newname = $image;  
										$target = 'aadhaar_pan/'.$newname;
										move_uploaded_file( $_FILES['image']['tmp_name'], $target);
											echo"<script>alert('Update Successful');window.location.assign('bank_details.php');</script>";
										}
									?>
                            </div>
                        </div>
					</div>
					
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">My Bank Details</h4>
                            </div>
                            <div class="card-body">
								<?php
                                    $userid = $_SESSION['userid'];
									if($con){
				
										$query = "SELECT * FROM `income` WHERE `email`='$userid'";
											$res = mysqli_query($con, $query);
				
            								if(mysqli_num_rows($res)>0){
            									$x=mysqli_fetch_assoc($res);
            										
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Account Number:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['account_number'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Bank name:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['bank_name'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<h6><font color='#2b3d51' face='Arial Black'>IFSC Code:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['ifsc_code'].' '."</font>".' '."</b>".' '.'</h6>';
            							        echo "<h6><font color='#2b3d51' face='Arial Black'>Branch:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['branch'].' '."</font>".' '."</b>".' '.'</h6>';
            									echo "<h6><font color='#2b3d51' face='Arial Black'>Passbook Image:  </font>".' '."<font color='black' face='Arial Black'>".' '."".' <b>'.$x['bank_pass'].' '."</font>".' '."</b>".' '.'</h6>';
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