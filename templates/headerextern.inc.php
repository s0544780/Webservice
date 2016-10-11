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

        </div>
        <?php if(!is_checked_in()): ?>
        <div id="navbar" class="navbar-collapse collapse">

        </div><!--/.navbar-collapse -->
        <?php else: ?>
        <div id="navbar" class="navbar-collapse collapse">
         <ul class="nav navbar-nav navbar-right">
            <li><a href="internal.php">Startseite Händlerbereich</a></li>
            <li><a href="settings.php">Einstellungen</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!--/.navbar-collapse -->
        <?php endif; ?>
      </div>
    </nav>
