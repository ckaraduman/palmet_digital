<?php

	$server = "172.16.1.19";
	$database = "energy";
	$kullaniciadi = "admin";
	$sifre = "password";

	try {
		 $baglan = new PDO("sqlsrv:Server=$server;Database=$database", $kullaniciadi, $sifre);
	} catch ( PDOException $e ){
		echo $e->getMessage();
	}
  if ($baglan) {
    echo "Bağlantı Başarılı";
  }else {
    echo "Başarısız";
  }

?>