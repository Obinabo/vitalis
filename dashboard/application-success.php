<?php
session_start();
require_once 'admin/class.admin.php';
include_once ('admin/session.php');

$reg_user = new USER();
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Registration Acknowledgement Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <center>  <h4 style="color:green;  font-weight:700;"class="modal-title">Acknowledgment Successful</h4></center>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               
                                                         <p style="text-align:center;"><strong style="color:green;">Dear <?php echo $site_title; ?> Customer,</strong> Please wait till Our Customer Service validates your account,
                                         then you can login to your account.</p>
                    		  <p style="text-align:center;">Please note that this Process may take <strong style="color:green;">1-2 business working days</strong>, once your account is validated, you will be notified through your registered 
                    		  email address</p>
                    		  <p style="text-align:center;">A copy of your <?php echo $site_title; ?> registration details has been sent to your email address including the <strong style="color:orange;"><?php echo $bank_name; ?> 10 Digit Account </strong>
                    		  Number and other vital information</p> 
                    		  
                    		 <p style="text-align:center;">Kindly check your email for further information</p> 
                    		 
                    		 <p>Welcome onboard!!!</p>
                    		 <p><?php echo $site_title; ?></p>
                <form>
                    <hr>
                    <center><button type="submit" class="btn btn-danger"><a style="color:white; font-weight:700;" href="sgn.php">CLICK OKAY</a></button></center>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>