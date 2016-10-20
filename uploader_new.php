<?php include("templates/header.inc.php");
//Überprüfe, dass der User eingeloggt ist
//Der Aufruf von check_user() muss in alle internen Seiten eingebaut sein
$user = check_user();
?>

<script type="text/javascript">
<!--
var count = 0
function countCheckedBoxes(elem) {
     if(elem.checked)  {
          if(count <= 3)  {
              count = count + 1;
              if(count > 3)  {
                   count = 3;
                   elem.checked = false;
              }
          }
     } else {
         count = count - 1;
         if(count < 0)  count = 0;
     }
}

//-->
</script>  

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
		  				<form action="formular_upload.php" method="post" enctype="multipart/form-data" >

            <label>Name</label>
            <input type="text" name="Name" placeholder="Name" required> <!-- Artikelname -->
            <br /><br />
            <label>Beschreibung</label>
            <input type="text" name="Beschreibung" placeholder="Beschreibung"> 
            <!-- Artikelbeschreibung Umbruch muss per <br> gelöst werden /n wird nicht akzeptiert -->
            <br /><br />
            <label>Artikelmenge</label>
            <input type="text" name="Menge" placeholder="Menge"> <!--Artikelmenge-->
            
            <label>Eigene Artikelnummer</label>
            <input type="text" name="HAN" placeholder="HAN"> <!--HAN Hersteller Artikelnummer-->
            <br /><br />
            <label>Verkaufspreis</label>
            <input type="text" name="Verkaufspreis" placeholder="Verkaufspreis"> <!--Verkaufspreis-->
            <br /><br />
            
            Wähle die Merkmale deines Artikels
            <br /><br />
            <label>Stil</label>
            <select type="text" name="Stil" required> <!--Stil-->
            <option></option>
            <option value="elegant">elegant</option><!--darf nicht anwählbar sein-->
            <option value="ethno">ethno</option>
            <option value="schrill">schrill</option>
            <option value="vintage">vintage</option>            
            <option value="verspielt">verspielt</option>            
            </select>    
                    
            <label>Material</label>
            <select type="text" name="Material" required> <!--Material-->
            <option></option>
            <option value="Baumwolle">Baumwolle</option>
            <option value="Bio-Stoffe">Bio-Stoffe</option>
            <option value="Filz">Filz</option>
            <option value="Holz">Holz</option>            
            <option value="Jersey">Jersey</option>
            <option value="Kunstleder">Kunstleder</option>
            <option value="Leder">Leder</option>
            <option value="Metall">Metall</option>
            <option value="Wolle">Wolle</option>
            <option value="Sonstige">Sonstige</option>            
            </select>    
            
            <br /><br />
            Farben deines Artikels (Wähle bis zu 3 Farben aus)<br /><br /><!-- max 3 St. dürfen gewählt werden  Passendes JAVA Script ist oben muss aber noch geändert werden-->
            <label><input type="checkbox" name="Farbe[]" value="schwarz" placeholder="schwarz" onclick="countCheckedBoxes(this)">schwarz</label>
            <label><input type="checkbox" name="Farbe[]" value="weiß" placeholder="weiß" onclick="countCheckedBoxes(this)">weiß</label>
            <label><input type="checkbox" name="Farbe[]" value="gelb" placeholder="gelb" onclick="countCheckedBoxes(this)">gelb</label>
            <label><input type="checkbox" name="Farbe[]" value="rot" placeholder="rot" onclick="countCheckedBoxes(this)">rot</label>
            <label><input type="checkbox" name="Farbe[]" value="blau" placeholder="blau" onclick="countCheckedBoxes(this)">blau</label>
            <label><input type="checkbox" name="Farbe[]" value="oliv" placeholder="oliv" onclick="countCheckedBoxes(this)">oliv</label>
            <label><input type="checkbox" name="Farbe[]" value="beige" placeholder="beige" onclick="countCheckedBoxes(this)">beige</label>
            <label><input type="checkbox" name="Farbe[]" value="braun" placeholder="braun" onclick="countCheckedBoxes(this)">braun</label>
            <label><input type="checkbox" name="Farbe[]" value="orange" placeholder="orange" onclick="countCheckedBoxes(this)">orange</label>
            <label><input type="checkbox" name="Farbe[]" value="dunkelrot" placeholder="dunkelrot" onclick="countCheckedBoxes(this)">rosa</label>
            <label><input type="checkbox" name="Farbe[]" value="rosa" placeholder="rosa" onclick="countCheckedBoxes(this)">rosa</label>
            <label><input type="checkbox" name="Farbe[]" value="pink" placeholder="pink" onclick="countCheckedBoxes(this)">pink</label>
            <label><input type="checkbox" name="Farbe[]" value="lila" placeholder="lila" onclick="countCheckedBoxes(this)">lila</label>
            <label><input type="checkbox" name="Farbe[]" value="violett" placeholder="violett" onclick="countCheckedBoxes(this)">violett</label>
            <label><input type="checkbox" name="Farbe[]" value="hellblau" placeholder="hellblau" onclick="countCheckedBoxes(this)">hellblau</label>
            <label><input type="checkbox" name="Farbe[]" value="türkis" placeholder="türkis" onclick="countCheckedBoxes(this)">türkis</label>
            <label><input type="checkbox" name="Farbe[]" value="hellgrün" placeholder="hellgrün" onclick="countCheckedBoxes(this)">hellgrün</label>
            <label><input type="checkbox" name="Farbe[]" value="grün" placeholder="grün" onclick="countCheckedBoxes(this)">grün</label>
            <label><input type="checkbox" name="Farbe[]" value="dunkelgrün" placeholder="dunkelgrün" onclick="countCheckedBoxes(this)">dunkelgrün</label>
            <label><input type="checkbox" name="Farbe[]" value="hellgrau" placeholder="hellgrau" onclick="countCheckedBoxes(this)">hellgrau</label>
            <label><input type="checkbox" name="Farbe[]" value="dunkelgrau" placeholder="dunkelgrau" onclick="countCheckedBoxes(this)">dunkelgrau</label>
            <label><input type="checkbox" name="Farbe[]" value="gold" placeholder="gold" onclick="countCheckedBoxes(this)">gold</label>
            <label><input type="checkbox" name="Farbe[]" value="silber" placeholder="silber" onclick="countCheckedBoxes(this)">silber</label>
            <label><input type="checkbox" name="Farbe[]" value="bronze" placeholder="bronze" onclick="countCheckedBoxes(this)">bronze</label>
            <label><input type="checkbox" name="Farbe[]" value="bunt" placeholder="bunt" onclick="countCheckedBoxes(this)">bunt</label>
            
 
 
            <br /><br />
            <label>Kategorie auswählen</label>
            <select type="text" name="Kategorie" required> <!--Kategorie-->
            <option></option>
            <optgroup label="Schmuck">--- Schmuck ---<!--darf nicht anwählbar sein-->
            <option value="Armbänder">Armbänder</option>
            <option value="Broschen">Broschen</option>
            <option value="Ketten">Ketten</option>
            <option value="Kosmetiktaschen">Lederschmuck</option>
            <option value="Ohrringe">Ohrringe</option>
            <option value="Ringe">Ringe</option>
             </optgroup>
            <optgroup label="Taschen">--- Taschen ---<!--darf nicht anwählbar sein-->
            <option value="Einkaufstaschen">Einkaufstaschen</option>
            <option value="Etuis">Etuis</option>
            <option value="Handtaschen">Handtaschen</option>
            <option value="Kosmetiktaschen">Kosmetiktaschen</option>
            <option value="Notebook">Notebook</option>
            <option value="Portemonnaies">Portemonnaies</option>
            <option value="Rucksäcke">Rucksäcke</option>
            <option value="Turnbeutel">Turnbeutel</option>
            <option value="weitere Taschen">weitere Taschen</option>
            </optgroup>
             <optgroup label="Accessoires">--- Accessoires ---<!--darf nicht anwählbar sein-->
            <option value="Alles zum Schlüssel">Alles zum Schlüssel</option>
            <option value="Haarschmuck">Haarschmuck</option>
            <option value="Kopfbedeckung">Kopfbedeckung</option>
            <option value="Schlauchschals">Schlauchschals</option>
             </optgroup>
            
            </select>
            <br /><br />
            <label>Suchbegriffe</label>
            <input type="text" name="Suchbegriffe[]" placeholder="Suchbegriffe1"> <!--Suchbegriffe1-->
            <input type="text" name="Suchbegriffe[]" placeholder="Suchbegriffe2"> <!--Suchbegriffe2-->
            <input type="text" name="Suchbegriffe[]" placeholder="Suchbegriffe3"> <!--Suchbegriffe3-->
            <input type="text" name="Suchbegriffe[]" placeholder="Suchbegriffe4"> <!--Suchbegriffe4-->
            <input type="text" name="Suchbegriffe[]" placeholder="Suchbegriffe5"> <!--Suchbegriffe5-->
            <br /><br />
            weitere Produktinformationen<br />
            <br />
            <label>Höhe</label>
            <input type="text" name="Hoehe" placeholder="Höhe"> <!-- Höhe -->
        
            <label>Breite</label>
            <input type="text" name="Breite" placeholder="Breite"> <!-- Breite -->
            
            <label>Tiefe</label>
            <input type="text" name="Tiefe" placeholder="Tiefe"> <!-- Breite -->
            <br /><br />
            <label>Gewicht</label>
            <input type="text" name="Gewicht" placeholder="Gewicht"> <!-- Artikelgewicht -->
            <br /><br />
           
            <!-- DAS KANN EIGENTLICH RAUS DA OBEN DAS FELD SCHON DRIN IST
            <label>Material</label>
            <input type="text" name="Material" placeholder="Material">
            <br /><br /> -->
            
        
        
    <input type="file" name="datei[]"><br />
    <input type="file" name="datei[]"><br />
    <input type="file" name="datei[]"><br />
    <input type="file" name="datei[]"><br />
    <input type="file" name="datei[]"><br />
<br />
       <input type="submit" value="senden" />
          <input type="reset" value="löschen" />

</form>
 </div> </div> </div> </div> 
<?php
include("templates/footer.inc.php")
?>
