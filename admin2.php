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

		<style type="text/css">
			body
			{
				//background:#FFC;
				font-size:30px;
				text-align:center;

			}

			#anadiv
			{
				width:1000px;
				margin:0 auto;
				background:white;
			}

			#ust
			{
				height:150px;
				border:1px solid blue;
				margin-bottom:10px;
				font-size:100px;
			}

			#sol
			{
				width:730px;
				float:left;
				height:493px;
				border:1px solid blue;
				margin-right:10px;
			}

			#sag
			{
				float:left;
				height:240px;
				width:250px;
				border:1px solid blue;
				margin-bottom:10px;
			}

			.alt{

				border:1px solid blue;
				margin-top:10px;
				height:50px;
			}
			.sil
			{
				clear:both;
			}
		</style>
	</head>
	<body>
		<div id="anadiv">
			<div id="ust">Palmet</div>
			<div id="Sol">Ön Ödemeli Müşteriler</div>
			<div id="Sag">Kullanıcı Giriş</div>
			<div id="Sag">Hakkımızda</div>
			<div class="sil"></div>
			<div class="alt">Alt</div>
		</div>
	</body>


<textarea name='metin_kutusu_1' rows='10' cols='100' wrap='hard' readonly>By Cem İlker Karaduman CopyRight 2020</textarea>
<br><br><center>Admin sayfasina hosgeldiniz..!
<br><a href=logout.php>Guvenli cikis</a></center>
</html>
<?php
}
?>
