<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: sgn.php");
exit(); 
}

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stat = $row['status'];
if($stat == 'DORMANT/INACTIVE'){
	header('Location: summary.php?dormant');
	exit();
}$stat = $row['status'];
if($stat == 'ON HOLD'){
	header('Location: summary.php?hold');
	exit();
}
if(isset($_POST['transfer'])){
	$email = $row['email'];
	
	$amount = trim($_POST['amount']);
	$amount = strip_tags($amount);
	$amount = htmlspecialchars($amount);
	
	$acc_no = trim($_POST['acc_no']);
	$acc_no = strip_tags($acc_no);
	$acc_no = htmlspecialchars($acc_no);
	
	$acc_name = trim($_POST['acc_name']);
	$acc_name = strip_tags($acc_name);
	$acc_name = htmlspecialchars($acc_name);
	
	$bank_name = trim($_POST['bank_name']);
	$bank_name = strip_tags($bank_name);
	$bank_name = htmlspecialchars($bank_name);
	
	$swift = trim($_POST['swift']);
	$swift = strip_tags($swift);
	$swift = htmlspecialchars($swift);
	
	$routing = trim($_POST['routing']);
	$routing = strip_tags($routing);
	$routing = htmlspecialchars($routing);
		
	$type = trim($_POST['type']);
	$type = strip_tags($type);
	$type = htmlspecialchars($type);
	
	$remarks = trim($_POST['remarks']);
	$remarks = strip_tags($remarks);
	$remarks = htmlspecialchars($remarks);
	
		$cout = trim($_POST['cout']);
	$cout = strip_tags($cout);
	$cout = htmlspecialchars($cout);
	
		$transtype = trim($_POST['transtype']);
	$transtype = strip_tags($transtype);
	$transtype = htmlspecialchars($transtype);
	
	
	
	if($reg_user->temp($email,$amount,$acc_no,$acc_name,$bank_name,$swift,$routing,$type,$remarks,$cout,$transtype)){
if (isset($_SESSION['acc_no']))
	     $codeq = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 $sql = "UPDATE account SET tmp_otp = '$codeq' WHERE acc_no ='$acc_no'";
 if(mysqli_query($link, $sql))
 $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);




  $sender = "$bank_name"; /* sender id */
    $message = "Please enter this code to continue proceed
				$code";

   
   $stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	    
	$bank_name  = $row["bank_name"];
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
	
	
    $message = "
								<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>[SUBJECT]</title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1{
  color:#382F2E;
  margin:0;
}

div,p,ul,h1{
  margin:0;
}
p{
font-size:13px;
color:#99A1A6;
line-height:19px;
}
h2,h1{
color:#444444;
font-weight:normal;
font-size: 22px;
margin:0;
}
a.link2{
padding:15px;
font-size:13px;
text-decoration:none;
background:#2D94DF;
color:#ffffff;
border-radius:6px;
-moz-border-radius:6px;
-webkit-border-radius:6px;
}
.bgBody{
background: #f6f6f6;
}
.bgItem{
background: #2C94E0;
}

@media only screen and (max-width:480px)
		
{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}	
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}		
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
	.font{
		font-size:15px !important;
		line-height:19px !important;
		
		}
}

</style>

<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'f6f6f6',
    'link':'ffffff',
    'color':'99A1A6',
    'bgItem':'2C94E0',
    'title':'444444'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0' bgcolor='#d1d3d4'  style=' margin-left:5px; margin-right:5px; margin-bottom:0px; margin-top:0px;padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent bgBody' align='center'  style='font-family:Helvetica, Arial,serif;'>
  
    <!-- =============================== Header ====================================== -->

  <tr>
                      <td valign='top'  colspan='3'>
                        <table width='600' border='0' bgcolor='WHITE' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                          <tr>
                            <td align='left' valign='middle' width='200'>
                              <div class='contentEditableContainer contentImageEditable'>
                                <div class='contentEditable' >
                                   <center> <img src='$bank_domain/assets/img/brand/blue.png' alt='' data-default='placeholder' data-max-width='120' width='118' height='50' > </center>
								  <b style='font-size:1.5em; color:#fff;'></b>
                                </div>
                              </div>
                            </td>

                            
                          </tr>
                </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr><td height='2'  ></td></tr>

                        <tr>
                          <td height='200'  bgcolor='#fdfefe'>
                            <table align='center' border='0' cellspacing='0' cellpadding='0' class='MainContainer'>
  <tr>
    <td></td>
  </tr>
  

                                    <tr>
                                      <td></td>
                                      <td valign='top'>
                                        <table width='300' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <h1 style='font-size:20px;font-weight:normal;color:blue;line-height:19px;'>Hello</h1>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr><td height='18'></td></tr>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <p style='font-size:13px;color:blue;line-height:19px;'>Please enter OTP to complete your Transfer Process <br> <h4>$codeq</h4></p>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          
                                          <tr><td height='1'></td></tr>
                                        </table>
                                      </td>
                                      <td></td>
                                    </tr>
                                  </table>
                                </td>
  </tr>
