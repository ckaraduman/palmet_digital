<?php
//Security Code
$_POST = array_map(function($post){
return htmlspecialchars($post);
},$_POST);
//Security Code 
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
    <h2>Ön Ödemeli Müşteriler Listeleme Ekranı</h2>

    <div id="menu">
        <a href="admin.php">Ana Menü</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="yeni_kayit.php">Kayıt Ekle</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="kayitlar.php">Kayıt Listele</a>
        <br><br>
    </div>
</html>
<?php
echo "<table  border='1>";
echo "<tr'>";
echo "<th>Sözleşme No</th><th>Müşteri</th>";
echo "</tr>";
            if(isset($_POST["premac"])){
            $sql = "select * from kit";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
echo "<tr>";
echo "<td width='150'>";
echo $row["oom_soz_no"];
echo "</td>";
echo "<td width='400'>";
echo $row["oo_musteri"];
echo "</td>";
echo "</tr>";
                }
            mysqli_close($conn);
            }

            if(isset($_POST["buton1"])){
            $sql = "select * from kit where oom_soz_no=33";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {

            echo $row["oom_soz_no"];
            echo $row["oo_musteri"];
                }
            }

            if(isset($_POST["buton2"])){
            $sql = "update kit set oo_musteri='ilker' where oom_soz_no=33";
            $res=mysqli_query($conn,$sql);
            while ($row=mysqli_fetch_array($res)) {
                }
            }


            echo "</table>";
            echo "<br>Admin sayfasina hosgeldiniz..!";
            echo "<br><a href=logout.php>Guvenli cikis</a>";
            echo "<br><br>";
}
?>

    <form method="post"><input type="submit" name="premac" id="premac" value="Tümünü Listele"></form>
    <form method="post"><input type="submit" name="buton1" id="buton1" value="Kayıt Yap"></form>
    <form method="post"><input type="submit" name="buton2" id="buton2" value="Güncelle"></form>


    <form action="arama.php" method="post">
        Müşteri <input type="text" name="aranan" />
        <input type="submit" value="Arama Yap"/>
    </form>


    <style type="text/css">



    #textarea1{
   resize:none;
   position: fixed;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 50px;
    padding:15px;
    }
    #menu{
      font-size: 14px;
      font-weight: bold;
      word-spacing:0px;
    }
    </style>
 <br><br>
<textarea id='textarea1' name='metin_kutusu_1' rows='1' cols='40' wrap='hard' resize='none' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
