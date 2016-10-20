<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");
$statement = $pdo->prepare("
select H.cName as Hersteller,sum(fPreis * (1+(A.fMwSt/100)) * 0.12) * 1.19 as BruttoProvi
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
,  sum(fPreis * (1+(A.fMwSt/100))) - sum(fPreis * (1+(A.fMwSt/100)) * 0.12) * 1.19  as Auszahlungsbetrag
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

?>

 <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                 <!-- Navbar -->
                    <?php include("templates/nav.inc.php") ?>
                                    
             </div>
		  </div>
  				<div class="col-md-10">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					<table class="table"> <!--  -->
				              <thead>
				                <tr>
				                <th>#</th>
	<th>von</th>
	<th>bis</th>
	<th>Gebühr</th>
	<th>Auszahlungsbetrag</th>
				                </tr>
				              </thead>
				              <tbody>
				               <?php
                                            // classes: success, danger, warning
				            while($row = $statement->fetch()) {
	echo "<tr>";
	echo "<td>".$count++."</td>";
	echo "<td>".$row['Auszahlung_von']."</td>";
	echo "<td>".$row['Auszahlung_bis']."</td>";
	echo "<td>".number_format($row[BruttoProvi],2)." €</td>";
    echo "<td>".number_format($row[Auszahlungsbetrag],2)." €</td>";
	echo "</tr>";
}
				               ?>
			
				              </tbody>
				            </table>
		  				</div>
		  			</div>
  				</div>
</div>
</div>

<?php
include("templates/footer.inc.php")
?>
