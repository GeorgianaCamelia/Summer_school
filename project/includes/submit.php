<?php
if(isset($_POST['submit'])){
    // Stabilim conexiunea cu serverul 
    $conn               = mysqli_connect("localhost","root","","db_summerschool");
    include_once 'connect.inc.php';
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // Preluam datele din form
    $nume               = mysqli_real_escape_string($conn, $_POST['nume']);
    $prenume            = mysqli_real_escape_string($conn, $_POST['prenume']);
    $email              = mysqli_real_escape_string($conn, $_POST['email']);
    $ocupatie           = mysqli_real_escape_string($conn, $_POST['ocupatie']);
    $telefon            = mysqli_real_escape_string($conn, $_POST['telefon']);
    $cursuri            = $_POST['cursuri']; // de ce ? :'()
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~UPDATE/INSERT~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    // Vector cu persoanele din BD
    $query = "SELECT * FROM persoana";
    $result = mysqli_query($conn, $query);
    $datas = array();
    if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $datas[] = $row;
        }
    }
    // Cauta dupa nume si prenume o pers in BD
    $find = false;
    foreach($datas as $data){
        if ($data['nume'] == $nume && $data['prenume'] == $prenume){
            // Face update daca a gasit persoana
            $sql = "UPDATE persoana SET email='$email', telefon='$telefon', ocupatie='$ocupatie' WHERE nume = '".$nume."' AND prenume = '".$prenume."'";
            
            // Vectorul ce contine legaturile (id_p,id_c)
            $pers_curs = "SELECT * FROM persoana_curs";
            $rez = mysqli_query($conn, $pers_curs);
            $pers_curs_array = array();
            if(mysqli_num_rows($rez) > 0){
                while ($row = mysqli_fetch_assoc($rez)){
                 $pers_curs_array[] = $row;
                }
            } 
            // Vector ce va retine cursurile noi ce se vor concatena la cele existente 
            $curs_de_introdus = array();
            foreach ($pers_curs_array as $pers_curs_arr) {
                // Daca se gaseste id-ul persoanei in tabelul persoana_curs
                if($data['id_p'] == $pers_curs_arr['id_p']){
                    // Se creaza un sir ce retine cursul asociat persoanei
                    $pers_curs_id_c[] = $pers_curs_arr['id_c'];
                    // Daca se gaseste in BD cursul ales se sterge din cursurile ce urmeaza sa fie concatenate
                    $curs_de_introdus = array_diff($cursuri, $pers_curs_id_c);
                    $cursuri = $curs_de_introdus;
                }
            }
            // print_r(array_values($cursuri));

            foreach($cursuri as $curs){
                $sql2 = "INSERT INTO persoana_curs (id_p, id_c) VALUES ('".$data['id_p']."', '$curs') ";
                mysqli_query($conn, $sql2);
            }

            $find = true;
            mysqli_query($conn, $sql);  
        }
    }
    // Daca nu a gasit persoana in BD
    if($find == false){
        // Insereaza in tabelul persoana
        $sql = "INSERT INTO persoana(nume, prenume, email, telefon, ocupatie) VALUES ('$nume' , '$prenume', '$email', '$telefon', '$ocupatie')";
        // Cauta ultimul id
        if ($conn->query($sql) === TRUE) {
                $last_id = $conn->insert_id;
                echo "New record created successfully. Last inserted ID is: " . $last_id;
                
                // Introduce id-ul ultimei persoane inserate si id-urile cursurilor alese
                foreach($cursuri as $curs){
                    $sql2 = "INSERT INTO persoana_curs (id_p, id_c) VALUES ('$last_id', '$curs') ";
                    mysqli_query($conn, $sql2);
                }
        
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    
    
    echo $nume." ";
    echo $prenume." ";
    echo $email." ";
    echo $ocupatie." "; 
    echo $telefon." ";
    print_r($cursuri);
    
  
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
}
?>