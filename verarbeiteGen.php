<?php
include_once('./session.php'); // Session 
include_once('./dbconfig.php'); // Datenbankanbindung
include_once('./genrate/printBerichtsheft.php'); //import der function printberichtsheft
include_once('./genrate/printAvNachweis.php'); // import der function printAvNachweis
include_once('./inc/punkte.php'); // Biliothek um die Punkte zu setzen
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
  'sMontag' => $data['sMontag'],

  'hDienstag' => $data['hDienstag'],
  'tDienstag' => explodeR($data['tDienstag']),
  'dDienstag' => explodeR($data['dDienstag']),
  'sDienstag' => $data['sDienstag'],

  'hMittwoch' => $data['hMittwoch'],
  'tMittwoch' => explodeR($data['tMittwoch']),
  'dMittwoch' => explodeR($data['dMittwoch']),
  'sMittwoch' => $data['sMittwoch'],

  'hDonnerstag' => $data['hDonnerstag'],
  'tDonnerstag' => explodeR($data['tDonnerstag']),
  'dDonnerstag' => explodeR($data['dDonnerstag']),
  'sDonnerstag' => $data['sDonnerstag'],


  'hFreitag' => $data['hFreitag'],
  'tFreitag' => explodeR($data['tFreitag']),
  'dFreitag' => explodeR($data['dFreitag']),
  'sFreitag' => $data['sFreitag'],


  'author' => $data['author'],
  ];

  #Überprüfung ob man einen Tag krank war, wenn ja werden die Entsprechenden Werte überschrieben für jeden Tag
  if(isset($postData['krankMo'])){
    $data2['hMontag'] = 'Krankheit';
    $elementeT = count($data2['tMontag']);
    $elementeD = count($data2['dMontag']);
    for ($i= $elementeT; $i  >= 0 ; $i--) { 
      array_pop($data2['tMontag']);
    }
    for ($i= $elementeD; $i  >= 0 ; $i--) { 
      array_pop($data2['dMontag']);
    }
   $data2['sMontag'] = 0;
  }  
  if(isset($postData['krankDi'])){
    $data2['hDienstag'] = 'Krankheit';
    $elementeT = count($data2['tDienstag']);
    $elementeD = count($data2['dDienstag']);
    for ($i= $elementeT; $i  >= 0 ; $i--) { 
      array_pop($data2['tDienstag']);
    }
    for ($i= $elementeD; $i  >= 0 ; $i--) { 
      array_pop($data2['dDienstag']);
    }
   $data2['sDienstag'] = 0;
  }  
  if(isset($postData['krankMi'])){
    $data2['hMittwoch'] = 'Krankheit';
    $elementeT = count($data2['tMittwoch']);
    $elementeD = count($data2['dMittwoch']);
    for ($i= $elementeT; $i  >= 0 ; $i--) { 
      array_pop($data2['tMittwoch']);
    }
    for ($i= $elementeD; $i  >= 0 ; $i--) { 
      array_pop($data2['dMittwoch']);
    }
   $data2['sMittwoch'] = 0;
  }  
  if(isset($postData['krankDo'])){
    $data2['hDonnerstag'] = 'Krankheit';
    $elementeT = count($data2['tDonnerstag']);
    $elementeD = count($data2['dDonnerstag']);
    for ($i= $elementeT; $i  >= 0 ; $i--) { 
      array_pop($data2['tDonnerstag']);
    }
    for ($i= $elementeD; $i  >= 0 ; $i--) { 
      array_pop($data2['dDonnerstag']);
    }
   $data2['sDonnerstag'] = 0;
  }  
  if(isset($postData['krankFr'])){
    $data2['hFreitag'] = 'Krankheit';
    $elementeT = count($data2['tFreitag']);
    $elementeD = count($data2['dFreitag']);
    for ($i= $elementeT; $i  >= 0 ; $i--) { 
      array_pop($data2['tFreitag']);
    }
    for ($i= $elementeD; $i  >= 0 ; $i--) { 
      array_pop($data2['dFreitag']);
    }
   $data2['sFreitag'] = 0;
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