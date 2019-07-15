<?php
$Themen = [];
$data = [
        'heading' => 'Programmierung mit Java',
        'themen' => array
        (
            'Thema1', 'Thema2', 'Thema3',
        ),
        'dozent' => 'Böhler',
        ];

    $termin[] = array('Datum' => 20121208, 
    'Ort'   => "Wangen", 
    'Band'  => "cOoL RoCk oPaS");

$termin[] = array('Datum' => 20120311, 
    'Ort'   => "Stuttgart", 
    'Band'  => "Die Hosenbodenband");

$termin[] = array('Datum' => 20120628, 
    'Ort'   => "Tübingen", 
    'Band'  => "flying socks");

$termin[] = array('Datum' => 20120628, 
    'Ort'   => "Stuttgart", 
    'Band'  => "flying socks");

echo "<pre>";
print_r ( $termin );


array_push($Themen,$data);
array_push($Themen,$data);

echo 'Anzahl der Themen: ' . count($Themen[0]['themen']);

echo '<br>';

for ($i=0; $i < count($Themen) ; $i++) { 
    echo $i;
    echo '<br>';
    echo $Themen[$i]['heading'];
    echo '<br>';
    echo $Themen[$i]['dozent'];

}
?>