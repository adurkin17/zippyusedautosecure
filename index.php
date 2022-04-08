<?php

    //start cookies
    $lifetime = 60*60*24*7;
    session_set_cookie_params($lifetime, '/');
    session_start();
    // Model 
    require('model/database.php');
    require('model/vehicle_db.php');
    require('model/type_db.php');
    require('model/class_db.php');
    require('model/make_db.php');

    // Get required data from Model
    $types = typeDB::get_types();
    $classes = DBClass::get_classes();
    $makes = makeClass::get_makes();

    // Get Parameter data sent to Controller
    $action = filter_input(INPUT_GET,'action', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_GET,'firstName',FILTER_SANITIZE_STRING);

    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if (!$sort) $sort = 'price';

    // Get Data for View
    /* if ($make_id) {
        $make_name = get_make_name($make_id);
        $vehicles = get_vehicles_by_make($make_id, $sort);
    } else if ($type_id) {
        $type_name = get_type_name($type_id);
        $vehicles = get_vehicles_by_type($type_id, $sort);
    } else if ($class_id) {
        $class_name = get_class_name($class_id);
        $vehicles = get_vehicles_by_class($class_id, $sort);
    } else {
        $vehicles = get_all_vehicles($sort);
    } */

    // Extra credit solution 
    $vehicles = vehicleDB::get_all_vehicles($sort);
    if ($make_id) {
        $make_name = makeClass::get_make_name($make_id);
        $vehicles = array_filter($vehicles, function($array) use ($make_name) {
            return $array["Make"] === $make_name;
        });
    }
    if ($type_id) {
        $type_name = typeDB::get_type_name($type_id);
        $vehicles = array_filter($vehicles, function($array) use ($type_name) {
            return $array["Type"] === $type_name;
        });
    }
    if ($class_id) {
        $class_name = DBClass::get_class_name($class_id);
        $vehicles = array_filter($vehicles, function($array) use ($class_name) {
            return $array["Class"] === $class_name;
        });
    }

    if($firstname)
    {
        $_SESSION['userid'] = $firstname;
    }

    switch($action)
    {
        case 'register':
            include('view/register.php');
            break;
        case 'logout':
            include('view/logout.php');
            break;
        default:
            include('view/vehicle_list.php');
    }
        
    


   