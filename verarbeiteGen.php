<?php
include_once('./session.php'); // Session 
include_once('./dbconfig.php'); // Datenbankanbindung
include_once('./genrate/printBerichtsheft.php'); //import der function printberichtsheft
include_once('./genrate/printAvNachweis.php'); // import der function printAvNachweis
include_once('./punkte.php'); // Biliothek um die Punkte zu setzen
require_once('./FPDF/fpdf.php'); //importieren der fpdf bibliothek


$sessionData = $_SESSION; // speichern der Session Daten
$postData = [   //sichern der POST Daten in einem Array
 "kw" => $_POST['kw'],
 "jahr" => $_POST['jahr'], 
 "abNachweis" => @$_POST['abNachweis'], 
 "avNachweis" => @$_POST['avNachweis'],
  'krankMo' =>  @$_POST['krankMo'],
  'krankDi' =>  @$_POST['krankDi'],
  'krankMi' =>  @$_POST['krankMi'],
  'krankDo' =>  @$_POST['krankDo'],
  'krankFr' =>  @$_POST['krankFr']
]; 

$data = getDatafromDb($postData['kw'],$postData['jahr'],$conn); //Array für die Daten die aus der Datenbank kommen

// Hier werden die Daten in das benötigte Format gebracht.
$data2 = [
  'id' => $data['id'],
  'kw' => $data['kw'],

  'hMontag' => $data['hMontag'],
  'tMontag' => explodeR($data['tMontag']),
  'dMontag' => explodeR($data['dMontag']),

  'hDienstag' => $data['hDienstag'],
  'tDienstag' => explodeR($data['tDienstag']),
  'dDienstag' => explodeR($data['dDienstag']),

  'hMittwoch' => $data['hMittwoch'],
  'tMittwoch' => explodeR($data['tMittwoch']),
  'dMittwoch' => explodeR($data['dMittwoch']),

  'hDonnerstag' => $data['hDonnerstag'],
  'tDonnerstag' => explodeR($data['tDonnerstag']),
  'dDonnerstag' => explodeR($data['dDonnerstag']),

  'hFreitag' => $data['hFreitag'],
  'tFreitag' => explodeR($data['tFreitag']),
  'dFreitag' => explodeR($data['dFreitag']),

  'author' => $data['author'],
  ];

  if(isset($postData['krankMo'])){
    $data2['hMontag'] = 'Krankheit';

  }


$datumArr = getStartAndEndDate($postData['kw'],$postData['jahr']); //Start und Enddatum der Woche 

$pdf = new FPDF('P','mm','A4'); //inizialisierung des FPDF Objektes
$punkte = 0;

//Selektion welche Nachweise ausgegeben werden
if(isset($postData['abNachweis']) && isset($postData['avNachweis'])){
  printBerichtsheft($pdf,$data2, $postData, $sessionData, $datumArr);
  printAvNachweis($pdf,$data2,$postData,$sessionData,$datumArr);
}elseif(isset($postData['avNachweis'])){ 
  printAvNachweis($pdf,$data2,$postData,$sessionData,$datumArr);
}elseif(isset($postData['abNachweis'])){
  printBerichtsheft($pdf,$data2, $postData, $sessionData, $datumArr);
}else{
  printBerichtsheft($pdf,$data2, $postData, $sessionData, $datumArr);
  printAvNachweis($pdf,$data2,$postData,$sessionData,$datumArr);
}

setPunkte($conn,$sessionData,$punkte);
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
        $stmt = $conn->prepare("SELECT * FROM themen2 WHERE kw = :kw AND jahr = :jahr");
        $stmt->bindParam('kw', $kw);
        $stmt->bindParam('jahr', $jahr);
        $stmt->execute();
        $data = $stmt->fetch();
    }catch(PDOException $e)
    {
      echo "Fehler, bitte an Admin mit der genauen Fehlerbeschreibung wenden: " . $e->getMessage();
    }
    $conn = null;
    return $data;
}

function explodeR($themen){
    $array = explode(",", $themen);
    return $array;
}

 



?>