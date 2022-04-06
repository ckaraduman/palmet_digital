<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
$_GET = array_map(function($get){
return htmlspecialchars(trim($get));
},$_GET);
$_POST = array_map(function($post){
return htmlspecialchars(trim($post));
},$_POST);
//Security Code
ob_start();
session_start();
$db_name = "cemilker_palmet_".$_SESSION["region"];
echo $db_name;

$mysql_username = "cemilker_cem";
$mysql_password = "cem130371";
$server_name = "mysql1004.mochahost.com";
$db2_name = "cemilker_makroport";
$conn = mysqli_connect($server_name, $mysql_username, $mysql_password, $db_name);
$conn2 = mysqli_connect($server_name, $mysql_username, $mysql_password, $db2_name);
mysqli_query($conn, "SET NAMES UTF8");
if ($conn) {
//echo "Bağlantı başarılı!";
}
else {
echo "Bağlantı sağlanamadı!";
}
?>
