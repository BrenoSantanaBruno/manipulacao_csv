<?php
function get_html($csv_file) {
    $html = '';
    $file = fopen($csv_file, 'a+');
    $header_arr = fgetcsv($file);
    $html.='<thead>';

    $html.='<thead>';

    $html.='<tbody>';
    while($line = fgetcsv($file)){
        $html.='<tr>';
        foreach ($line as $k=>$v) {
            $html.='<td>'.$v.'</td>';
        }
        $html.='</tr>';
    }
    $html.='</tbody>';

    $html.='</table>';
    return $html;
}

echo get_html('files/1652370140Guias Boletos Cancelados de 01-01-2021 à 31-01-2022.csv');