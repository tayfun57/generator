<?php
function printBerichtsheft($pdf,$data, $postData, $sessionData, $datumArr){
  $name = $_SESSION['vorName'] . " " . $_SESSION['nachName']; // Name des Benutzers
  $pdf->AddPage(); // Neue Seite hinzufügen

  //Ausbildungsnachweis & Klasse/Maßname Zeile
  $pdf->SetFont('Arial','B',14);
  $pdf->Cell(90,10,'AUSBILDUNGSNACHWEIS',1,0,'C',false);
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10, iconv('utf-8', 'cp1252','Klasse/Maßnahme'),1,0,'C',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,'IT44',1,0,'L',false);
  $pdf->Ln();

  //Name & KW Zeile
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10,'Name:',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,$name,1,0,'L',false);
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10,'KW:',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,$postData['kw'],1,0,'L',false);
  $pdf->Ln();

  //Ausbildungsjahr & Nachweis-Nr
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10,'Ausbildungsjahr:',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,1,1,0,'L',false);
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10,'Nachweis-Nr.:',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,1,1,0,'L',false);
  $pdf->Ln();

  //Beruf & Von-Bis
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,10,'Beruf:',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,10,$sessionData['fachrichtung'],1,0,'L',false);
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,5,'Vom',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,5,$datumArr['week_start'],1,0,'L',false);
  $pdf->Ln();
  $pdf->SetLeftMargin(100);
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(40,5,'Bis',1,0,'L',false);
  $pdf->SetFont('Helvetica','',10);
  $pdf->Cell(50,5,$datumArr['week_end'],1,0,'L',false);
  $pdf->SetLeftMargin(10);
  $pdf->Ln();

  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(20.75,5,'Tag',1,0,'L',false);
  $pdf->Cell(69.25,5,iconv('utf-8', 'cp1252','Ausgeführte Arbeiten, Unterricht usw.'),1,0,'L',false);
  $pdf->Cell(30.75,5,'Dozent',1,0,'L',false);
  $pdf->Cell(59.25,5,'Stunden',1,0,'L',false);
  $pdf->Ln();

  //Themen fürr Montag
  $tag = "Montag";
  printThema($pdf,$tag,$data["headingMontag"], $data["montag1"], $data["montag2"], 0);

  //Themen fürr Dienstag
  $tag = "Dienstag";
  printThema($pdf,$tag,$data["headingDienstag"], $data["dienstag1"], $data["dienstag2"], 0);

  //Themen fürr Mittwoch
  $tag = "Mittwoch";
  printThema($pdf,$tag,$data["headingMittwoch"], $data["mittwoch1"], $data["mittwoch2"], 0);

  //Themen fürr Donnerstag
  $tag = "Donnerstag";
  printThema($pdf,$tag,$data["headingDonnerstag"], $data["donnerstag1"], $data["donnerstag2"], $data["donnerstag3"]);

  //Themen fürr Freitag
  $tag = "Freitag";
  printThema($pdf,$tag,$data["headingFreitag"], $data["freitag1"], $data["freitag2"], 0);

  $pdf->Ln();
  $pdf->Ln();
  
  //Datum und Unterschrift
  $pdf->Cell(87.5,15, "Datum",1,0,"L");
  $pdf->Cell(5,15, "", 1, 0, "L");
  $pdf->Cell(87.5,15, "Datum",1,0,"L");
  $pdf->ln();

  //Letzte Zeile 
  $pdf->SetFont('Helvetica','B',10);
  $pdf->Cell(87.5,5, "Datum/ Unterschrift Teilnehmer",1,0,"L");
  $pdf->Cell(5,5, "", 1, 0, "L");
  $pdf->Cell(87.5,5, "Datum/ Unterschrift Ausbilder",1,0,"L");
  ++$GLOBALS['punkte'];
}

//Themenzeile ausgeben
function printThema($pdf,$tag,$heading, $thema1, $thema2, $thema3){
    $pdf->SetFont('Helvetica','B',10);
    $pdf->Cell(20.75,25,$tag,1,0,'C',false);
    $pdf->SetFont('Helvetica','',10);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 69.25;
    if($thema3 === 0){
      
      $pdf->MultiCell($width,5,'Thema: ' . iconv('utf-8', 'cp1252',$heading) .
      "\n\n"   . iconv('utf-8', 'cp1252','•') . " " .
      iconv('utf-8', 'cp1252',$thema1) . "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema2) .
      "\n\n",1); 
      $pdf->SetXY($x + $width, $y);
      $pdf->Cell(30.75,25,iconv('utf-8', 'cp1252','Böhler'),1,0,'C',false);
      $pdf->Cell(59.25,25,'10',1,0,'C',false);
      $pdf->Ln();
    }else{
      $pdf->MultiCell($width,5,'Thema: ' . iconv('utf-8', 'cp1252',$heading) .
      "\n"   . iconv('utf-8', 'cp1252','•') . " " .
      iconv('utf-8', 'cp1252',$thema1) . "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema2) .
      "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema3) . "\n\n",1); 
      $pdf->SetXY($x + $width, $y);

      $y = $pdf->GetY();
      $x = $pdf->GetX();
      $width = 30.75;
      $pdf->MultiCell($width,6.25,"\n" . iconv('utf-8', 'cp1252','Böhler /') . "\n" . "Oehmke" . "\n\n",1,'C');
      $pdf->SetXY($x + $width, $y);
      $pdf->Cell(59.25,25,'10',1,0,'C',false);
      $pdf->Ln();
    }
    
  }
?>