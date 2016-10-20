<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		<title>DataTables Bootstrap 3 example</title>

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 
		<script type="text/javascript" 
		src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#example').DataTable();
			} );
		</script>
	</head>
	
	<?php
header("Content-Type: text/html; charset=utf-8");
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();

include("templates/header.inc.php");

$statement = $pdo->prepare("select A.cName, A.fLagerbestand, thersteller.cName as Hersteller, A.cSeo from tartikel as A
JOIN thersteller on A.khersteller = thersteller.khersteller
where thersteller.cName = '$user[username]'");
$result = $statement->execute();
$count = 1;

?>
	
	<body>
	<div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                 <!-- Navbar -->
                    <?php include("templates/nav.inc.php") ?>                                 
             </div>             </div>

		<div class="col-md-10">
  					<div class="content-box-large">
		  				<div class="panel-heading">
              <table class="table" id="example" class="table table-striped table-bordered" cellspacing="0"> 
						      <thead>
				                <tr>
				                <th>#</th>
	                            <th>Artikelname</th>
	                            <th>Lagerbestand</th>
				                </tr>
				            </thead>
						    <tbody>
							    <?php
				                while($row = $statement->fetch()) {
	                            echo "<tr>";
	                            echo "<td>".$count++."</td>";
	                            echo "<td><a  href='http://malendo.de/{$row['cSeo']}' target='_blank'>".$row['cName']."</td>";
	                            echo "<td>".$row['fLagerbestand']."</td>";
                                echo "</tr>";}
				                ?>
						    </tbody>
					        </table>
			
		</div>
				</div>
		</div>
		</div>		</div>



<script type="text/javascript">
	// For demo to fit into DataTables site builder...
	$('#example')
		.removeClass( 'display' )
		.addClass('table table-striped table-bordered');
</script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
	</body>
	 <footer class="footer">
         <div class="container">
            <div class="copy text-center">
               Copyright 2016 <a href='http://www.malendo.de'>MALENDO</a>
            </div>
         </div>
    </footer>
</html>



  