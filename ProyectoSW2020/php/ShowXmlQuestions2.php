<?php 
    echo '<table border=1> <tr> <th> AUTOR </th> <th> ENUNCIADO </th> <th> RESPUESTA </th> </tr>';
    $xml = simplexml_load_file("../xml/Questions.xml");
    foreach ($xml->children() as $assessmentItem){
        $atributos = $assessmentItem->attributes();
        echo '<tr><td>' .$atributos['author']. '</td> <td>' .$assessmentItem ->itemBody-> p.'</td> <td>'.$assessmentItem ->correctResponse-> value. '</td></tr>';

    }
    echo '</table>';
?>
