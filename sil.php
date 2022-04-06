<?php 
 
include("ayar.php");
ob_start();
session_start();
 
if(!isset($_SESSION["login"])){
    header("Location:index.php");
}
else {
?>
<html>
	<head>
    <h1>Palmet Ön Ödemeli Tüketim Uygulaması</h1>
    <h2>Ön Ödemeli Müşteriler Kayıt Güncelleme Ekranı</h2>
    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="yeni_kayit.php">Kayıt Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="kayitlar.php">Kayıt Listele</a>
    </div>
</html> 
<?php
$silinecekID= $_GET['id'];
echo "<br><br>";
echo $silinecekID;
echo "<br><br>";
if ($_GET) 
{



$sql = "delete from kit where oom_id='".$silinecekID."'";
            $res=mysqli_query($conn,$sql);
            echo 'Kayıt silindi!';
            
            while ($row=mysqli_fetch_array($res)) {
                }
            }
    }
?>