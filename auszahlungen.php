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
	<th>von</th>
	<th>bis</th>
	<th>Auszahlungsbetrag</th>
</tr>

<?php
$statement = $pdo->prepare("
select H.cName as Hersteller,fPreis * sum(nAnzahl) as Auszahlungsbetrag
, case
  WHEN DATEDIFF(B.dBezahltDatum, date_format(B.dBezahltDatum, '%Y.%m.01')) <  DATEDIFF(LAST_DAY(B.dBezahltDatum), B.dBezahltDatum)
  THEN @interval_start := date_format(B.dBezahltDatum, '%Y-%m-01')
  ELSE @interval_start := date_format(B.dBezahltDatum, '%Y-%m-01') + INTERVAL 14 DAY
  END as Auszahlung_von
, case
   WHEN DATEDIFF(B.dBezahltDatum, date_format(B.dBezahltDatum, '%Y.%m.01')) <  DATEDIFF(LAST_DAY(B.dBezahltDatum), B.dBezahltDatum)
  THEN @interval_ende := date_format(B.dBezahltDatum, '%Y-%m-01') + INTERVAL 14 DAY
  ELSE @interval_ende := last_day(B.dBezahltDatum)
  END as Auszahlung_bis
from tbestellung B
join twarenkorb K on B.kWarenkorb = K.kWarenkorb
join twarenkorbpos KP on KP.kWarenkorb = K.kWarenkorb and kArtikel != 0
join tartikel A on A.kArtikel =  KP.kArtikel
join thersteller H on A.kHersteller = H.kHersteller
where H.cName = '$user[username]'
AND B.dBezahltDatum != '0000-00-00'
GROUP BY Auszahlung_von, Auszahlung_bis
");
$result = $statement->execute();
$count = 1;
while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['Auszahlung_von']."</td>";
	echo "<td>".$row['Auszahlung_bis']."</td>";
	echo "<td>".number_format($row[Auszahlungsbetrag]* 1.19,2)."</td>";
	echo "</tr>";
}
?>
</table>
</div>

</div>
<?php
include("templates/footer.inc.php")
?>
