<?php
class Database
{
     
    private $host = "localhost";
    private $db_name = "telexde1_vitalis";
    private $username = "telexde1_Wally";
    private $password = "Obinabo1995";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;
	    $DB_con = null;
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

$connection = mysqli_connect('localhost', 'telexde1_Wally', 'Obinabo1995');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'telexde1_vitalis');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

//ONLINE BANKING DATA SETTINGS
$site_title = 'Vitalis Finances';
$site_address = 'NRG Wodland Ave Austine #72222 TX USA';
$site_initial = 'Vitalis Bank';
$site_email = 'support@vitalisfinances.com'; 
$live_chat_id = ''; 



$DB_host = "localhost";
$DB_user = "telexde1_Wally";
$DB_pass = "Obinabo1995";
$DB_name = "telexde1_vitalis";


     $host = "localhost";
    $database = "telexde1_vitalis";
    $username = "telexde1_Wally";
    $password = "Obinabo1995";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}