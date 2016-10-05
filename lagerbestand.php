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

$statement = $pdo->prepare("select A.cName, A.fLagerbestand, thersteller.cName as Hersteller from tartikel as A
JOIN thersteller on A.khersteller = thersteller.khersteller
where thersteller.cName = '$user[username]'");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['cName']."</td>";
	echo "<td>".$row['fLagerbestand']."</td>";

	echo '<td><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></td>';
	echo "</tr>";
}
?>
</table>
</div>

	<div class="row">
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>Thumbnail label</h3>
					<p>...</p>
					<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>Thumbnail label</h3>
					<p>...</p>
					<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-4">
			<div class="thumbnail">
				<img src="..." alt="...">
				<div class="caption">
					<h3>Thumbnail label</h3>
					<p>...</p>
					<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
				</div>
			</div>
		</div>
	</div>

</div>
<?php
include("templates/footer.inc.php")
?>
