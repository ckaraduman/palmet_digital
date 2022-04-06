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
echo"<head>";
echo"<title>Palmet Digital</title>";
echo"</head>";
echo "<meta charset='utf-8'>";

/* Burada çalışma yapılacak */

//include("ayar.php");
//include("ayar2.php");

//require "ayar.php";
ob_start();
session_start();
$user_name = $_POST['kadi'];
$user_pass = $_POST['sifre'];
$user_region = $_POST['bolge'];

if ($user_region == "palgaz") {
    $bolge_kodu = 1;
    }
if ($user_region == "izgaz") {
    $bolge_kodu = 2;
    }
if ($user_region == "palen") {
    $bolge_kodu = 3;
    }
$server_name = "mysql1004.mochahost.com";
$mysql_username = "cemilker_cem";
$mysql_password = "cem130371";
$db2_name = "cemilker_makroport";
$conn2 = mysqli_connect($server_name, $mysql_username, $mysql_password, $db2_name);
$mysql_qry = "select * from palmet_login where username like '$user_name' and password like '$user_pass';";
$result = mysqli_query($conn2,$mysql_qry);
$data=mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0) {
        echo $data["bolge_yetkisi"];
        echo "<br>";
        echo $bolge_kodu;
        echo "<br>";
        if (($data["bolge_yetkisi"])==($bolge_kodu) or ($data["bolge_yetkisi"])==9) {
            echo "Yetkiniz var!";
            $_SESSION["login"] = "true";
            $_SESSION["user"] = $user_name;
            $_SESSION["pass"] = $user_pass;
            $_SESSION["region"] = $user_region;

            echo $user_region;

      header("Location:admin.php");
        }
        else {
            echo "Seçilen dağıtım bölgesi için yetkiniz yok!";
        }
}
else {
echo "<br> Giriş yapılamadı! <br>";
}
ob_end_flush();
?>
