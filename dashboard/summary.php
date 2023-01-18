

<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: ../login.php");
    exit();
}


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 3");
$temp->execute(array(":acc_no" => $_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);


?>
   <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
  
  
  
  
  
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     



<!---start here content------>
          <div class="content-wrapper pb-0" >
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-green2 btn-icon-text border">
                  <img src="icon/8.png" height="20px" width="20px" />&nbsp;&nbsp; <a href="dom.php" style="color:white">Quick Transfer</a>  </button>
                <button type="button" class="btn btn-sm bg-green2 btn-icon-text border ml-3">
                  <img src="icon/4.png" height="20px" width="20px" />&nbsp;&nbsp; <a href="ticket.php" style="color:white">Open Ticket</a>  </button>
                <button type="button" class="btn btn-sm ml-3 bg-green2"> <a href="profile.php" style="color:white">Profile</a> </button>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-12 stretch-card grid-margin">
                <div class="row">
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card" style="border-radius:10px; background-color:#a5014d; height:150px;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Account Balance</p>
                            <h4 class="text-white"> <?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?> <span class="h5"></span>
                            </h4>
                          </div>
                          
                        <img src="money.png" />
                        </div>
                        <h6 class="text-white">18.33% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
                    <div class="card" style="border-radius:10px; background-color:#a5014d; height:150px;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Ledger Balance</p>
                            <h4 class="text-white"> <?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?><span class="h5"></span>
                            </h4>
                          </div>
                           <img src="dollar.png" />
                        </div>
                        <h6 class="text-white">13.21% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
                    <div class="card bg-success" style="border-radius:10px; background-color:#a5014d; height:130px;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Loan Status</p>
                            <h2 class="text-white"> ACTIVE<span class="h5"></span>
                            </h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                        </div>
                        <h6 class="text-white">1.98% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-12 col-md-6 stretch-card pb-sm-3 pb-lg-0">
                    <div class="card bg-success" style="border-radius:10px; height:130px; background-color:#a5014d;">
                      <div class="card-body px-3 py-4">
                        <div class="d-flex justify-content-between align-items-start">
                          <div class="color-card">
                            <p class="mb-0 color-card-head">Transfer Mode</p>
                            <h2 class="text-white">WIRE</h2>
                          </div>
                          <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                        </div>
                        <h6 class="text-white">3.32% Since <?php echo " " .$today = date("F j, Y"); ; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-9 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-7">
                        <h5>Transaction Statistics</h5>
                        <p class="text-muted"> Show Overview <?php echo $row['reg_date']; ?> - <?php echo " " .$today = date("F j, Y"); ; ?> <a class="text-muted font-weight-medium pl-2" href="statement.php"><u>See Details</u></a>
                        </p>
                      </div>
                      <div class="col-sm-5 text-md-right">
                        <button type="button" class="btn btn-icon-text mb-3 mb-sm-0 btn-inverse-primary font-weight-normal">
                          <i class="mdi mdi-email btn-icon-prepend"></i>Download Statement </button>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-4">
                        <div class="card mb-3 mb-sm-0">
                          
                           <div class="cardcc" style="width: 100%;">
  <div class="cardcc__front cardcc__part">
    <img class="cardcc__front-square cardcc__square" src="icon/chip.png">
    <img class="cardcc__front-logo cardcc__logo" src="icon/visa.png">
    <p class="cardcc_numer">XXX<?php echo $row['cardno']; ?>-XXXX </p>
    <div class="cardcc__space-75">
      <span class="cardcc__label">card holder</span>
      <p class="cardcc__info"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></p>
    </div>
    <div class="cardcc__space-25">
      <span class="cardcc__label">Expires</span>
            <p class="cardcc__info"><?php echo $row['expmonth']; ?>/<?php echo $row['expyear']; ?></p>
    </div>
  </div>
  
  <div class="cardcc__back cardcc__part">
    <div class="cardcc__black-line"></div>
    <div class="cardcc__back-content">
      <div class="cardcc__secret">
        <p class="cardcc__secret--last"><?php echo $row['cvv']; ?></p>
      </div>
      <img class="cardcc__back-square cardcc__square" src="icon/chip.png">
      <img class="cardcc__back-logo cardcc__logo" src="icon/visa.png">
      
    </div>
  </div>
  
</div>
                      
                        </div>
                      </div>
                      
                      <div class="col">&nbsp;</div>
                      <div class="col">
                        
       
                    
                         
                       
                       
 <div class="cardcc1" >
  <div class="cardcc1__front cardcc1__part" >
    <img class="cardcc1__front-square cardcc1__square" src="icon/chip.png">
<img class="cardcc1__front-logo cardcc1__logo"   src="../assets/img/brand/white.png" alt="logo" height="60px" />
    <p class="cardcc1_numer"> <?php echo $row['acc_no']; ?>-XXXX </p>
    <div class="cardcc1__space-75">
      <span class="cardcc1__label">card holder</span>
      <p class="cardcc1__info"><?php echo $row['fname']; ?>&nbsp;<?php echo $row['lname']; ?></p>
    </div>
    <div class="cardcc1__space-25">
      <span class="cardcc1__label">Type</span>
            <p class="cardcc1__info" style="font-size:12px;"><?php echo $row['type']; ?></p>
    </div>
  </div>
  
  <div class="cardcc1__back cardcc1__part">
    <div class="cardcc1__black-line"></div>
    <div class="cardcc1__back-content">
      <div class="cardcc1__secret">
        <p class="cardcc1__secret--last"><?php echo $row['pin']; ?></p>
      </div>
      <img class="cardcc1__back-square cardcc1__square" src="icon/chip.png">
      <img class="cardcc1__back-logo cardcc1__logo"   src="../assets/img/brand/white.png" alt="logo" height="40px" />
      
    </div>
  </div>
  
</div>
                       
                   </div>   
                      
                      
                    </div>
                    <div class="row my-3">
                      <div class="col-sm-12">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_119a8"></div>
  <div class="tradingview-widget-copyright"><a href="" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.MediumWidget(
  {
  "symbols": [
    [
      "Apple",
      "AAPL"
    ],
    [
      "Google",
      "GOOGL"
    ],
    [
      "Microsoft",
      "MSFT"
    ]
  ],
  "chartOnly": false,
  "width": "100%",
  "height": "400",
  "locale": "en",
  "colorTheme": "light",
  "gridLineColor": "rgba(151, 0, 0, 1)",
  "trendLineColor": "rgba(0, 0, 0, 1)",
  "fontColor": "rgba(255, 255, 255, 1)",
  "underLineColor": "rgba(180, 95, 6, 1)",
  "isTransparent": false,
  "autosize": false,
  "container_id": "tradingview_119a8"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-8">
                        <p class="text-muted mb-0"> <b>Security Tips</b> <P>Change your Internet banking Password Frequently to keep your Account 
				   Safe <a href="editpass.php" class="btn btn-danger">Reset Password</a>
                        </p>
                      </div>
                      <div class="col-sm-4">
                        <p class="mb-0 text-muted">Account Number</p>
                        <h5 class="d-inline-block survey-value mb-0"><?php echo $row['acc_no']; ?> </h5>
                        <p class="d-inline-block text-danger mb-0"> <?php echo $row['type']; ?> </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
		  
		  <!---ends here content------>
		  
		  
		       <?php include 'footercopyright.php'; ?>