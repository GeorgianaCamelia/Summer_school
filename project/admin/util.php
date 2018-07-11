<?php
function doLogout(){
	unset($_SESSION['user']);
	unset($_SESSION['logat']);
} 

function doLogin($user, $password){
	global $conn;
    $logat = FALSE; 
	if (isLogged()) 
		doLogout();   
  	
	//$sql = "SELECT * FROM admin WHERE nume='$user' AND parola= md5('$password')";
	$sql = sprintf("SELECT nume, parola FROM admin WHERE nume='%s' AND parola= md5('%s')",  mysqli_real_escape_string($conn, $user),  mysqli_real_escape_string($conn, $password));
	//echo "Query: $sql <br>";
	if (!($result = mysqli_query($conn, $sql))){
		echo('Error: ' . mysqli_error($conn));
	}
	if ($row=mysqli_fetch_array($result)){
		$logat = TRUE;
		$_SESSION['user'] = $user;
		$_SESSION['logat'] = TRUE;				   
	}
	return $logat;
}


function isLogged(){
	return isset($_SESSION['logat']) and  $_SESSION['logat'] = TRUE;
}

function getLoggedUser(){
	return $_SESSION['user'];
}

function deletePersoana($id){
    global $conn;
    
    $query = sprintf("DELETE FROM persoana_curs WHERE id_p='%s'", mysqli_real_escape_string($conn, $id));
    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }else{
        $sql = sprintf("DELETE FROM persoana WHERE id_p='%s'", mysqli_real_escape_string($conn, $id));
        if (!mysqli_query($conn, $sql)) {
            die('Error: ' . mysqli_error($conn));
        }
        echo "<font color='red'>Intrarea cu id-ul ".$id." a fost stearsa cu succes</font><br/>";	
    }
}

function sendMail(){

}

function listPersoane(){
 global $conn;
 $query = "SELECT * FROM  persoana";
 $result = mysqli_query($conn, $query);
 
 if(mysqli_num_rows($result)) {
      print("<table border='1' cellspacing='0' align='center'>\n");
      print("<tr><th>#</th><th width='100'>Nume</th><th width='400'>Prenume</th><th width='400'>Email</th><th width='400'>Telefon</th><th width='100'>Ocupatie</th><th width='600'>Cursuri</th><th>Delete</th></tr>\n");
     
      while($row = mysqli_fetch_array($result)){
        print("<tr>\n");
        print("<td>" . htmlspecialchars($row['id_p']). "</td>\n");
        print("<td align='center' >" . htmlspecialchars($row['nume']). "</td>\n");
        print("<td align='center' >" . htmlspecialchars($row['prenume']). "</td>\n");
        print("<td><a href='mailto:".$row['email']."'>".$row['email']."</a></td>\n");
        print("<td align='center' >" . htmlspecialchars($row['telefon']). "</td>\n");
        print("<td align='center' >" . htmlspecialchars($row['ocupatie']). "</td>\n");
        print("<td align='center' >" );
        $query2 = "SELECT nume_curs, id_p FROM curs, persoana_curs WHERE curs.id_c = persoana_curs.id_c";
        $result2 = mysqli_query($conn, $query2);
        if(mysqli_num_rows($result2)){
            while($row2 = mysqli_fetch_array($result2)){
                if($row['id_p'] == $row2 ['id_p'])
                    print(htmlspecialchars($row2['nume_curs'])."<br>"); 
            }
        }
        print( "</td>\n");
        print("<td><form action='admin.php?comanda=delete&id=" . $row['id_p']. "'method='POST'>
            <button type='submit'>Delete</button>
            </form></td>\n");

        // print("<td align='center' >" . htmlspecialchars($row['email']). "</td>\n");
        // print("<td align='center' >" . htmlspecialchars($row['nume_curs']). "</td>\n");
        // print("<td><a href='admin.php?comanda=delete&id=" . $row['id_p']. "'>Delete</a></td>\n");

        print("</tr>\n");
      }
      print("</table>");
  } else {
        echo "<b align='center'>Nu exista mesaje!</b>";
  }
}


?>