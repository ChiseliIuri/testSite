<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once '../models/DataBase.php';

class IndexController
{
    public static function deleteUser(){
        if (isset($_GET['id'])){

            $dbFunc = new DataBase();
            if ($dbFunc->deleteUserByID($_GET['id']))
            {
                header("Location: http://localhost/testSite/inddex.html");
            } else {
                echo 'Cannot delete! Some error occur.';
                echo 'Press here <a href="http://localhost/testSite/inddex.html"> to go at mainpage';
            }
        }
    }
    public static function addUser(){
        if (isset($_POST['fName'])||isset($_POST['lName'])||isset($_POST['age'])){
            $db = new DataBase();
            $data = $db->insertUserInDb($_POST['fName'], $_POST['lName'], $_POST['age']);
            die(json_encode($data));
        }
    }
    //new comment
}

switch ($_SERVER['REQUEST_METHOD']) {
	case 'GET': IndexController::deleteUser(); break;
	case 'POST':
		IndexController::addUser();
		break;
//	case 'PUT': break;
}
//
//IndexController::deleteUser();
//IndexController::addUser();