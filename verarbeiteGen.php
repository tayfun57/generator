<?php
include('./session.php'); // Session 
include('./dbconfig.php'); // Datenbankanbindung
include('./genrate/printBerichtsheft.php'); //import der function printberichtsheft
include('./genrate/printAvNachweis.php');
require_once('./fpdf/fpdf.php'); //importieren der fpdf bibliothek

$sessionData = $_SESSION; // speichern der Session Daten
$postData = [   //sichern der POST Daten in einem Array
 "kw" => $_POST['kw'],
 "jahr" => $_POST['jahr'], 
 "abNachweis" => @$_POST['abNachweis'], 
 "avNachweis" => @$_POST['avNachweis'],
]; 

$data = getDatafromDb($postData['kw'],$postData['jahr'],$conn); //Array für die Daten die aus der Datenbank kommen
$datumArr = getStartAndEndDate($postData['kw'],$postData['jahr']); //Start und Enddatum der Woche 
$pdf = new FPDF('P','mm','A4'); //inizialisierung des FPDF Objektes

printBerichtsheft($pdf,$data, $postData, $sessionData, $datumArr);
printAvNachweis($pdf,$data,$postData,$sessionData,$datumArr);
$pdf->Output();

//Funktion um aus KW und Jahr das Montags und Freitagsdatum zu ermitteln
function getStartAndEndDate($week, $year) {
    $dto = new DateTime();
    $dto->setISODate($year, $week);
    $ret['week_start'] = $dto->format('d.m.Y');
    $dto->modify('+4 days');
    $ret['week_end'] = $dto->format('d.m.Y');
    return $ret;
  }


  //Datensatz aus der Datenbank holen
function getDatafromDb($kw,$jahr,$conn){
  try {
      $stmt = $conn->prepare("SELECT * FROM themen WHERE kw = :kw AND jahr = :jahr");
      $stmt->bindParam('kw', $kw);
      $stmt->bindParam('jahr', $jahr);
      $stmt->execute();
      $data = $stmt->fetch();
  } catch(PDOException $e)
  {
  echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
  }
  $conn = null;
  return $data;
  }
  
  
?>


