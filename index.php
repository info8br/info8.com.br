<?php

header("Access-Control-Allow-Origin: *");
header('content-type: application/json; charset=utf-8');
/* header("Access-Control-Allow-Headers: Authorization, Content-Type");
header('content-type: application/json; charset=utf-8');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400'); */

error_reporting(E_ALL);

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
ini_set('memory_limit', '256M');

$dire = isset($_REQUEST["directory"])?$_REQUEST["directory"]:null;
$type = isset($_FILES["file"]["type"])?$_FILES["file"]["type"]:null;
$size = isset($_FILES["file"]["size"])?$_FILES["file"]["size"]:null;
$name = isset($_REQUEST["filename"])?$_REQUEST["filename"]:null;
$file = isset($_FILES["file"])?$_FILES["file"]:null;

  require "file_permissions.php";

if($dire and in_array($type,$valid_types)){

  require "mkdir.php";
  require "save.php";  
  
  $json["message"]   = "Sucesso";
  
}else{
  
  $json["message"]   = "Erro";
  
}

  $json["filename"]  = $name;  
  $json["hash"]      = $dire;
  $json["type"]      = $type;
  $json["size"]      = $size;
  $json["file"]      = $file;

echo json_encode($json);

?>