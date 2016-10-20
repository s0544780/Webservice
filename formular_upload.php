<?php

$picPaths = array();

session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$user = check_user();
echo "<img src='twister-polka-dots-free-vector.png' />";
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
		continue;
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
	//echo 'Bild erfolgreich hochgeladen: <a href="'.$new_path.'">'.$new_path.'</a><br />';
    $picPaths[] = $new_path;
   
}
}else{
	$note = "something went wrong";
}

$words_kommagetrennt = implode(" ", $_POST['Suchbegriffe']);
$words = implode(",", $_POST['Suchbegriffe']);

                            
                             
$statement = $pdo->prepare("
INSERT INTO tmpArtikel(
Artikelname, HAN, Beschreibung, Verkaufspreis, Artikelmenge, Hersteller, Artikelgewicht, Haendlerpaket, Hoehe, Breite, Tiefe, Mailadresse, Kategorie, Suchbegriffe, Suchbegriffe_Seo, Meta_Description, Bild_1, Bild_2, Bild_3, Bild_4, Bild_5, Verkaufseinheit, Material, Stil, Farbe_1, Farbe_2, Farbe_3)
VALUES 
(
'{$_POST['Name']}',
'{$_POST['HAN']}',
'{$_POST['Beschreibung']}',
'{$_POST['Verkaufspreis']}',
'{$_POST['Menge']}',
'{$user[username]}',
'{$_POST['Gewicht']}',
'{$user[paket]}',
'{$_POST['Hoehe']}',
'{$_POST['Breite']}',
'{$_POST['Tiefe']}',
'{$user[email]}',
'{$_POST['Kategorie']}',
'{$words}',
'{$words_kommagetrennt}',
'{$_POST['Beschreibung']}',
'$picPaths[0]',
'$picPaths[1]',
'$picPaths[2]',
'$picPaths[3]',
'$picPaths[4]',
'Stk.',
'{$_POST['Material']}',
'{$_POST['Stil']}',
'{$_POST['Farbe'][0]}',
'{$_POST['Farbe'][1]}',
'{$_POST['Farbe'][2]}'
);"
);
    
$result = $statement->execute();

echo '<script>alert("Alles ok")</script>';

$link = "<script>
window.location = 'formular.php';
</script>";

echo $link;

?>