</table>
</td>
  </tr>

</table>

                          </td>
                        </tr>

                        <tr><td height='0' ></td></tr>
                </table>
       
        
        
        
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td>
                      <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                        <tr>
                          <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>

                              <tr>
                                <td>
                                  
                                </td>
                              </tr>
                              
                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>$bank_name</p>
                                    </div>
    <br>                           <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='#F00; font-size:13px;line-height: 15px;'>This message is sent to this email to $fname <br /> <br /> <center><b>How do I know this is not a fake email?</b></center> <br />

An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.<br /><br />
                                      </p>
                                      <p style='#F00; font-size:13px;line-height: 15px;'>Our Address: $bank_address </p>
                                    </div>
                                  </div>                               </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='color:#A8B0B6; font-size:13px;line-height: 15px;'>&nbsp;</p>
                                    </div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
        </div>
    </td>
  </tr>
</table>


  </body>
  </html>


";

 
    $acc_no = $_SESSION['acc_no'];

    $queri = " UPDATE account SET tmp_otp = '$codeq' WHERE acc_no ='$acc_no'";
    $resulti = mysqli_query($connection, $queri) or die(mysqli_error($connection));


$subject = "Confirm Transfer OTP";
  $reg_user->send_mail($row['email'], $message, $subject);
      $acc_no = $_SESSION['acc_no'];
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

	     $reg_user->send_mail($row['email'], $message, $subject);
        $phone = preg_replace('/[^0-9]/', '', $row['phone']);
        $mobile_msg = "Dear " . $row['fname'] . ", Please use the One Time Passcode (OTP): " . $codeq . " to complete your Transfer process";
        //$reg_user->otp($phone,$mobile_msg);
       
	header("Location: pin.php");
	}
	
}
	

?>


 <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     
  
    <div class="container-fluid mt--7">
      
      
      
      
      
      
      
     <div class="row">
       
        <div class="col-xl-8 order-xl-1"><br><br>
         <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Wire Transfer Preview</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
                 
                          
               <form autocomplete="off" method="post" action="" method="POST"  enctype="multipart/form-data" >
          
          
                                         

                    									
                 
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Amount (<?php echo $row['currency']; ?>)</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Eg 23678" name="amount" type="number" value="<?php echo $_SESSION['amount']; ?>"  required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Beneficiary Account Name</label>
                        <input id="input-email" value="<?php echo $_SESSION['acc_name']; ?>" class="form-control form-control-alternative" placeholder="Beneficiary Name" name="acc_name" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Sender Account Number</label>
                        <input type="text" id="input-first-name" value="<?php echo $_SESSION['acc_no']; ?>"  class="form-control form-control-alternative"   name="acc_no" type="number" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Bank Name</label>
                        <input id="input-last-name" class="form-control form-control-alternative" value="<?php echo $_SESSION['bank_name']; ?>"   name="bank_name" type="text" required>
                        <input type="hidden" class="form-control" name="uname" value="<?php echo $row['email']; ?> "/>
                      </div>
                    </div> 
                  </div>
    
                    
                  
                  
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Select Country</label>
                          <select name="cout" class="form-control" required>
                              <option value="<?php echo $_SESSION['cout']; ?>"><?php echo $_SESSION['cout']; ?></option>
                                   
                            </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Swift Code</label>
                        <input id="input-last-name" value="<?php echo $_SESSION['swift']; ?>"  class="form-control form-control-alternative" placeholder="Enter Swift code" name="swift" type="text"  required>
                        
                      </div>
                    </div> 
                  </div>
                  
                  
                  
                     <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Routing Number</label>
                        <input class="form-control" value="<?php echo $_SESSION['routing']; ?>" placeholder="Routing Num." name="routing" type="text"  required>
                      </div>
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Transaction Type</label>
                        <input class="form-control"  name="transtype" type="text" value="WIRE-TRANSFER"  readonly="true"  required>
                      </div>
                    </div>
                  </div>
                  
               
                  
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Narration/Purpose</label>
                        <input class="form-control" value="<?php echo $_SESSION['remarks']; ?>"  name="remarks" type="text"  required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Select Account Type</label>
                         <input class="form-control" value="<?php echo $_SESSION['acctype']; ?>"  name="acctype" type="text"  required>
                      </div>
                    </div>
                  </div>
                  
                    
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Account Owner Authorization</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-warning" type="submit" name="transfer"> Make Transfer>></button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     