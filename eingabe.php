<?php

   $dz=fopen("upload/daten.csv","a");
        if(!$dz)
          {
            echo "Datei konnte nicht zum Schreiben geöffnet werden.";
            exit;
          }

    fputs($dz,$_POST["vorname"].";".$_POST["nachname"].";"
        .$_POST["strasse"].";".$_POST["hausnr"].";"
        .$_POST["plz"].";".$_POST["ort"].";\n");

        echo "Ihre Eingaben wurden gespeichert.";

    fclose($dz);

?>
