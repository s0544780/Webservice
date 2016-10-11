<!DOCTYPE html>
<html lang="de">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>MALENDO Webservice</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/navbar.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <!--  <a class="navbar-brand" href="index.php"><img src="gfx/shoplogo.jpg" alt="shoplogo"></a> -->
        </div>
        <?php if(!is_checked_in()): ?>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" action="login.php" method="post">
			<table class="login" role="presentation">
				<tbody>
					<tr>
						<td>
							<div class="input-group">
								<div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></div>
								<input class="form-control" placeholder="E-Mail" name="email" type="email" required>
							</div>
						</td>
						<td><input class="form-control" placeholder="Passwort" name="passwort" type="password" value="" required></td>
						<td><button type="submit" class="btn btn-success">Login</button></td>
					</tr>
					<tr>
						<td><label style="margin-bottom: 0; font-weight: normal;"><input type="checkbox" name="angemeldet_bleiben" value="remember-me" title="Angemeldet bleiben"  checked="checked" style="margin: 0; vertical-align: middle;" /> <small>Angemeldet bleiben</small></label></td>
						<td><small><a href="passwortvergessen.php">Passwort vergessen</a></small></td>
						<td></td>
					</tr>
				</tbody>
			</table>


          </form>
        </div><!--/.navbar-collapse -->
        <?php else: ?>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="settings.php">Einstellungen</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
        <?php endif; ?>
      </div>
    </nav>

    <div class="container main-container">

    <h1>Herzlich Willkommen!</h1>

    Hallo <?php echo htmlentities($user['username']); ?>,<br>
    Herzlich Willkommen im internen Bereich!<br><br>

    <h2 class="offscreen">W3C Web Resources</h2>
    <div id="hmenu">
    <ul>
      <li><a href="lagerbestand.php">Lagerbestand</a></li>
      <li><a href="verkaeufe.php">Verkäufe</a></li>
      <li><a href="offeneverkaeufe.php">unbezahlte Verkäufe</a></li>
      <li><a href="auszahlungen.php">Auszahlungen</a></li>
        <?php
        if($user['paket'] !== '1') {
            echo '<li><a href="uploader.php">Produkt hinzufügen</a></li>';
        } ?>
      <li><a href="faq.php">FAQs</a></li>
    </ul>
    </div>

    </div>
