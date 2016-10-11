<?php
//header('Location: http://haendler.malendo.de/index.php', true, 301);
session_start();
session_destroy();
unset($_SESSION['userid']);

//Remove Cookies
setcookie("identifier","",time()-(3600*24*365));
setcookie("securitytoken","",time()-(3600*24*365));

require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

include("templates/headerextern.inc.php");

?>

<div class="container main-container">
Der Logout war erfolgreich. <a href="login.php">Zurück zum Login</a>.
<script>alert('alert text')</script> 
</div>
<?php
include("templates/footer.inc.php")
?>