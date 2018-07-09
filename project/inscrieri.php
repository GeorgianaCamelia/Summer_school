<?php
    include 'includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Summer School</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>
    <body>
        
        <div id="container">
            <div id="header">

                <div id="nav"><br/> 
                    <ul>
                        <li><a href="home.html">Home</a></li> 
                        <li><a href="inscrieri.html">Inscrieri</a></li> 
                        <li><a href="cursuri.html">Cursuri</a></li>
                        <li><a href="traineri.html">Traineri</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <li><a href="organizatori.html">Organizatori</a></li>
                        <li><a href="editii.html">Editii</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>                   
                </div>

            </div>

        <div id="content">
				<div id="inscrieri">
		
						<form method="post" action="#">
								<label for="nume">Nume:</label>
                                <input type="text" name="nume" id="nume" />
                                            
                                <label for="prenume">Prenume:</label>
								<input type="text" name="prenume" id="prenume" />
										
								<label for="email">Email:</label>
                                <input type="text" name="email" id="email" />
                                            
                                <label for="telefon">Telefon:</label>
                                <input type="text" name="telefon" id="telefon" />
										
								Ocupatie:
								<select>
                                    <option value="elev">Elev</option>
                                    <option value="student">Student</option>
                                    <option value="altceva">Altceva</option>
                                </select>

                                Alegeti cursurile la care doriti sa participati:
                    
                               <!-- <label class = "check">[ Modern ] ( C++ ) { Programming }
                                <input type="checkbox" checked="checked"> 
                                <span class="checkmark"></span>
                                </label>

                                <label class = "check">(Building) => 'A Modern Web Application'
                                <input type="checkbox"> 
                                <span class="checkmark"></span>
                                </label>

                                <label class = "check">Modern Windows Deployment Technologies: MSI->AppX
                                <input type="checkbox"> 
                                <span class="checkmark"></span>
                                </label>

                                <label class = "check">Face Recognition In .NET/C# Application
                                <input type="checkbox"> 
                                <span class="checkmark"></span>
                                </label> -->
                                

                                <?php

                                $query = "SELECT nume_curs FROM curs";
                                $result = mysqli_query($conn, $query);
                                
                                if(mysqli_num_rows($result)) {
                                     while($row = mysqli_fetch_array($result)){
                                         echo "<input type='checkbox' name='cursuri[]' value='".$row['nume_curs']."'>".$row['nume_curs']."<br/>";

                                 }
                                }
                                 ?>
                                
								<input type="submit" value="Trimite">
                                <input type="reset" value="Reseteaza">
                               
						
						</form>
                </div>
            
        </div>

        <div id="footer">
            Copyright &copy; 2018 Summer School 
        </div> 
       
        </div>
        
    </body>
</html>