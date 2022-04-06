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
echo "<html>";
echo "<head>";
echo "<style  type='text/css'>";
echo ".tual { width: 960px; margin:0 auto; background-color: burlywood; }";
echo ".sol_menu { width: 300px; height: 600px; float:left; background-color: aqua;  }";
echo ".sag_icerik { width: 660px; height: 600px; float:left; background-color: gold; }";

echo "</style>";
echo "</head>";

echo "<div class='tual'>";
echo "<div class='sol_menu'></div>";
echo "<div class='sag_icerik'></div>";
echo "<div style='clear: both'></div>";
echo "</div>";
echo "<h1>MakroPort Akademi Eğitim Portalı</h1>";
echo "<h3>Eğitim Programları</h3>";
echo "<textarea name='metin_kutusu_1' rows='10' cols='100' wrap='hard' readonly>Bu bölümde Yunanistan’ın coğrafi yapısı ve iklimi ile doğal kaynakları ele alındıktan sonra Yunanların çevreye bakışı, ekolojik dengeyle ilgili görüşleri ve çevreyle doğal kaynakları korumaya yönelik aldıkları tedbirlerden bahsedilecektir.<br>1.1. Yunanistan’ın Coğrafyası, İklimi ve Doğal Kaynakları<br>Yunan kültürü Roma’nın aksine 'Akdeniz' olarak tanımladığımız çevrenin dışında çok nadir çıkmıştır.</textarea>";
    echo "<br><br><center>Admin sayfasina hosgeldiniz..! ";
    echo "<br><a href=logout.php>Guvenli cikis</a></center>";
    echo "</html>";
}
?>
