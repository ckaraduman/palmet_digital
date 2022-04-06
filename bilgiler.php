    <input type="button" name="button" id="deneme" value="Deneme1 Butonu">
 
    <br><br>
    
    <form method="post"><input type="submit" name="premac" id="premac" value="Deneme2" style="position: absolute; left: 10px; top:50px; width: 100px; height: 23px;z-index: 8;"></form>

    <br><br>

    <td width='80' align='center'><a href='http://www.google.com' onclick='return fonksiyon();'>Deneme3</a>

    
    <!--Bu script "Deneme1 Butonu" yazan butonun çalışacağı kodları barındırır -->
    <script>
	var btnDeneme=document.getElementById("deneme");
	btnDeneme.onclick=function(){
		window.alert("Siteme Hoşgeldiniz");    
	}
    </script>
 

    <!--Bu blok ise "Deneme2" yazan butonun çalışacağı kodları barındırır -->
    <?php 
                   
        if(isset($_POST["premac"])){
                    
        Echo "<br><br><br><br>Merhaba, deneme tamamdır!";
                    
        }
                   
    ?>

    <!--Bu blok "Deneme3" yazan köprü-kelimenin çalışacağı kodları barındırır, tamam cevabına köprünün tanımlandığı cümledeki linke gider, iptal cevabına sitede kalır -->
    <script language="JavaScript">
    function fonksiyon() {
 
    if (confirm("İyi misiniz?"))
    return true;
    else 
    return false;
    }
    </script>

----------------------------------------------------------------------------------------------------------

MYSQL VERİ ÇEKME İŞLEMİ ÖRNEĞİ

<?php
   $dbanamakine = 'localhost';
   $dbkullanici = 'root';
   $dbsifre = '';
   
   $baglanti = mysql_connect($dbanamakine, $dbkullanici, $dbsifre);
   
   if(! $baglanti) {
      die('Bağlanılamıyor: ' . mysql_error());
   }
   
   $sql = 'SELECT id, ad, maas FROM memurlar';
   mysql_select_db('ornek_veritabani');
   $gelenveri = mysql_query( $sql, $baglanti );
   
   if(! $gelenveri ) {
      die('Veri alınamadı: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($gelenveri, MYSQL_ASSOC)) {
      echo "ID :{$row['id']}  <br> ".
         "ADI : {$row['ad']} <br> ".
         "MAAŞI : {$row['maas']} <br> ".
         "--------------------------------<br>";
   }
   
   echo "Başarılı bir şekilde veri alındı\n";
   
   mysql_close($baglanti);
?>

----------------------------------------------------------------------------------------------------------






<!-- Köprü verilmiş kelime ile işlem yaptırmak için 

    Bağlantıyı bu satırla ver;
    <td width='80' align='center'><a href='donem_sil.php?id=".$row['donem_id']."' onclick='return uyari();'>Sil</a>
    
    Bu kodları işlem yapılacak şekilde sayfada başka bir yere koyabilirsin; 
    <script language="JavaScript">
    function uyari() {
 
    if (confirm("Bu kaydı silmek istediğinize emin misiniz?"))
   return true;
    else 
   return false;
    }
    </script>

----------------------------------------------------------------------------------------------------------------------
    Buton için;

    <input type="button" name="button" id="deneme" value="Deneme Butonu">

    Herhangi bir yere;
    
    <script>
	
 
    var btnDeneme=document.getElementById("selam");
	btnSelam.onclick=function(){
		window.alert("Siteme Hoşgeldiniz");
	}
    </script>

    
----------------------------------------------------------------------------------------------------------------------





    BUTONLA KOD ÇALIŞTIRMAK İÇİN : <form method="post"><input type="submit" name="premac" id="premac" value="Aktif et" style="position: absolute; left: 76px; top: 151px; width: 61px; height: 23px;z-index: 8;"></form>
                
                <?php 
                   
                if(isset($_POST["premac"])){
                    
                //kodlar buraya
                    
                }
                   
                 ?>     

-->