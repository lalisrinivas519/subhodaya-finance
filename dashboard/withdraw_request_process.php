<?php 
	include("php_include/check_login.php");
	include("php_include/connect.php");
	$userid = $_SESSION['userid'];
?>
<?php


   if(isset($_POST['withdraw'])){
        $amount=$_POST['amount'];
        $password=$_POST['password'];
        $trn_id=rand('999999999','9999999999');
    $query1=mysqli_query($con,"SELECT * FROM `user` WHERE `email`='$userid'");
    $row1=mysqli_fetch_array($query1);   
     $trn_password=$row1['trn_password'];
    $query=mysqli_query($con,"SELECT * FROM `income` WHERE `email`='$userid'");
    $row=mysqli_fetch_array($query);
     $current_bal =$row['current_bal'];
     if($password==$trn_password){
      if($current_bal>=$amount){ 
          if($amount>99){
          $query=mysqli_query($con,"INSERT INTO `income_received`(`email`, `amount`,  `status`, `orider_id`, `date`) VALUES ('$userid','$amount','Waiting','$trn_id','$date')");
       $x=$current_bal-$amount;
       $update=mysqli_query($con,"UPDATE `income` SET `current_bal`='$x' WHERE `email`='$userid'");
       echo '<script>alert("Withdraw Successful.");window.location.assign("withdraw_request.php");</script>';
          }else{
              echo '<script>alert("Minimum withdraw 100RS.");window.location.assign("withdraw_request.php");</script>';  
          }
      }else{
       echo '<script>alert("Insufficient Funds.");window.location.assign("withdraw_request.php");</script>';   
      }
     }else{
         echo '<script>alert("Invalid Password.");window.location.assign("withdraw_request.php");</script>';
     }
   }
  


?>