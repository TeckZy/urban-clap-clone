<?php
require "Core/Config.php";


$rawdata["asd"][0]=array("Result"=>"Success");
$rawdata["das"][0]=array("Result"=>"Success");
$responseData=array('result' =>array($rawdata) );
$jsonspecify=json_encode($responseData);

print_r($jsonspecify);


?>