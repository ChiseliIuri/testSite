<?php

/**
 * Class DataBase
 */
class DataBase
{
    private static $host = '127.0.0.1';
    private static $name = 'test';
    private static $user = 'root';
    private static $pass = '';
    private static $db;

    /**
     * @return mysqli
     */
    public function connectDb(): mysqli
    {
        $link = @mysqli_connect(self::$host, self::$user, self::$pass, self::$name);
        if (!$link) {
            echo 'Eroare de conctare la BD';
            die();
        } else return $link;
//        try {
//            $conn = new PDO(self::$host, self::$user, self::pass, self::$name);
//            // set the PDO error mode to exception
//            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
//        } catch(PDOException $e) {
//            echo "Connection failed: " . $e->getMessage();
//        }
    }

    public function insertUserInDb($fName, $lName, $age = null)
    {
        $link = $this->connectDb();
        $prepare = $link->prepare("INSERT INTO users (fName, lName, age) values(?,?,?)");
        if ($prepare->bind_param("ssi", $fName, $lName, $age)) {
            echo 'Bind created Succesifull' . '<br/>';
            if ($prepare->execute()) {
                echo 'Query created Succesifull' . '<br/>';
            } else {
                echo 'Query executing failed' . '<br/>';
            }
        } else {
            echo 'Failed Bind';
        }
    }

    public function getSpecUserFromDb($fName = null, $lName = null)
    {
        $link = $this->connectDb();
        $sql = "SELECT * FROM users WHERE fName = '$fName' and lName = '$lName'";
        $qObj = $link->query($sql);
        if (!empty($qObj)) {
            while ($row = $qObj->fetch_assoc()) {
                echo 'id= ' . $row['id'] . '__First Name = ' . $row['fName'] . '__Last Name = ' . $row['lName'] . '__Age = ' . $row['age'] . '<br/>';
            }
        } else {
            echo 'some error occur';
        }
    }

    public function getAllUser()
    {
        $link = $this->connectDb();
        $sql = "SELECT * FROM users ";
        $qObj = $link->query($sql);
        if (!empty($qObj)) {
            $usersAr = array();
            while ($row = $qObj->fetch_assoc()) {
//                echo 'id= ' . $row['id'] . '__First Name = ' . $row['fName'] . '__Last Name = ' . $row['lName'] . '__Age = ' . $row['age'] . '<br/>';
                $usersAr[$row['id']] = array('fName'=>$row['fName'],
                    'lName'=>$row['lName'],
                    'age'=>$row['age'],
                    );
            }
        } else {
            echo 'some error occur';
        }
        return $usersAr;
    }
}



//$obj = new DataBase();
//$obj->insertUserInDb('Iosif', 'Stalin', 22);
//$obj->insertUserInDb('Jeff', 'Bezos', 66);
//$obj->insertUserInDb('Walter', 'White', 89);
//$obj->insertUserInDb('Black', 'Mesa', 18);
//$obj->getSpecUserFromDb('Popov', 'Markoni');
//$obj->getSpecUserFromDb('Topoli', 'Malii');
//$obj->getAllUser();

