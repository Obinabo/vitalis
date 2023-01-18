<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
INPUT UR SQL DETAILS HERE  */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'telexde1_Wally');
define('DB_PASSWORD', 'Obinabo1995');
define('DB_NAME', 'telexde1_vitalis');



//ONLINE BANKING DATA SETTINGS
$site_title = 'VitalisBank';
$site_address = '801 N 5th St, E Grinnell dr, Burbank, CA.';
$site_initial = 'VitalisBank INC';
$site_email = 'support@vitalisfinances.com'; 
$live_chat_id = ''; 


//WEBSITE COLOR SETTINGS
$digital_forest_script_menu = '#99ccff';
$digital_forest_script_menu_font = 'black';

$digital_forest_script_header = '#140a01';
$digital_forest_script_header_font = 'white';

$tab = '#0099cc';
$tab_font = 'white';


$page_loader = '#999966';


//PAYMENT SETTINGS
$btc_wallet = '';

$bank_name = 'Bank of America';
$bank_address = '801 N 5th St, E Grinnell dr, Burbank, CA.';
$bank_account = '0292938929292'; 
$account_name = 'VitalisFinances INC'; 
$swift_code = 'WHSY82992H'; 
$routing_no = '10109292992929-9292'; 




class Database
{
   /* Do not set or touch any thing here */  
    private $host = "DB_SERVER";
    private $db_name = "DB_NAME";
    private $username = "DB_USERNAME";
    private $password = "DB_PASSWORD";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



?>