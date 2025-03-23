<?php 
	include("php_include/check_login.php");
	include("php_include/connect.php");
	$userid = $_SESSION['userid'];
?>
<?php

						if(isset($_POST['wallet_request'])){
									
									$payment_mode = $_POST['payment_mode'];
									$trn_number = $_POST['trn_number'];
									$amount = $_POST['amount'];
									$date = date("Y-m-d");
									
									$image=$_FILES["image"]["name"];
	
	                                  $extensions=array('image/jpg','image/jpeg','image/png');

									if($payment_mode!='' && $trn_number!='' && $amount!='' && $image!=''){
                       
										$query = mysqli_query($con,"SELECT * FROM `wallet_request` WHERE `email`='$userid'");
										$row = mysqli_fetch_array($query);
										$trn = $row['trn_number'];

										if($trn_number!= $trn){

		                            $array = mysqli_query($con,"INSERT INTO `wallet_request`(`email`, `amount`, `payment_mode`, `trn_number`, `image`, `date`) 
									VALUES ('$userid','$amount','$payment_mode','$trn_number','$image','$date')");
		
		                            $newname = $image;
		                            $target = 'payment_receipt/'.$newname;
		                            move_uploaded_file( $_FILES['image']['tmp_name'], $target);
		                   
		                              echo '<script>alert("Wallet Request Submited Successfully.");window.location.assign("wallet_request.php");</script>';
										} else {
											echo '<script>alert("PLease do not repeat old trn number.");window.location.assign("wallet_request.php");</script>';
										}				
					             }else {
										echo '<script>alert("Please fill all the fields  .");window.location.assign("wallet_request.php");</script>';
									}
								}
						?>