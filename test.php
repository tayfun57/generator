<?php

//Enter your code here, enjoy!

$string = '<a href=“http://www.share-online.biz/dl/TZXW7MOPNY3”>Blonder.Wahnsinn.2017.German.720p.WEB.x264-WvF.Part1</a>';
$start =  stripos($string, '>') + 1;
$end = strrpos($string, 'WEB');
echo $start . ' ' . $end;
echo '<br>';
$word = substr($string, $start, $end);

echo $word;





/*$Themen = [];
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

}*/
?>