<?php
require_once "../models/DataBase.php";

$db = new DataBase();
print_r($db->getSpecUserFromDb("Isaac", "Newton ' and age = '"));

//' and age = '200
//$_GET["type"] = "5";
//$_GET["prv_id"] = "544355";
//$_GET["agent_id"]="345678";
//$_GET["username"]="' Vasea'";
//$_GET["report_type"]="2345";
//$_GET["date_from"] = '2018-04-09';
//$_GET["date_to"] = '1998.04.01';
//$_GET["pay_type"] = '1234214';
//require_once "../models/DbSimple/Generic.php";
//$DB = DbSimple_Generic::connect('mysql://root:@localhost/test');
//$dsn = "mysql://127.0.0.1:3306/test";
//
//if ($DB) {
//	echo "success" . "<br/>";
//} else {
//	echo "fail" . "<br/>";
//}
//
//$array["test"] = "yep";
//$sql_insert = array(1 => "one", 2 => "two", 3 => "three");
//
//$exp = $DB->query("INSERT INTO payments_request" . ($array["test"] ? "_test" : "") . " (?#)
//VALUES (?a)", array_keys($sql_insert), array_values($sql_insert));
//
//
//$array["txn_id"] = 123456;
//$sql_update = array(1 => "one", 2 => "two", 3 => "three");
//
//$exp2 = $DB->query("UPDATE payments".($array["test"]?"_test":"")." SET {?a}
//WHERE txn_id='".$array["txn_id"]."'",$sql_update);
//
//$exp3 = $DB->selectRow("SELECT * FROM users
//WHERE id = ? LIMIT 1;", 63);
//print_r($exp3);
//
//
////$DB->query("UPDATE ?# SET {?a} WHERE txn_id= ? "(TBL_PAYMENTS.($array["test"]?"_test":"")), $sql_update, $array["txn_id"]);
//
//define("TBL_PAYMENTS_EXTRA", "user");
//
//echo "<br/>" . TBL_PAYMENTS_EXTRA."".($array["test"]?"_test":"");
//echo "<br/>" . TBL_PAYMENTS_EXTRA.($array["test"]?"_test":"");
//echo "<br/>" . sprintf("vars = %s", (TBL_PAYMENTS_EXTRA.($array["test"]?"_test":"")));
//echo "<br/>" . sprintf("vars = %s", ("payments".($array["test"]?"_test":"")));
//$report = array();
//$report["type"] 		= $_GET["report_type"];
//$report["prv_id"] 		= intval($_GET["prv_id"]);
//$report["agent_id"] 	= intval($_GET["agent_id"]);
//$report["date_from"] 	= formatDate($_GET["date_from"]);
//$report["date_to"] 		= formatDate($_GET["date_to"]);
//function formatDate($dirtyDate){
//    if (checkdate(substr($dirtyDate,5,2),substr($dirtyDate,8,2),substr($dirtyDate,0,4))) {
//        $date = date_create(substr($dirtyDate,0,10));
//        if ($date) {
//            $cleanDate = $date->format("Y-m-d");
//            return $cleanDate;
//        } else {
//            exit("date error");
//        }
//    } else {
//        exit("date error");
//    }
//}
//
//$username = addslashes($_GET['username']);
//echo $username . '<br/>';
//echo $report["prv_id"] . '<br/>';
//echo $report["date_from"];
//
//if(!$link = mysql_connect("127.0.0.1", "root", "")){
//    echo 'cannot connect to db';
//} else {
//    echo '<br/> coneziune creata cu succes';
//}
//
//if($testBd = mysql_select_db("test", $link)){
//    echo '<br/>succes<br/>';
//}
//
////$fName = "Mahatma";
//$fName = "Mahatma ' and lName = 'Gandi";
//$lName = "Gandi";
//$age = 190;
//
////$insert = "INSERT INTO test.users(fName, lName, age) values (
////           '$fName', '$lName', '$age'
////)";
////mysql_query($insert, $link); mysql_real_escape_string($fName)
//
//$query = sprintf("Select * from test.users where fname = '%s' ", addslashes($fName));
//print_r($query);
//echo '<br/>';
//$result = mysql_query($query, $link);
//$final = mysql_fetch_assoc($result);
//
//print_r($final);
//
//$someInt = "1234";
//echo intval($someInt);
//
//echo date("Y:m:d T h:m:s");
//
//$someString = "    qwerty'   ";
//
//echo '<br/>'.addslashes(trim($someString));
//
//$fileName = "file:///C:/Users/i.chiseli/Desktop/qiwi.md_admin.pdf";
//
//echo '<br/>'. strrchr($fileName,'.');
//
//define(TBL_PAYMENTS,"qwerty");
//
//
//$provider["id"] = 123490;
//$date = date("Y-m-d");
//
//echo sprintf("SELECT * FROM %s WHERE prv_id = %d AND pay_type = %d AND '%s' "
//    ,TBL_PAYMENTS, $provider["id"], intval($_GET['pay_type']), $date);
//define(TBL_PROVIDERS_REGISTERS, "31415_");
//$pay_type = 123345;
//$field = "name' AND 'username";
//
//echo "<br/>" . "ALTER TABLE `" . TBL_PROVIDERS_REGISTERS . "$provider[id]_$pay_type` DROP `$field`";
//
//$sprt = sprintf("ALTER TABLE  '%s%d_%d' DROP '%s'"
//    , TBL_PROVIDERS_REGISTERS, $provider['id'], $pay_type, addslashes($field));
//echo "<br/>" . $sprt;
//
//$someVar = array(0=>null, 1=>"qwerty");
////$someVar = null;
//
//if (strlen($someVar[0])){
//    echo '<br/>' . "some vare is not empty";
//} else {
//    echo '<br/>' . "some vare is empty";
//}
//$path = "/tmp/some/of/the/real/path/naket_lili.jpg";
//$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
//$ext2 = strrchr($path, '.');
//print_r(array(
//    $path,
//    $ext,
//    $ext2
//));
//
//$fileName = "file:///C:/Users/i.chiseli/Desktop/qiwi.md_admin.pdf";
//echo '<br/>'. strrchr($fileName,'.');
//
//$path = "/tmp/some/of/the/real/path/naket_lili.jpg";
//echo '<br/>'. strrchr($path,'.');
//
//$ext = "";
//echo '<br/>' , preg_match("((^jpeg$)|(^jpg$)|(^png$))",$ext);
//
//$search["prv_txn"] = "123' 456 '890";
//$query = explode(" ", addslashes($search["prv_txn"]));
//print_r($query);
//echo '<br/>' . strstr($fileName, '.');
//include_once '../models/DataBase.php';
//$db = new DataBase();
//$link = $db->connectDb();
//$var = mysqli_real_escape_string("'cristofor Columb'", $link = NULL);
//echo '$var';
//$masiv = array();
//$masiv["id"]["color"]["mass"];
//print_r($masiv);
//$payments = array("day"=>array(1,2,4,6,7,8),
//    "osmp_datetime"=>array(432,4133,5654),
//    "prv_id"=>"763");
//
//
//print_r($payments);
//$payments_stat = array();
//
//foreach ($payments as $item){
//    $payments_stat[$item["day"]]["total"]["amount"]++;
//    $payments_stat[$item["day"]]["total"]["datetime"] = $item["osmp_datetime"];
//
//    if ($item["prv_id"] != 765 && $item["prv_id"] != 763 && $item["prv_id"] != 1169)	$item["prv_id"] = "other";
//
//    $payments_stat[$item["day"]][$item["prv_id"]]["amount"]++;
//    $payments_stat[$item["day"]][$item["prv_id"]]["datetime"] = $item["osmp_datetime"];
//}
//print_r($payments_stat);