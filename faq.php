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



<style type="text/css">



* {
  margin:0;
  padding:0;
}

#seite {
  width:100%;
  margin: 0 auto;
}

#kopfbereich {
  background-color:lightblue;
}

#inhalt {
  background-color: lightgreen;
  margin-left: 250px;
}

#steuerung {
  float: left;
  width:250px;
  //background-color: yellow;
}

#fussbereich {
  clear: both;
  background-color:lightblue;
}

#ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    border: 1px solid #555;
    border-radius: 5px;
}

li a#listentry {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
    border-bottom: 1px solid #555;
}

/* Change the link color on hover */
li a:hover#listentry  {
    background-color: #555;
    color: white;
    border-bottom: 1px solid #555;
}

li:last-child#listentry {
border-bottom: none;
}
</style>

<div class="container main-container">



  <div id="steuerung">
  <ul id="ul">
  <li id="listentry"><a id="listentry" href="#data" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Los geht's</a></li>
  <li id="listentry"><a id="listentry" href="#email" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Versand</a></li>
  <li id="listentry"><a id="listentry" href="#payout" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">Auszahlungen</a></li>
  <li id="listentry"><a id="listentry" href="#" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false">FOOBAR</a></li>
  </ul>
  </div>

  <div class="tab-content" id="inhalt">
    <div role="tabpanel" class="tab-pane active" id="data">
      Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
    </div>

    <div role="tabpanel" class="tab-pane" id="email">
      Salaaaaattttttt
    </div>
</div>
  </div>






<?php
include("templates/footer.inc.php")
?>
