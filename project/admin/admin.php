<?php
	session_start();
	include "../includes/connect.inc.php";
	include  "util.php";
?>

<html>
    <head>
        <title>Administrare</title>
    </head>
    <body>
    
<center><h1>Administrare</h1></center>

<?php

 $comanda = isset($_REQUEST["comanda"]) ? $_REQUEST["comanda"] : NULL;
 if (isset($comanda)) {
    switch ($comanda){
        case 'login':
            $nume = $_REQUEST["nume"];
            $parola =  $_REQUEST["parola"];
			if (!doLogin($nume, $parola)){
				echo "<font color='red'>Autentificare esuata!</font><br/>";
			}			 
			break;
		case 'logout':	
			doLogout();
			break;	
    }
 }  

 if (!isLogged()){
	include "login-form.php";
} else {
	// printf ('<a href="admin.php?comanda=logout">Logout</a>');
	echo '<form action="admin.php?comanda=logout" method="POST">
		<button type="submit">Logout</button>
		</form>';
	/* Userul e autentificat */
	$comanda = $_REQUEST["comanda"];
    switch ($comanda){
        
		case 'delete':
            $id = $_REQUEST["id"];
			deletePersoana($id);  
			break; 
		default:
	}
  	
	listPersoane();     
	
	//include "send-form.php";
  
}  
?>

    </body>
</html>
