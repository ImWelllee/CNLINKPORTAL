<?php



class Database
{
     
    private $host = "localhost";
    private $db_name = "dbtest";
    private $username = "root";
    private $password = "well7718";

  //  private $host = "10.192.1.89";
  //  private $db_name = "db_CRM";
  //  private $password = "well7718";
  //  private $username = "Admin";
  //  private $password = "CNLinkCRM8501";
 
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
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
?>