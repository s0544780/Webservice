<?php
header("Content-Type: text/html; charset=utf-8");

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
SESSION_START();

$_SESSION["username"] = "Heinz";
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
	<th>Hersteller</th>
	<th>Bezeichung</th>
	<th>Nettopreis</th>
	<th>Anzahl</th>
	<th>Datum</th>
    <th>TrackingID</th>
	<th>Transaktionsnummer</th>
</tr>
<?php

$statement = $pdo->prepare("select H.cName as Hersteller, A.cName, fPreis, nAnzahl, B.dBezahltDatum, B.cBestellNr, B.cTracking from tbestellung B
join twarenkorb K on B.kWarenkorb = K.kWarenkorb
join twarenkorbpos KP on KP.kWarenkorb = K.kWarenkorb
join tartikel A on A.kArtikel =  KP.kArtikel
join thersteller H on A.kHersteller = H.kHersteller
where H.cName = '$user[username]' ");
$result = $statement->execute();
$count = 1;
$netamount = 0;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['Hersteller']."</td>";
	echo "<td>".$row['cName']."</td>";
    echo "<td>".number_format($row['fPreis']* 1.19,2)."</td>";
	echo "<td>".number_format($row['nAnzahl'])."</td>";
  	echo "<td>".$row['dBezahltDatum']."</td>";
    if(empty($row['cTracking']))
    { $bestellID = $row['cBestellNr'];
        echo "<td>   
            <form action=\"trackingIDupdate.php\" method=\"post\" >
                <input type=\"text\" name=\"trackingID\" placeholder='insert trackingID'>
                <input type=\"hidden\" name=\"BestellNr\" value=\"$bestellID\" />
                <input type=\"submit\" value=\"Submit\">
            </form> 
            </td>";}
    else{echo "<td>".$row['cTracking']."</td>";
    };
	echo "<td>".$row['cBestellNr']."</td>";
	echo "</tr>";
  $netamount = $netamount + ($row['nAnzahl'] * $row['fPreis']*1.19);
}


?>
</table>

</div>
<?php echo number_format($netamount, 2)." €" ; ?>
<?php
include("templates/footer.inc.php")
?>
