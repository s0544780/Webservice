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

       <br />


    <div class="row">
        <div class="col-xs-3">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Name" placeholder="Name">
        </div>
        <div class="col-xs-4">
            <label for="exampleInputPassword1">Material</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Material" placeholder="Material">
        </div>
        <div class="col-xs-5">
            <label for="exampleInputPassword1">Farbe</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Farbe" placeholder="Farbe">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            <label for="exampleInputPassword1">Gewicht</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Gewicht" placeholder="Gewicht">
        </div>
        <div class="col-xs-4">
            <label for="exampleInputPassword1">Höhe</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Höhe" placeholder="Höhe">
        </div>
        <div class="col-xs-5">
            <label for="exampleInputPassword1">Breite</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Breite" placeholder="Breite">
        </div>
    </div>



    <br />

    <input type="file"   name="datei[]">
    <input type="file" name="datei[]">
    <input type="file" name="datei[]">
    <input type="file" name="datei[]">
    <input type="file" name="datei[]">
<br>
       <p><input type="submit" class="btn btn-primary" value="senden" />
          <input type="reset" class="btn btn-warning" value="löschen" /></p>


</form>


</div>
</div>
<?php
include("templates/footer.inc.php")
?>
