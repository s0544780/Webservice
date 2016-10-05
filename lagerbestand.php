<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
?>


<div class="container main-container">

<div class="panel panel-default">

<table class="table">
<tr>
	<th>#</th>
	<th>Artikelname</th>
	<th>Lagerbestand</th>
</tr>
<?php

$statement = $pdo->prepare("select A.cName, A.fLagerbestand, thersteller.cName as Hersteller, A.cSeo from tartikel as A
JOIN thersteller on A.khersteller = thersteller.khersteller
where thersteller.cName = '$user[username]'");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td><a  href='http://malendo.de/{$row['cSeo']}' target='_blank'>".$row['cName']."</td>";
	echo "<td>".$row['fLagerbestand']."</td>";

	echo "</tr>";
}
?>
</table>
</div>
	
</div>
<?php
include("templates/footer.inc.php")
?>
