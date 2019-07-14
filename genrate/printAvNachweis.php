<?php

//Funktion um das PDF Dokument zu generieren
function printAvNachweis($pdf,$data, $postData, $sessionData, $datumArr){
    $name = $_SESSION['vorName'] . " " . $_SESSION['nachName']; // Name des Benutzers
    $pdf->AddPage('L'); // Neue Seite hinzufügen
    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(190,15,dec("Aktivitätsnachweis"),1); //280 maxwidth

    //Lehrgansdauer in Monaten
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(90,15,dec("Lehrgangsdauer in Monaten: 21"),1); //280 maxwidth
    $pdf->Ln();

    //Woche von - bis / Vorname und Nachname
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(95,7.5,'Woche vom/bis:', 1);
    $pdf->Cell(95,7.5,dec('Vorname:'), 1);
    $pdf->Cell(90,7.5,dec('Name:'), 1);
    $pdf->Ln();

    $pdf->SetFont('Helvetica','',11);
    $pdf->Cell(95,15,$datumArr['week_start'] . ' - ' . $datumArr['week_end'], 1);
    $pdf->Cell(95,15,$sessionData['vorName'], 1);
    $pdf->Cell(90,15,$sessionData['nachName'], 1);
    $pdf->Ln();

    $pdf->SetFont('Helvetica','B',11);
    $pdf->Cell(95,10,'KW: ' . $data['kw'], 1);
    $pdf->Cell(95,10,'', 1);
    $pdf->Cell(90,10,'', 1);
    $pdf->Ln();
    $pdf->Ln();

    
    $pdf->SetFont('Helvetica','B',11);
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

    //Themen für Montag
    $tag = "Montag";
    printThemenAv($pdf,$tag,$data["headingMontag"], $data["montag1"], $data["montag2"], 0);
    //Themen fürr Dienstag
    $tag = "Dienstag";
    printThemenAv($pdf,$tag,$data["headingDienstag"], $data["dienstag1"], $data["dienstag2"], 0);

    //Themen fürr Mittwoch
    $tag = "Mittwoch";
    printThemenAv($pdf,$tag,$data["headingMittwoch"], $data["mittwoch1"], $data["mittwoch2"], 0);

    //Themen fürr Donnerstag
    $tag = "Donnerstag";
    printThemenAv($pdf,$tag,$data["headingDonnerstag"], $data["donnerstag1"], $data["donnerstag2"], $data["donnerstag3"]);

    //Themen fürr Freitag
    $tag = "Freitag";
    printThemenAv($pdf,$tag,$data["headingFreitag"], $data["freitag1"], $data["freitag2"], 0);

    $GLOBALS['punkte']--;

}

//Funktion um den Zeichensatz zu konvertieren, weil es Probleme mit der UTF-8 Darstellung gibt seitens der FPDF Bibliothek
function dec($string){
   $string = iconv('utf-8', 'cp1252',$string);
   return $string;
}

/**
 * Funktion um die Themenspalten der jeweiligen Tage auszugeben
 */
function printThemenAv($pdf,$tag,$heading, $thema1, $thema2, $thema3){
    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(50,20,$tag,1,0,'C',false);
    $pdf->SetFont('Helvetica','',10);
    $y = $pdf->GetY();
    $x = $pdf->GetX();
    $width = 100;
    if($thema3 === 0){
      
        $pdf->MultiCell($width,5,'Thema: ' . iconv('utf-8', 'cp1252',$heading) .
        "\n"   . iconv('utf-8', 'cp1252','•') . " " .
        iconv('utf-8', 'cp1252',$thema1) . "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema2) .
        "\n\n",1); 
        $pdf->SetXY($x + $width, $y);
        $pdf->Cell(50,20,iconv('utf-8', 'cp1252','Böhler'),1,0,'C',false);
        $pdf->Cell(40,20,'',1,0,'C',false);
        $pdf->Cell(40,20,'',1,0,'C',false);
        $pdf->Ln();
      }else{
        $pdf->MultiCell($width,5,'Thema: ' . iconv('utf-8', 'cp1252',$heading) .
        "\n"   . iconv('utf-8', 'cp1252','•') . " " .
        iconv('utf-8', 'cp1252',$thema1) . "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema2) .
        "\n" . iconv('utf-8', 'cp1252','•') . " " . iconv('utf-8', 'cp1252',$thema3) . "\n",1); 
        $pdf->SetXY($x + $width, $y);
        $pdf->Cell(50,20,iconv('utf-8', 'cp1252','Böhler'),1,0,'C',false);
        $pdf->Cell(40,20,'',1,0,'C',false);
        $pdf->Cell(40,20,'',1,0,'C',false);
        $pdf->Ln();
  
        
      }
}
?>