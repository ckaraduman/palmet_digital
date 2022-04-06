<?php
    
    $baglanti = odbc_connect('DRIVER={SQL Server};SERVER=172.16.1.19;DATABASE=energy','ckaraduman','Ck2145'); 	
	
    if ($baglanti)
    	    echo "<span style='color:green'>Bağlandı2</span>"."</br>"; 	
    echo 	

    //$sorgu2 = odbc_exec($baglanti,"UPDATE $tablo SET adisoyadi='Suat DİLEK' where tcno='$tc'");

    //$sorgu = odbc_exec($baglanti,"SELECT adisoyadi FROM $tablo where tcno='$tc'");


    while( $bilgi = odbc_fetch_array($sorgu) ){
      print_r($bilgi);
}
?>