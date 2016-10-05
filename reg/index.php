<?php
session_start();
require_once("../inc/config.inc.php");
require_once("../inc/functions.inc.php");

include("../templates/headerexternreg.inc.php")
?>
<div class="container main-container registration-form">
<h1>Registrierung</h1>
<?php
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
	$error = false;
	$vorname = trim($_POST['vorname']);
	$nachname = trim($_POST['nachname']);
	$email = trim($_POST['email']);
    $hersteller = $_POST['hersteller'];
	$passwort = $_POST['passwort'];
	$passwort2 = $_POST['passwort2'];
    $paket = $_POST['paket'];

	if(empty($vorname) || empty($nachname) || empty($email) || empty($hersteller)) {
		echo 'Bitte alle Felder ausfüllen<br>';
		$error = true;
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
		$error = true;
	}
	if(strlen($passwort) == 0) {
		echo 'Bitte ein Passwort angeben<br>';
		$error = true;
	}
	if($passwort != $passwort2) {
		echo 'Die Passwörter müssen übereinstimmen<br>';
		$error = true;
	}

	//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
	if(!$error) {
		$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
		$result = $statement->execute(array('email' => $email));
		$user = $statement->fetch();

		if($user !== false) {
			echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
			$error = true;
		}
	}

	//Keine Fehler, wir können den Nutzer registrieren
	if(!$error) {
		$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

		$statement = $pdo->prepare("INSERT INTO users (email, passwort, vorname, nachname, username, paket) VALUES (:email, :passwort, :vorname, :nachname, :hersteller, :paket)");
		$result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash, 'vorname' => $vorname, 'nachname' => $nachname, 'hersteller' => $hersteller, 'paket' => $paket));

		if($result) {
			echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
			$showFormular = false;
		} else {
			echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
		}
	}
}

if($showFormular) {
?>

<form action="?register=1" method="post">

<div class="form-group">
<label for="inputVorname">Vorname:</label>
<input type="text" id="inputVorname" size="40" maxlength="250" name="vorname" class="form-control" required>
</div>

<div class="form-group">
<label for="inputNachname">Nachname:</label>
<input type="text" id="inputNachname" size="40" maxlength="250" name="nachname" class="form-control" required>
</div>

<div class="form-group">
<label for="inputEmail">E-Mail:</label>
<input type="email" id="inputEmail" size="40" maxlength="250" name="email" class="form-control" required>
</div>
	<div class="form-group">
		<label for="inputHersteller">Hersteller:</label>
		<input type="text" id="inputHersteller" size="40" maxlength="250" name="hersteller" class="form-control" required>
	</div>

	<div class="form-group">
		<label for="inputPasswort">Dein Passwort:</label>
		<input type="password" id="inputPasswort" size="40"  maxlength="250" name="passwort" class="form-control" required>
	</div>


	<div class="form-group">
		<label for="inputPasswort2">Passwort wiederholen:</label>
		<input type="password" id="inputPasswort2" size="40" maxlength="250" name="passwort2" class="form-control" required>
	</div>

	<div class="form-group">
		<select class="selectpicker" name="paket">
			<option value='1'>do-it-yourself</option>
			<option value='2'>be-pushed!</option>
			<option value='3'>rev-up!</option>
		</select>
	</div>

	<button type="submit" class="btn btn-lg btn-primary btn-block">Registrieren</button>
</form>

<?php
} //Ende von if($showFormular)


?>
</div>
<?php
include("templates/footer.inc.php")
?>
