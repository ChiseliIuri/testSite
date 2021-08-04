<?php
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
            if($db->insertUserInDb($_POST['fName'], $_POST['lName'], $_POST['age'])){
                header("Location: http://localhost/testSite/inddex.html");
            } else {
                echo 'Some error occur at execution of a query';
                echo 'Press here <a href="http://localhost/testSite/inddex.html"> to go at mainpage';
            }
        }
    }

    //new comment
}

IndexController::deleteUser();
IndexController::addUser();