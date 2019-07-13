<?php
include_once('./session.php');
include_once("./dbconfig.php");



try {

    // SQL Query vorbereiten 
    $stmt = $conn->prepare("INSERT INTO themen (kw, jahr, headingMontag, montag1, montag2, headingDienstag, dienstag1, dienstag2, headingMittwoch, mittwoch1, mittwoch2, headingDonnerstag, donnerstag1, donnerstag2,donnerstag3, headingFreitag, freitag1, freitag2, author)
    VALUES (:kw, :jahr, :headingMontag, :montag1, :montag2, :headingDienstag, :dienstag1, :dienstag2, :headingMittwoch, :mittwoch1, :mittwoch2, :headingDonnerstag, :donnerstag1, :donnerstag2,:donnerstag3, :headingFreitag, :freitag1, :freitag2, :author)");
    $stmt->bindParam(':kw', $kw);
    $stmt->bindParam(':jahr', $jahr);

    $stmt->bindParam(':headingMontag', $headingMontag);
    $stmt->bindParam(':montag1', $montag1);
    $stmt->bindParam(':montag2', $montag2);

    $stmt->bindParam(':headingDienstag', $headingDienstag);
    $stmt->bindParam(':dienstag1', $dienstag1);
    $stmt->bindParam(':dienstag2', $dienstag2);

    $stmt->bindParam(':headingMittwoch', $headingMittwoch);
    $stmt->bindParam(':mittwoch1', $mittwoch1);
    $stmt->bindParam(':mittwoch2', $mittwoch2);

    $stmt->bindParam(':headingDonnerstag', $headingDonnerstag);
    $stmt->bindParam(':donnerstag1', $donnerstag1);
    $stmt->bindParam(':donnerstag2', $donnerstag2);
    $stmt->bindParam(':donnerstag3', $donnerstag3);

    $stmt->bindParam(':headingFreitag', $headingFreitag);
    $stmt->bindParam(':freitag1', $freitag1);
    $stmt->bindParam(':freitag2', $freitag2);

    $stmt->bindParam(':author', $author);

    // POST DATEN IN VARIABLEN SPEICHERN
    $kw = $_POST['kw'];
    $jahr = $_POST['jahr'];

    $headingMontag = $_POST["headingMontag"];
    $montag1 = $_POST["montag1"];
    $montag2 = $_POST["montag2"];

    $headingDienstag = $_POST["headingDienstag"];
    $dienstag1 = $_POST["dienstag1"];
    $dienstag2 = $_POST["dienstag2"];

    $headingMittwoch = $_POST["headingMittwoch"];
    $mittwoch1 = $_POST["mittwoch1"];
    $mittwoch2 = $_POST["mittwoch2"];

    $headingDonnerstag = $_POST["headingDonnerstag"];
    $donnerstag1 = $_POST["donnerstag1"];
    $donnerstag2 = $_POST["donnerstag2"];
    $donnerstag3 = $_POST["donnerstag3"];

    $headingFreitag = $_POST["headingFreitag"];
    $freitag1 = $_POST["freitag1"];
    $freitag2 = $_POST["freitag2"];

    $author = "test";

    // DATEN IN DATENBANK SPEICHERN
    $stmt->execute();


    echo "Daten wurden erfolgreich hinzugefügt";
    }
    // Fehler behandlung falls etwas schief läuft
catch(PDOException $e)
    {
    echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
    }
$conn = null;
?>

