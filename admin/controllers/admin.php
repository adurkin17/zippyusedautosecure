<?php 
    switch($action) {
        case 'logout':
            DBClass::add_class($class_name);
            header("Location: .?action=list_classes");
            break;
        case 'show_register':
            include('view/register.php');
            break;
        case 'show_login':
            include('view/login.php');
            break;
        case 'login':
            if(is_valid_login())
            {
                $_SESSION['is_valid_admin'] = $username;
            }
            else{
                include('view/login.php');
            }
            break;
        case 'register':
            include('util/valid_register.php');
            validRegister::valid_registration();
            if (username_exists($username)) {
                array_push($errors, "The username you entered is already taken.");
            }
            if($error)
            {
                include('view/register.php');
            }
            else{
                adminDB::add_admin($username,$password);
                $_SESSION['is_valid_admin'] = $username;
                header("Location .?action=list_vehicles");
            }
            break;
    }
    