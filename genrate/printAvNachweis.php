<?php
//Funktion um das PDF Dokument zu generieren

function printAvNachweis($pdf,$data, $postData, $sessionData, $datumArr){
    $tage = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag','Freitag']; //Wochentage
    $font = 'Helvetica';
    $name = dec($_SESSION['vorName'] . " " . $_SESSION['nachName']); // Name des Benutzers
    $pdf->AddPage('L'); // Neue Seite hinzufügen
    $pdf->SetFont($font,'B',14);
    $pdf->Cell(190,15,dec("Aktivitätsnachweis"),1); //280 maxwidth

    //Lehrgansdauer in Monaten
    $pdf->SetFont($font,'B',12);
    $pdf->Cell(90,15,dec("Lehrgangsdauer in Monaten: 21"),1); //280 maxwidth
    $pdf->Ln();

    //Woche von - bis / Vorname und Nachname
    $pdf->SetFont($font,'B',12);
    $pdf->Cell(95,7.5,'Woche vom/bis:', 1);
    $pdf->Cell(95,7.5,dec('Vorname:'), 1);
    $pdf->Cell(90,7.5,dec('Name:'), 1);
    $pdf->Ln();

    //Datum von - bis & Name
    $pdf->SetFont($font,'',11);
    $pdf->Cell(95,15,$datumArr['week_start'] . ' - ' . $datumArr['week_end'], 1);
    $pdf->Cell(95,15,dec($sessionData['vorName']), 1);
    $pdf->Cell(90,15,dec($sessionData['nachName']), 1);
    $pdf->Ln();

    //Kalendarwoche
    $pdf->SetFont($font,'B',11);
    $pdf->Cell(95,10,'KW: ' . $data['kw'], 1);
    $pdf->Cell(95,10,'', 1);
    $pdf->Cell(90,10,'', 1);
    $pdf->Ln();
    $pdf->Ln();

    //Überschriften für die einzelnen Spalten
    $pdf->SetFont($font,'B',11);
    $pdf->Cell(50,15,'Tag', 1,0,'C');
    $pdf->Cell(100,15,dec('Thema/Prüfungsnummer'),1,0,'C');
    $pdf->Cell(50,15,'Dozent', 1,0,'C');
    $pdf->Cell(80,7.5,'Unterschrift',1,0,'C');
    $pdf->Ln();
    $pdf->SetLeftMargin(210);
    $pdf->Cell(40,7.5,'Kunde',1,0,'C');
    $pdf->Cell(40,7.5,'Dozent',1,0,'C');
    $pdf->SetLeftMargin(10);
    $pdf->Ln();

    for ($i=0; $i < 5; $i++) { 
      $tag = $tage[$i];
      $heading = $data['h' . $tag];
      $thema = $data['t' . $tag];
      $dozent = $data['d' . $tag];
      printThemenAv($pdf,$tag,$heading,$thema,$dozent);
    }

    $GLOBALS['punkte']--;

}

/**
 * Funktion um die Themenspalten der jeweiligen Tage auszugeben
 */
function printThemenAv($pdf,$tag,$heading,$themen,$dozent){
    $font = 'Helvetica';
    $pdf->SetFont($font,'B',12);
    $pdf->Cell(50,20,$tag,1,0,'C',false);
    $pdf->SetFont($font,'',10);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 100;
    $pdf->MultiCell($width,5,"Thema: " . iconv('utf-8', 'cp1252',$heading) .  buildtThemaAv($themen),1); 
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 50;
    $pdf->MultiCell($width,5,buildtTDozentAv($dozent),1,'C');
    $pdf->SetXY($x + $width, $y);

    $pdf->Cell(40,20,'',1,0,'C',false);
    $pdf->Cell(40,20,'',1,0,'C',false);
    $pdf->Ln();
  
        
     
     
}

//Funktion um den Zeichensatz zu konvertieren, weil es Probleme mit der UTF-8 Darstellung gibt seitens der FPDF Bibliothek
function dec($string){
  $string = iconv('utf-8', 'cp1252',$string);
  return $string;
}

function buildtThemaAv($array){
  $elemente = count($array);
  $ergebnis = "\n";
  $differenz = 3 - $elemente;

  for ($i=0; $i < $elemente; $i++) { 
    $ergebnis .= "\t" .iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$array[$i]) . "\n";
  }

  for ($i=0; $i < $differenz; $i++) { 
    $ergebnis .= "\n";
  }
  return $ergebnis;
}

 /*
  Funktion um den String zu erzeugen für die Dozent/en. Die zählt die Array Elemente also die einzelnen Dozenten.
  Daraufhin wird jedes Theme in das passende Format gebracht in einer Schleife. Danach wird geschaut wie viele
  Zeilenumbrüche wir brauchen damit die spalte ausgefüllt ist und es zur keiner fehldarstellung kommt. Diese Funktion
  ist notwendig, aufgrund der Eigenarten der FPDF Libary
*/
function buildtTDozentAv($array){
  $elemente = count($array);
  $ergebnis = "\n";
  $differenz = 3 - $elemente;

  for ($i=0; $i < $elemente; $i++) {#
    if($i == $elemente-1){
      $ergebnis .=  iconv('utf-8', 'cp1252',$array[$i]) . "\n";
    }else{
      $ergebnis .=  iconv('utf-8', 'cp1252',$array[$i] . ' /') . "\n";
    }
  }

  for ($i=0; $i < $differenz; $i++) { 
    $ergebnis .= "\n";
  }
  return $ergebnis;
}
?>