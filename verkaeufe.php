
<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");

$statement = $pdo->prepare("select H.cName as Hersteller, A.cName, fPreis, nAnzahl, B.dBezahltDatum, B.cBestellNr, B.cTracking from tbestellung B
join twarenkorb K on B.kWarenkorb = K.kWarenkorb
join twarenkorbpos KP on KP.kWarenkorb = K.kWarenkorb
join tartikel A on A.kArtikel =  KP.kArtikel
join thersteller H on A.kHersteller = H.kHersteller
where H.cName = '$user[username]'
AND B.dBezahltDatum != '0000-00-00'");

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
	<th>Hersteller</th>
	<th>Bezeichung</th>
	<th>Nettopreis</th>
	<th>Anzahl</th>
	<th>bezahlt am</th>
    <th>TrackingID</th>
	<th>Transaktionsnummer</th>
</tr>
				              </thead>
				              <tbody>
				               <?php
                                            // classes: success, danger, warning
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
                <input class=\"form-control \"type=\"text\" name=\"trackingID\" placeholder='TrackingID eintragen'>
                <input type=\"hidden\" name=\"BestellNr\" value=\"$bestellID\" />
                <input class='btn' type=\"submit\" value=\"ID senden\">
            </form>
            </td>";}
    else{echo "<td>".$row['cTracking']."</td>";
    };
	echo "<td>".$row['cBestellNr']."</td>";
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
