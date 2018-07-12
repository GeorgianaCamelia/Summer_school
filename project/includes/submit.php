<?php


if(isset($_POST['submit'])){

    // Stabilim conexiunea cu serverul 
    $conn               = mysqli_connect("localhost","root","","db_summerschool");
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // Preluam datele din form
    $nume               = mysqli_real_escape_string($conn, $_POST['nume']);
    $prenume            = mysqli_real_escape_string($conn, $_POST['prenume']);
    $email              = mysqli_real_escape_string($conn, $_POST['email']);
    $ocupatie           = mysqli_real_escape_string($conn, $_POST['ocupatie']);
    $telefon            = mysqli_real_escape_string($conn, $_POST['telefon']);
    $cursuri            = $_POST['cursuri']; // de ce ? :'()
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~TESTE~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
     $sql = "INSERT INTO persoana(nume, prenume, email) VALUES ('$nume' , '$prenume', '$email')";

     echo $nume;
     echo $prenume;
     echo $email;
     echo $ocupatie;
     echo $telefon;
     print_r($cursuri);

     mysqli_query($conn, $sql);
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
}
?>