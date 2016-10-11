<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 01.10.16
 * Time: 14:36
 */

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
session_start();
$user = check_user();
$t=time();

$upload_folder = 'upload/'.($user['username']) .'/'; //Das Upload-Verzeichnis
	if (!file_exists($upload_folder)) {
		mkdir($upload_folder, 0777, true);
	}


if(isset($_POST['trackingID']) and isset($_POST["BestellNr"])){

    $trackingID = $_POST['trackingID'];
    $bestellNr = $_POST["BestellNr"];
    $statement = $pdo->prepare("UPDATE tbestellung SET cTracking='{$trackingID}' WHERE cBestellNr='{$bestellNr}'");
    var_dump($statement);
    $result = $statement->execute();
    #$user = $statement->fetch();
    
    
    $dz=fopen($upload_folder.date("Y_m_d_",$t)."neueTrackingIDS.csv","a");
		 if(!$dz)
			 {
				 $note = "Datei konnte nicht zum Schreiben geöffnet werden.";
				 exit;
			 }

 fputs($dz,$trackingID.";".$bestellNr.";".date("Y_m_d",$t)."\n");

fclose($dz);	 
echo '<script>alert("TrackingID erfolgreich aktualisiert.")</script>';

echo "<script>window.location = 'http://localhost:8888/Webservice/verkaeufe.php'</script>";
    } else {
       echo "nicht aktualisiert<br><br>";
    }



?>