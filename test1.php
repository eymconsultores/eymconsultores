<?php
$url = 'http://www.emol.com/economia/';
$html = file_get_contents($url);
                         
                           
preg_match_all('/<div class=\"cont_378_e_2015\">(.*)<\/div>/s', $html, $matches);



//preg_match_all('/<div class=\"lot\-price\-block\">(.*?)<\/div>/s',$html,$matches);
//preg_match_all('~<div class=\"col\-md\-8\">\s*(<div class=\"quote\".*?</div>\s*)?(.*)</div>~is', $html, $matches );
                            
//$contenido = print_r($matches);


if (count($matches) > 0) {
    unset($matches[0]);

    $sets = array();
    $contenido = "";
    foreach ($matches as $key => $value) {
        foreach ($value as $key2 => $value2) {
            $sets[$key2][] = $value2;
        }
    }



    foreach ($sets as $key => $values) {
        echo '<div style="background-color: white;">';
            foreach ($values as $ind => $value) {
                echo '<p>'.$value.'</p>';
                $contenido .= $value."\n";
            }

        	# definimos la carpeta destino
    	    $carpetaDestino="archivos_".date("d_m_Y")."/";
         
            # si existe la carpeta o se ha creado
            if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
            {
                $destino=file_put_contents($carpetaDestino."nombres_".date('d_m_Y__H_i_s').".csv", $contenido);
            }else{
                echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
            }
        echo '</div>';


    }
/*
    // Direct output (without an internal loop)
    foreach ($sets as $key => $values) {
        echo '<div style="background-color: orange;">';
        echo '<p>'.$values[0].'</p>';
        //echo '<p>'.$values[1].'</p>';
        //echo '<p>'.$values[2].'</p>';
        echo '</div>';
    }
*/
}



