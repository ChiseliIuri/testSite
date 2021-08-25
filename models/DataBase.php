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

    private function connectDb(): mysqli
    {
        $link = @mysqli_connect(self::$host, self::$user, self::$pass, self::$name);
        if (!$link) {
            echo 'Eroare de conectare la BD';
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

    private function connectDbPDO(){
        try {
            $conn = new PDO(self::$host, self::$user, self::pass, self::$name);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function insertUserInDb($fName, $lName, $age = null)
    {
    	$link = self::connectDb();
        $prepare = $link->prepare("INSERT INTO users (fName, lName, age) values(?,?,?)");
        if ($prepare->bind_param("ssi", $fName, $lName, $age)) {
            if ($prepare->execute()) {
                return $this->getUserByID($link->insert_id);
            } else {
                return false;
            }
        }
    }

	public function getUserByID($id = null)
	{
		$link = $this->connectDb();
		$sql = "SELECT * FROM users WHERE id = '$id' LIMIT 1";
		$qObj = $link->query($sql);
		if (!empty($qObj)) {
			return $qObj->fetch_assoc();
		} else {
			echo 'some error occur';
		}
	}

    public function getSpecUserFromDb($fName = null, $lName = null)
    {
        $link = $this->connectDb();
        $sql = $link->prepare( "SELECT * FROM users WHERE fName = ? and lName = ?");
        $sql->bind_param("ss", $fName, $lName);
        $qObj = $link->query($sql);

        $user  = array();
        if (!empty($qObj)) {
            while ($row = $qObj->fetch_assoc()) {
                echo 'id= ' . $row['id'] . '__First Name = ' . $row['fName'] . '__Last Name = ' . $row['lName'] . '__Age = ' . $row['age'] . '<br/>';
				$user[] = array(
					'id'=>$row['id'],
					'fName' => $row['fName'],
					'lName' => $row['lName'],
					'age' => $row['age'],
				);
			}
		} else {
			echo 'some error occur';
		}
        return $user;
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
                $usersAr[$row['id']] = array('fName' => $row['fName'],
                    'lName' => $row['lName'],
                    'age' => $row['age'],
                );
            }
        } else {
            echo 'some error occur';
        }
        return $usersAr;
    }

    public function deleteUserByID($id)
    {
        $link = $this->connectDb();
        $cleanId = intval($id);
        $sql = $link->prepare("DELETE from users where id = '$cleanId'");
        if ($sql->execute()) {
            return true;
        } else {
            return false;
        }
    }


}