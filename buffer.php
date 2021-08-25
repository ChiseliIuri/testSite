<?php
$menu = [
    'home'=>"/",
    'google'=>"https://google.com"
];


$head = view("view/head.php", ["anon" => $menu]);

$array = [
  "title"=>"Huiait",
    'head'=>$head,
  "body"=>"vasea"
];
echo view("view/layout.php", $array);