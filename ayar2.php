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
//session_start();
	try
	{
		$connect = new PDO( "sqlsrv:Server=172.16.1.19,1433;Database=TMX", "ckaraduman", "z43T271RRe%");
		$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e)
	{
		die( print_r( $e->getMessage()));
	}

	try
	{
		$connect = new PDO( "sqlsrv:Server=172.16.1.19,1433;Database=energy", "ckaraduman", "z43T271RRe%");
		$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch(Exception $e)
	{
		die( print_r( $e->getMessage()));
	}



	/*$tsql = "select * from Test_Cem";
	$getResults = $connect->prepare($tsql );
		$getResults->execute();
		$results = $getResults->fetchAll(PDO::FETCH_BOTH);

		foreach($results as $row){
			echo $row[0].' '.$row[1];
			echo '<br>';
		}
	*/
?>
