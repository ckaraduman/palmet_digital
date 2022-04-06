<?php
	
header('Content-Type: text/html; charset=utf-8');
DEFINE ('DBUSER', 'ckaraduman'); 
DEFINE ('DBPW', 'Ck2145'); 
DEFINE ('DBHOST', '172.16.1.19'); 
DEFINE ('DBNAME', 'energy'); 
$dbc = mysqli_connect(DBHOST,DBUSER,DBPW);
if (!$dbc) {
    die("Database connection failed: " . mysqli_error($dbc));
    exit();
}

$dbs = mysqli_select_db($dbc, DBNAME);
if (!$dbs) {
    die("Database selection failed: " . mysqli_error($dbc));
    exit(); 
}
$result = mysqli_query($dbc, "SHOW COLUMNS FROM bef");
mysqli_query($dbc, "SET NAMES UTF8");
$numberOfRows = mysqli_num_rows($result);
if ($numberOfRows > 0) {

/* By changing Fred below to another specific persons name you can limit access to just the part of the database for that individual. You could eliminate WHERE recorder_id='Fred' all together if you want to give full access to everyone. */
$Bina = mysqli_real_escape_string($dbc,$_GET['BinaId']);
$values = mysqli_query($dbc, "SELECT * FROM bef where bina_id='$Bina'");
while ($rowr = mysqli_fetch_row($values)) {
 for ($j=0;$j<$numberOfRows;$j++) {
  $csv_output .= $rowr[$j].", ";
 }
 $csv_output .= "\n";
}

}

print $csv_output;
exit;
?>