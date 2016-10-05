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

<form action="uploadfile.php" method="post" enctype="multipart/form-data" >

       <p><input type="text" name="Name" /> Name
       <input type="text" name="Material" /> Material
       <input type="text" name="Farbe" /> Farbe
          <input type="text" name="Gewicht" /> Gewicht.</p>
       <p><input type="text" name="Höhe" /> Höhe
          <input type="text" name="Breite" />  Breite</p>
          <input type="file" name="datei[]">
    <input type="file" name="datei[]">
    <input type="file" name="datei[]">
<br>
       <p><input type="submit" value="senden" />
          <input type="reset" value="löschen" /></p>


</form>


</div>
</div>
<?php
include("templates/footer.inc.php")
?>
