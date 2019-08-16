<?php
include_once('./session.php');
include_once("./dbconfig.php");
include_once('./inc/punkte.php');

$punkte = 18;

try {

    // SQL Query vorbereiten 
    $stmt = $conn->prepare("INSERT INTO themen2 (kw, jahr, hMontag, tMontag, dMontag,sMontag, hDienstag, tDienstag, dDienstag,sDienstag, hMittwoch, tMittwoch, dMittwoch,sMittwoch, hDonnerstag, tDonnerstag, dDonnerstag,sDonnerstag, hFreitag, tFreitag, dFreitag,sFreitag, author)
    VALUES                                      (:kw, :jahr, :hMontag, :tMontag, :dMontag,:sMontag, :hDienstag, :tDienstag, :dDienstag,:sDienstag, :hMittwoch, :tMittwoch, :dMittwoch,:sMittwoch, :hDonnerstag, :tDonnerstag, :dDonnerstag,:sDonnerstag, :hFreitag, :tFreitag, :dFreitag,:sFreitag, :author)");
    $stmt->bindParam(':kw', $kw);
    $stmt->bindParam(':jahr', $jahr);

    $stmt->bindParam(':hMontag', $hMontag);
    $stmt->bindParam(':tMontag', $tMontag);
    $stmt->bindParam(':dMontag', $dMontag);
    $stmt->bindParam(':sMontag', $sMontag);
  

    $stmt->bindParam(':hDienstag', $hDienstag);
    $stmt->bindParam(':tDienstag', $tDienstag);
    $stmt->bindParam(':dDienstag', $dDienstag);
    $stmt->bindParam(':sDienstag', $sDienstag);

    $stmt->bindParam(':hMittwoch', $hMittwoch);
    $stmt->bindParam(':tMittwoch', $tMittwoch);
    $stmt->bindParam(':dMittwoch', $dMittwoch);
    $stmt->bindParam(':sMittwoch', $sMittwoch);

    $stmt->bindParam(':hDonnerstag', $hDonnerstag);
    $stmt->bindParam(':tDonnerstag', $tDonnerstag);
    $stmt->bindParam(':dDonnerstag', $dDonnerstag);
    $stmt->bindParam(':sDonnerstag', $sDonnerstag);

    $stmt->bindParam(':hFreitag', $hFreitag);
    $stmt->bindParam(':tFreitag', $tFreitag);
    $stmt->bindParam(':dFreitag', $dFreitag);
    $stmt->bindParam(':sFreitag', $sFreitag);

    $stmt->bindParam(':author', $author);

    // POST DATEN IN VARIABLEN SPEICHERN
    $kw = $_POST['kw'];
    $jahr = $_POST['jahr'];

    $hMontag = $_POST["hMontag"];
    $tMontag = $_POST["tMontag"];
    $dMontag = $_POST["dMontag"];
    $sMontag = $_POST["sMontag"];

    $hDienstag = $_POST["hDienstag"];
    $tDienstag = $_POST["tDienstag"];
    $dDienstag = $_POST["dDienstag"];
    $sDienstag = $_POST["sDienstag"];

    $hMittwoch = $_POST["hMittwoch"];
    $tMittwoch = $_POST["tMittwoch"];
    $dMittwoch = $_POST["dMittwoch"];
    $sMittwoch = $_POST["sMittwoch"];

    $hDonnerstag = $_POST["hDonnerstag"];
    $tDonnerstag = $_POST["tDonnerstag"];
    $dDonnerstag = $_POST["dDonnerstag"];
    $sDonnerstag = $_POST["sDonnerstag"];

    $hFreitag = $_POST["hFreitag"];
    $tFreitag = $_POST["tFreitag"];
    $dFreitag = $_POST["dFreitag"];
    $sFreitag = $_POST["sFreitag"];

    $author = $_SESSION['vorName'] . ' ' . $_SESSION['nachName'];

    // DATEN IN DATENBANK SPEICHERN
    $stmt->execute();


    echo "Daten wurden erfolgreich hinzugefügt";
    }
    // Fehler behandlung falls etwas schief läuft
catch(PDOException $e)
    {
    echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
    }
    //Punkte setzen nach erfolgreichen hinzufügen des Datensatzes;
    setPunkte($conn,$_SESSION,$punkte);
    $conn = null; 

?>

