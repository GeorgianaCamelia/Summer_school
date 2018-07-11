<?php
include 'includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Summer School</title>     
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="text/javascript" src="js/script.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/valid-form.js"></script>
        
        <style>
            #randomfield { 
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none; 
                width: 200px;
                height: 50px;
                color: black;
                border-color: black;
                text-align: center;
                font-size: 40px;
                background-image: url('img/captcha.png');
                }  
            #CaptchaEnter{
                width: 200px;
                height: 30px;
                text-align: center;
                font-size: 18px;
            }   
            #btnrefresh{
                background-color: #f0f0f0;
                color: #494949;
               
                border-radius: 12px;

            } 
        </style>
        
        
    
    </head>

    <body onLoad="ChangeCaptcha()">

        <!-- HEADER -->

        <header>
            <div id="logo">
                <a href="#">
                    <img src="img/SummerSchool.png" alt="logo">
                </a>
            </div>

            <nav id="main-nav">
                <ul>
                    <li><a href="#home">Home</a></li> 
                    <li><a href="#inscrieri">Inscrieri</a></li> 
                    <li><a href="#cursuri">Cursuri</a></li>
                    <li><a href="#traineri">Traineri</a></li>
                    <li><a href="#calendar">Calendar</a></li>
                    <li><a href="#organizatori">Organizatori</a></li>
                    <li><a href="#editii">Editii</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </header>

        <!-- HOME -->

        <section id="home">
           <h1>~ Knowledge is power ~</h1> 
           <p>Daca esti pasionat de informatica aplica acum</p>
           <a href="#inscrieri">
               <img src="img/pfeil.png" alt="pfeil">
           </a>
        </section>

        <!-- INSCRIERI -->

        <section id="inscrieri">
            <div id="border_radius">
            <form action="#" method= "post" id-"form-reg" onsubmit="return checkform(this);">
                <p>Completeaza campurile pentru a te inscrie.</p>
                <span id= "form-message"></span>
                <hr>

                    <label for="nume">Nume:</label> 
                    <input type="text" name="nume" id="nume"> 
                                
                    <label for="prenume">Prenume:</label> 
                    <input type="text" name="prenume" id="prenume"> 
                            
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email"> 
                                
                    <label for="telefon">Telefon:</label>
                    <input type="text" name="telefon" id="telefon"> 
                            
                    Ocupatie:
                    <select id= "ocupatie">
                        <option value="altceva" disabled selected>Altceva</option>
                        <option value="elev">Elev</option>
                        <option value="student">Student</option>
                    </select> <br>

                    Alegeti cursurile la care doriti sa participati: <br>

                    <?php
                        $query = "SELECT nume_curs FROM curs";
                        $result = mysqli_query($conn, $query);
                                        
                        if(mysqli_num_rows($result)) {
                            while($row = mysqli_fetch_array($result)){
                                    echo "<br><input type='checkbox' name='cursuri[]' value='".$row['nume_curs']."'>".$row['nume_curs']."<br/>";
                                        }
                                        }
                    ?>
                    
                   <!-- START CAPTCHA -->
                   <h4> Introduceti codul: </h4>
                   <input type="text" id="randomfield" disabled /> 
                   <input type="button" id="btnrefresh" value="Refresh" onclick="ChangeCaptcha();" /> <br>
                   <input id="CaptchaEnter"  maxlength="6" /> <br>
                  

                    <!-- END CAPTCHA -->
                   
                    <input  id= "form-submit" type="submit" value="Trimite" onclick="check()">
                    <input type="reset" value="Reseteaza">
                </form>
            </div>
        </section>

        <!-- CURSURI -->

        <section id="cursuri">
            <div id="border_radius">
                <h3>Modern C++ Programming</h3>    
                <p>Cursul va prezenta evolutia din ultimul deceniu a limbajului/standardului C++. Folosind concepte ce vor fi introduse, veti scrie cod C++ modern - mai sigur - mai rapid - mai usor.<br>
                Cursul va consta in patru intalniri de aproximativ 120 minute fiecare:</p>
                    <ol>
                        <li>Revolution to C++ 11</li>
                        <li>Revolution to C++ 11: Advanced</li>
                        <li>Evolution to C++ 14/17</li>
                        <li>Hands-on, interactive, live code session</li>
                    </ol>
                <hr>

                <h3>Building => 'A Modern Web Application'</h3>
                <p>In cadrul cursului se va prezenta arhitectura unei aplicatii web moderne, in stilul abordat de in implementarea Installer Analytics. Limbajul predominant in tehnologiile ce vor fi prezentate este JavaScript.<br>
                Cursul va consta in cinci intalniri de aproximativ 90 minute fiecare:</p>
                    <ol>
                        <li>Web Applications intro. Servers and Browsers</li>
                        <li>A Modern Aproach. Single Page Application concept</li>
                        <li>NodeJS intro</li>
                        <li>AngularJS intro</li>
                        <li>Putting it all together</li>
                    </ol>
                <hr>

                <h3>Modern Windows Deployment Technologies: MSI->AppX</h3>
                <p>In cadrul acestui curs se vor prezenta principalele aspecte ale distributiei unei aplicatii si se vor analiza metodele traditionale si moderne de instalare ale unei aplicatii. Participantii vor deprinde cunostinte de impachetare ale unei aplicatii si ce aspecte trebuie luate in considerare. Se vor analiza avantajele si dezavantajele mediului de distributie, website and Windows Store.<br>
                Cursul va consta in cinci intalniri de aproximativ 60-90 minute fiecare:</p>
                    <ol>
                        <li>Introducere in impachetarea si distributia aplicatiilor</li>
                        <li>Metode traditionale de impachetare (.msi, .exe)</li>
                        <li>Metode moderne de impachetare (.appv, .appx)</li>
                        <li>Convertirea unei aplicatii de la format traditional la unul modern</li>
                        <li>Sumar: care sunt notiunile si aspectele pe care le-am insusit?</li>
                    </ol>
                <hr>

                <h3>Face Recognition In .NET/C# Application</h3>
                <p>Cursul introduce notiunea de "smart" web API si are ca scop implementarea unei aplicatii .NET care integreaza un astfel de API. Gradual vor fi introduse informatii despre suita Microsoft Cognitive Services, punand accentul pe Face API. La final se va implementa pas cu pas o aplicatie in .NET si limbajul C# care integreaza Face API <br>
                Cursul va consta in trei intalniri de aproximativ 120 minute fiecare.</p>
            </div>
        </section>

        <!-- TRAINERI -->

        <section id="traineri"> 
            <div id="info">
                <ul>
                    <li><a href="#"><img src="img/georgi.jpg"></a><h3>Gitan Georgiana Camelia </h3></li>
                    <li><a href="#"><img src="img/geani.jpg"></a><h3>Gherghe Geani Robert</h3></li>
                    <li><a href="#"><img src="img/andra.jpg"></a><h3>Voican Andra</h3></li>
                </ul>
            </div>
        </section>

        <!-- CALENDAR -->

        <section id="calendar">
            <div id="border_radius">
                <h4>Cursurile scolii de vara se vor desfasura in perioada 26 iunie - 14 iulie conform urmatorului program:</h4>
                    <ol>
                        <li>Modern C++ programming</li>
                            <ul>
                                <li>Luni, 10 iulie - ora 17</li>
                                <li>Miercuri, 12 iulie - ora 17</li>
                                <li>Joi, 13 iulie - ora 17</li>
                                <li>Vineri, 14 iulie - ora 17</li>
                            </ul> <br>
    
                        <li>Building => 'A modern web application'</li>
                            <ul>
                                <li>Luni, 26 iunie - ora 18</li>
                                <li>Miercuri, 28 iunie - ora 18</li>
                                <li>Vineri, 30 iunie - ora 18</li>
                                <li>Luni, 3 iulie - ora 18</li>
                                <li>Miercuri, 5 iulie - ora 17</li>
                            </ul> <br>

                        <li>Modern Windows Deployment Technologies</li>
                            <ul>
                                <li>Marti, 27 iunie - ora 18</li>
                                <li>Joi, 29 iunie - ora 18</li>
                                <li>Marti, 04 iulie - ora 18</li>
                                <li>Joi, 06 iulie - ora 18</li>
                                <li>Vineri, 07 iulie - ora 18</li>
                            </ul> <br>

                        <li>Face recognition in .NET/C# application</li>
                            <ul>
                                <li>Joi, 29 iunie - ora 15</li>
                                <li>Joi, 06 iulie - ora 15</li>
                                <li>Joi, 13 iulie - ora 15</li>
                            </ul>
                    </ol>
            </div>
        </section>

        <!-- ORGANIZATORI -->

        <section id="organizatori">
            <div id="info_org">
                <ul>
                    <li><a href="http://inf.ucv.ro"><img src="img/informatica-logo.jpg"></a><a href="http://inf.ucv.ro">Departamentul de Informatica al Facultatii de Stiinte</a></li>
                    <li><a href="http://sct.ucv.ro"><img src="img/sct-logo.png"></a><a href="http://sct.ucv.ro">Societatea pentru Tehnologii Computationale "Society for Computer Technologies"</a></li>
                    <li><a href="http://www.caphyon.ro/"><img src="img/caphyon-logo.png"></a><a href="http://www.caphyon.ro/">Compania Caphyon</a></li>
                    <li><a href="http://www.netromsoftware.ro/"><img src="img/netrom-logo.png"></a><a href="http://www.netromsoftware.ro/">Compania NetRom Software</a></li>          
                </ul>
            </div>    
        </section>

        <!-- EDITII -->

        <section id="editii">
            <h3>Nu exista editii anterioare</h3>
        </section>

        <!-- CONTACT -->

        <section id="contact">
            <div id="border_radius_contact">

                <div id="left_col">
                    <a href="http://inf.ucv.ro">Departamentul de Informatica</a> <br> <br>
                    <a href="http://stiinte.ucv.ro">Facultatea de Stiinte</a> <br> <br>
                    <a href="http://www.ucv.ro">Universitatea din Craiova</a> <br> <br>
                    A.I. Cuza, 13 <br>
                    Sala: 333 <br> <br>
                    Tel: 0251413728 <br>
                    E-mail: summerschool@inf.ucv.ro
                </div>

                <div id="right_col">
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1427.289399430298!2d23.80058152260664!3d44.31860884145697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4752d7a006e30d1b%3A0x84a5887ac48a77c7!2sUniversitatea+din+Craiova!5e0!3m2!1sro!2sro!4v1530563657144" width="300" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></p>
                </div>

            </div>
        </section>

        <footer>
            <p>
                &copy; 2018 Summer School 
            </p>
        </footer>

    </body>
    
</html>