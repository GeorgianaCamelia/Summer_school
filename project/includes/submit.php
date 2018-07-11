<?php

if(isset($_POST['submit'])){

    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $email = $_POST['email'];
    $ocupatie = $_POST['ocupatie'];
    $telefon = $_POST['telefon'];
    $cursuri = json_decode($_POST['cursuri']);

    $conn = mysqli_connect("localhost","root","","db_summerschool");
    
}else {
    echo 'eroare la submit';
}

?>