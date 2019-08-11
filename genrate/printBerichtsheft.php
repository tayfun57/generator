<?php
function printBerichtsheft($pdf,$data, $postData, $sessionData, $datumArr){
  $tage = ['Montag', 'Dienstag', 'Mittwoch', 'Donnerstag','Freitag']; //Wochentage
  $font = 'Helvetica'; //Schriftart
  $name = iconv('utf-8', 'cp1252',$_SESSION['vorName'] . " " . $_SESSION['nachName']); // Name des Benutzers
  $pdf->AddPage(); // Neue Seite hinzufügen

  //Ausbildungsnachweis & Klasse/Maßname Zeile
  $pdf->SetFont($font,'B',14);
  $pdf->Cell(90,10,'AUSBILDUNGSNACHWEIS',1,0,'C',false);
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10, iconv('utf-8', 'cp1252','Klasse/Maßnahme'),1,0,'C',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,'IT44',1,0,'L',false);
  $pdf->Ln();

  //Name & KW Zeile
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10,'Name:',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,$name,1,0,'L',false);
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10,'KW:',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,$postData['kw'],1,0,'L',false);
  $pdf->Ln();

  //Ausbildungsjahr & Nachweis-Nr
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10,'Ausbildungsjahr:',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,1,1,0,'L',false);
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10,'Nachweis-Nr.:',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,1,1,0,'L',false);
  $pdf->Ln();

  //Beruf & Von-Bis
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,10,'Beruf:',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,10,$sessionData['fachrichtung'],1,0,'L',false);
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,5,'Vom',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,5,$datumArr['week_start'],1,0,'L',false);
  $pdf->Ln();
  $pdf->SetLeftMargin(100);
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(40,5,'Bis',1,0,'L',false);
  $pdf->SetFont($font,'',10);
  $pdf->Cell(50,5,$datumArr['week_end'],1,0,'L',false);
  $pdf->SetLeftMargin(10);
  $pdf->Ln();

  //Überschriften für die einzelnen Spalten
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(20.75,5,'Tag',1,0,'L',false);
  $pdf->Cell(69.25,5,iconv('utf-8', 'cp1252','Ausgeführte Arbeiten, Unterricht usw.'),1,0,'L',false);
  $pdf->Cell(30.75,5,'Dozent',1,0,'L',false);
  $pdf->Cell(59.25,5,'Stunden',1,0,'L',false);
  $pdf->Ln();
  
  //Aufruf der Funktion printThema in einer Forschleife
  for ($i=0; $i < 5; $i++) { 
    $tag = $tage[$i];
    $heading = $data['h' . $tag];
    $thema = $data['t' . $tag];
    $dozent = $data['d' . $tag];
    printThema($pdf,$tag,$heading,$thema,$dozent);
  }
  $pdf->Ln();
  $pdf->Ln();
  
  //Datum und Unterschrift
  $pdf->Cell(87.5,15, "Datum",1,0,"L");
  $pdf->Cell(5,15, "", 1, 0, "L");
  $pdf->Cell(87.5,15, "Datum",1,0,"L");
  $pdf->ln();

  //Letzte Zeile 
  $pdf->SetFont($font,'B',10);
  $pdf->Cell(87.5,5, "Datum/ Unterschrift Teilnehmer",1,0,"L");
  $pdf->Cell(5,5, "", 1, 0, "L");
  $pdf->Cell(87.5,5, "Datum/ Unterschrift Ausbilder",1,0,"L");
  $GLOBALS['punkte']--;
}

//Themenzeile ausgeben
function printThema($pdf,$tag,$heading,$themen,$dozent){
    $font = 'Helvetica';
    $pdf->SetFont($font,'B',10);
    $pdf->Cell(20.75,25,$tag,1,0,'C',false);
    $pdf->SetFont($font,'',10);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 69.25;

    $pdf->MultiCell($width,5,'Thema: ' . iconv('utf-8', 'cp1252',$heading) . "\n"  . buildtThema($themen),1); 
    $pdf->SetXY($x + $width, $y);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 30.75;
    $pdf->MultiCell($width,6.25,buildtTDozent($dozent),1,'C');
    $pdf->SetXY($x + $width, $y);
    $pdf->Cell(59.25,25,'10',1,0,'C',false);
    $pdf->Ln();
  }

  /*
    Funktion um den String zu erzeugen für die Themen. Die zählt die Array Elemente also die einzelnen Themen.
    Daraufhin wird jedes Thema in das passende Format gebracht in einer Schleife. Danach wird geschaut wie viele
    Zeilenumbrüche wir brauchen damit die spalte ausgefüllt ist und es zur keiner fehldarstellung kommt. Diese Funktion
    ist notwendig, aufgrund der Eigenarten der FPDF Libary
  */
  function buildtThema($array){
    $elemente = count($array);
    $ergebnis = '';
    $differenz = 4 - $elemente;

    for ($i=0; $i < $elemente; $i++) { 
      $ergebnis .= iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$array[$i]) . "\n";
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
  function buildtTDozent($array){
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