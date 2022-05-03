<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <meta name="keywords" content="IFCD0210, web development, Cet, php" />
        <meta name="author" content="Ignasi Ortiz" />
        <meta name="description" content="test sessions php" />
        <title>Exercici PhP Sessions</title>
    </head>
    <body>
        <header>
            <H1> Exercici en PHP - practicar sessions </H1>              
        </header>
        <main>
            <section>
                <label id="mostrar">Escull un cotxe (depen del cotxe requereix validació):</label>
            </section>
            <hr>

            <?php                            
                session_start();
                echo $_POST["cars"];
                echo $_POST["inpUsuari"];
                echo $_POST["inpPwd"];
                $userName = "Admin";
                $userPwd = "1234";
                $userCod = 0;

                if (isset($_POST["inpUsuari"]) && ($_POST["inpPwd"])){

                    if (($_POST["inpUsuari"] == $userName) && ($_POST["inpPwd"] == $userPwd)) {
                        $_SESSION["idUsuari"] = $userCod;
                    }else{
                        echo "Usuari o password invalids.";
                    }
                }

                if(isset($_POST['cars']))
                {                        
                    switch ($_POST["pag"]) {
                        case '1': "<img src='./assets/seat.jpg>"; break;  
                        case '2': "<img src='./assets/fiat.jpg>"; break;
                        case '3':   
                                    if (isset($_SESSION['idUsuari'])) {
                                        "<img src='./assets/ferrari.jpg>"; 
                                    }else{
                                        "<p>usuari no identificat</p>";
                                    }
                                    break;
                        case '4':   if (isset($_SESSION['idUsuari'])) {
                                        "<img src='./assets/lamborghini.jpg>"; 
                                    }else{
                                        "<p>usuari no identificat</p>";
                                    }
                                    break;
                    }
                
                }else{
                    echo("</BR><p>Sisplau, seleccioni un coche de la llista desplegable.</p>");
                }
            ?>
                        
            <form action="/index.php" id="carform" method="post">       
                <label for="inpUsuari">Entra el teu nom:</label>
                <input type="text" id="inpUsuari" name="inpUsuari">
                </br>
                <label for="inpPwd">Entra la password:</label>
                <input type="password" id="inpPwd" name="inpPwd">
                </br>
                </br>
                <label for="cars">Selecciona el teu cotxe:</label>
                <select name="cars" id="cars" form="carform">
                    <option value="seat" selected>seat</option>
                    <option value="fiat">fiat</option>
                    <option value="ferrari">ferrari</option>
                    <option value="lamborghini">lamborghini</option>
                </select>
                </br>
                <input type="submit" value="ENTREGAR">        
            </form>

        </main>
    </body>
</html>
