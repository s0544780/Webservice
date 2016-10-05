<?php

/**
 * Created by PhpStorm.
 * User: student
 * Date: 01.10.16
 * Time: 14:36
 */

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");


if(isset($_POST['trackingID']) and isset($_POST["BestellNr"])){

    $trackingID = $_POST['trackingID'];
    $bestellNr = $_POST["BestellNr"];
    $statement = $pdo->prepare("UPDATE tbestellung SET cTracking='{$trackingID}' WHERE cBestellNr='{$bestellNr}'");
    var_dump($statement);
    $result = $statement->execute();
    $user = $statement->fetch();
    echo "TrackingID erfolgreich aktualisiert!<br><br><a href=\"javascript:history.go(-1)\">zurück zur vorherigen Seite</a>";
    } else {
       echo "nicht aktualisiert<br><br>";
    }



?>