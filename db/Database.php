<?php
// Define configuration
define("DB_RDBMS", "mysql");
define("DB_HOST", "localhost");
define("DB_NAME", "boattracker_db");
define("DB_USER", "root");
define("DB_PASS", "");

class database {

    // Database Managment System (Database Type)
    private $rdbms      = DB_RDBMS;

    // Database Host Address/IP
    private $dbhost     = DB_HOST;

    // Database Name
    private $dbname     = DB_NAME;

    // Database User Name
    private $dbuser     = DB_USER;

    // Database Password
    private $dbpass     = DB_PASS;

    //
    private $con = false;

    public function __construct ()
    {
        //connect to database
        if (!$this->con)
        {
            //not yet connected, make a connection
            try
            {
                $this->db = new PDO($this->rdbms.':host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->con = true;
                return $this->con;
            }
            catch (PDOException $e)
            {
                 echo ($e->getMessage());
                exit();
            }
        }
        else
        {
            //already connected - do nothing and show true
            return true;
        }
    }

    public function getInstance(){
        return $this->db;
    }

}
?>