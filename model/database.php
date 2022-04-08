<?php
class Database {
    //local development server connection
    /*private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    private static $username = 'root';
    //$password = 'pa55word';*/

    // Heroku connection
    
    private static $dsn = 'mysql:host=ik1eybdutgxsm0lo.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=j0dgzj9z17h6lpy8';
    private static $username = 'yjybte8az452txof';
    private static $password = 'f2n56z60dh4b7iwk'; 
    private static $db;

    private function __construct() {}
    
    public static function getDB() {
        if (!isset(self::$db)){
            try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
                self::$db = new PDO(self::$dsn, self::$username,self::$password);

        // Heroku connection
        //$db = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                $error = "Database Error: ";
                $error .= $e->getMessage();
                include('../view/error.php');
                exit();

                
            }
        
        }
        return self::$db;
    }

}
?>