<?php
//$masiv = array();
//$masiv["id"]["color"]["mass"];
//print_r($masiv);

$payments = array("day"=>array(1,2,4,6,7,8),
    "osmp_datetime"=>array(432,4133,5654),
    "prv_id"=>"763");


print_r($payments);
$payments_stat = array();

foreach ($payments as $item){
    $payments_stat[$item["day"]]["total"]["amount"]++;
    $payments_stat[$item["day"]]["total"]["datetime"] = $item["osmp_datetime"];

    if ($item["prv_id"] != 765 && $item["prv_id"] != 763 && $item["prv_id"] != 1169)	$item["prv_id"] = "other";

    $payments_stat[$item["day"]][$item["prv_id"]]["amount"]++;
    $payments_stat[$item["day"]][$item["prv_id"]]["datetime"] = $item["osmp_datetime"];
}
print_r($payments_stat);