<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$error_msg = "";
if(isset($_POST['email']) && isset($_POST['passwort'])) {
	$email = $_POST['email'];
	$passwort = $_POST['passwort'];

	$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
	$result = $statement->execute(array('email' => $email));
	$user = $statement->fetch();

	//Überprüfung des Passworts
	if ($user !== false && password_verify($passwort, $user['passwort'])) {
		$_SESSION['userid'] = $user['id'];

		//Möchte der Nutzer angemeldet beleiben?
		if(isset($_POST['angemeldet_bleiben'])) {
			$identifier = random_string();
			$securitytoken = random_string();

			$insert = $pdo->prepare("INSERT INTO securitytokens (user_id, identifier, securitytoken) VALUES (:user_id, :identifier, :securitytoken)");
			$insert->execute(array('user_id' => $user['id'], 'identifier' => $identifier, 'securitytoken' => sha1($securitytoken)));
			setcookie("identifier",$identifier,time()+(3600*24*365)); //Valid for 1 year
			setcookie("securitytoken",$securitytoken,time()+(3600*24*365)); //Valid for 1 year
		}

		header("location: dashboard.php");
		exit;
	} else {
		$error_msg =  "E-Mail oder Passwort war ungültig<br><br>";
	}

}

$email_value = "";
if(isset($_POST['email'])) {
	$email_value = htmlentities($_POST['email']);
}

include("templates/headerext.inc.php");
?>
 

<?php
if(isset($error_msg) && !empty($error_msg)) {
	echo $error_msg;
}
?>

 <form action="login.php" method="post">
	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			           
			                <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-Mail" value="<?php echo $email_value; ?>" required autofocus>
			               <input type="password" name="passwort" id="inputPassword" class="form-control" placeholder="Passwort" required>
			               <label>
		<input type="checkbox" value="remember-me" name="angemeldet_bleiben" value="1" checked> Angemeldet bleiben
	  </label>
			                <div class="action">
			                    <button class="btn btn-lg btn-primary btn-block" type="submit">Anmelden</button>
			                </div>  
                                       
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			           <a href="passwortvergessen.php">Passwort vergessen</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>
 </form>  



