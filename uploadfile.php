

<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");
$user = check_user();

if(isset($_FILES['datei'])){

foreach($_FILES['datei']['tmp_name'] as $key => $tmp_name)
{


$upload_folder = 'upload/'.($user['username']) .'/'; //Das Upload-Verzeichnis
	if (!file_exists($upload_folder)) {
		mkdir($upload_folder, 0777, true);
	}


$filename = pathinfo($_FILES['datei']['name'][$key], PATHINFO_FILENAME);
$extension = strtolower(pathinfo($_FILES['datei']['name'][$key], PATHINFO_EXTENSION));

	// Verlässt die Schleife ohne Fehler, falls weniger als 5 Bilder hochgeladen werden

	if(empty($_FILES['datei']['size'][$key])){
		break;
	}
//Überprüfung der Dateiendung
$allowed_extensions = array('png', 'jpg', 'jpeg', 'gif');
if(!in_array($extension, $allowed_extensions)) {
	die("Ungültige Dateiendung. Nur png, jpg, jpeg und gif-Dateien sind erlaubt");
}

//Überprüfung der Dateigröße
$max_size = 500*1024; //500 KB
if($_FILES['datei']['size'][$key] > $max_size) {
	die("Bitte keine Dateien größer 500kb hochladen");
}

//Überprüfung dass das Bild keine Fehler enthält
if(function_exists('exif_imagetype')) { //Die exif_imagetype-Funktion erfordert die exif-Erweiterung auf dem Server
	$allowed_types = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
	$detected_type = exif_imagetype($_FILES['datei']['tmp_name'][$key]);
	if(!in_array($detected_type, $allowed_types)) {
		die("Nur der Upload von Bilddateien ist gestattet");
	}
}

//Pfad zum Upload
$new_path = $upload_folder.$filename.'.'.$extension;

//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($new_path)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
	$id = 1;
	do {
		$new_path = $upload_folder.'_'.$id.'.'.$extension;
		$id++;
	} while(file_exists($new_path));
}

//Alles okay, verschiebe Datei an neuen Pfad
	move_uploaded_file($_FILES['datei']['tmp_name'][$key], $new_path);
	echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a><br />';

}
}else{
	echo "something went wrong";
}




$dz=fopen($upload_folder."daten.csv","a");
		 if(!$dz)
			 {
				 echo "Datei konnte nicht zum Schreiben geöffnet werden.";
				 exit;
			 }

 fputs($dz,$_POST["Name"].";".$_POST["Höhe"].";"
		 .$_POST["Breite"].";".$_POST["Länge"].";"
		 .$_POST["Gewicht"].";".$_POST["Farbe"].";\n");

		 echo "Ihre Eingaben wurden gespeichert.";

 fclose($dz);


?>
