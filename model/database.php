<?php
    //local development server connection
   /* $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
    $username = 'root';
    //$password = 'pa55word';*/

    // Heroku connection
    
    $dsn = 'mysql:host=pxukqohrckdfo4ty.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=hnwmc5g21co1445v';
    $username = 'jrlvsjo47diaivlp';
    $password = 'hkkaaztkrtgmb375'; 
    
    try {
        //local development server connection
        //if using a $password, add it as 3rd parameter
        $db = new PDO($dsn, $username,$password);

        // Heroku connection
        //$db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error = "Database Error: ";
        $error .= $e->getMessage();
        include('../view/error.php');
        exit();
    }
?>