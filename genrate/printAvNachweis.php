<?php
function printAvNachweis($pdf,$data, $postData, $sessionData, $datumArr){
    $name = $_SESSION['vorName'] . " " . $_SESSION['nachName']; // Name des Benutzers
    $pdf->AddPage('L'); // Neue Seite hinzufügen
    $pdf->SetFont('Helvetica','B',14);
    $pdf->Cell(200,10,dec("Aktivitätsnachweis"),1); //280 maxwidth

    $pdf->SetFont('Helvetica','B',12);
    $pdf->Cell(80,10,dec("Lehrgangsdauer in Monaten: 21"),1); //280 maxwidth

}
echo 'TEst123';

function dec($string){
   $string = iconv('utf-8', 'cp1252',$string);
   return $string;
}
?>