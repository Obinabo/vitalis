<?php  //Start the Session

session_start();

 require('connectdb.php');
 require_once 'class.admin.php';
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['email']) and isset($_POST['upass'])){
//3.1.1 Assigning posted values to variables.
$email = $_POST['email'];
$upass = $_POST['upass'];
$upass = md5($upass);
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM admin WHERE email='$email' and upass='$upass'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['email'] = $email;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						  Invalid Email or Password!
                   
			  </div>";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['email'])){
$email = $_SESSION['email'];
header('Location: index.php');
 
}else{}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>



<!DOCTYPE html>
<html class="no-js" style="height: 100%;" lang="">
<head><meta http-equiv="content-type" content="text/html; charset=UTF-8">

  <meta charset="utf-8">
  <title> Admin Panel Login | <?php echo $site_title; ?> </title>
  <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
<link rel="apple-touch-icon-precomposed" href="">
<meta name="msapplication-TileImage" content="">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link href="../../assets/bootstrap.css" rel="stylesheet" id="bootstrap-css">
<script src="../../assets/bootstrap.js"></script>
<script src="../../assets/jquery-1.js"></script>
<link href="../../assets/css.css" rel="stylesheet"> 
<!------ Include the above in your HEAD tag ---------->
<style>
  body {
    font-family: 'Nunito', sans-serif;
    font-size: 14px;
    line-height: 1.28571429;
    color: 
    #000;
}  
   body { 
  background:url('../../assets/images/reliable/sign.jpg') ; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

.panel-default {
    opacity: 0.9;
    margin-top: 70px;
    border-radius: 25px;
}

.btn-sm, .btn-xs {
    padding: 5px 40%;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 3px;
}

.form-group.last { margin-bottom:0px; } 
    
.btn-success {
    color: 
#fff;
background-color:
#187718;
border-color:
    #187718;
}
 .alert-danger {

    color: #fff;
    background-color: #e30909;
    border-color: #eed3d7;

}

.input{
  width: 95%;
	border:none;
	padding:15px 20px;
	border-radius:25px;
	background:rgba(255,255,255,.1);
}

.button{
	background:#929292;
  color: #fff;
  border-radius: 25px;}
</style> </head>




<body style="position: relative; min-height: 100%; top: 0px;"><div class="container">
    <div class="row">
        
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
               <center><br><img style="width: 250px;" src="../../assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="100" width="16%" height="70px"></center> <br>
              <br><center> 
                    	
                    	
                    	<!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic" class="gflag nturl" style="background-position:-100px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Arabic" /></a><a href="#" onclick="doGTranslate('en|zh-TW');return false;" title="Chinese (Traditional)" class="gflag nturl" style="background-position:-400px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Chinese (Traditional)" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="16" width="16" alt="Spanish" /></a>

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:16px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/16.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/16a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>



         
<strong></strong>
                <div class="panel-body">
 
                    <?php if (isset($msg)) echo $msg; ?>
                                         
                    <form autocomplete="off" method="POST">
            <div class="form-inputs p-b">
              <a style="color: black;"></a>
              <input class="input" style="margin-bottom: 20px;" type="text" name="email" class="form-control" placeholder="Admin Email" autofocus="" required >
                           
                            
                            <label="" class="text-uppercase">
               <input class="input" type="password" name="upass" class="form-control" placeholder="Admin Password" required>
        
            </div>
            
            <br><hr>
        <center><button class="button" style="background-color: #092980;  color:white; "    class="btn btn-warning" type="submit">
            <div >Access Admin Panel</div>
            </button></center>
            
            
          
          </form>
                </div>
               
            </div>
        </div>
    </div>
</div> 
</body></html>


