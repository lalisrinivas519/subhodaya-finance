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
							<h4>Wallet Request</h4>
						</div>
					</div>
					
				</div>                <!-- row -->
                <div class="row">
                    
					<div class="col-xl-6 col-lg-12">
                        <div class="card" style="background-color:#DDF3E6;">
                            <div class="card-header">
                                <h4 class="card-title">Wallet Request</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="wallet_request_process.php" method="POST" enctype="multipart/form-data">
										<div class="mb-3 row">
                                            
                                            <div class="col-sm-9">
                                            <select class="form-control" name="payment_mode">
                                            <option value="Bank Transfer">Bank Transfer</option>
                                            <option value="Google pay">Google pay</option>
                                            <option value="Phone pay">Phone pay</option>
                                            <option value="Paytm">Paytm</option>
                                            <option value="Office Reciipet">Office Reciipet</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="trn_number" class="form-control" placeholder="TRN Number" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9">
                                            <input type="text" name="amount" class="form-control" placeholder="Enter Amount" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="files">Payment Receipt</label>
                                            <div class="col-sm-9">
                                            <input type="file" name="image" id="files" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-9" style="text-align: center">
                                            <input type="submit" name="wallet_request" class="btn btn-primary" value="Wallet Request">
                                            </div>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
					
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


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