<?php

//~~~~~~~~~~~~~~~~Includem conexiunea catre baza de date~~~~~~~~~~~~~~~~~~~~//
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
$conn               = mysqli_connect("localhost","root","","db_summerschool");

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~Functie pentru de e-mail'uri~~~~~~~~~~~~~~~~~~~~~~~~~~//
//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~//
function sendMail($to, $pers, $cursuri){  

    $subject        =  "Scoala de vara";
    $message        =  "Salut, $pers\nTe-ai inscris cu succes la scoala de vara! Bafta pe mai departe!\n
                        Tinem sa-ti amintim ca te-ai inscris la urmatoarele cursuri:\n$cursuri\n\n\n\n
                        Numai bine!";

    return mail($to,$subject,$message);
}  
