<?php
session_start();

if (!isset($_SESSION['u_id'])) {
    header("Location:index.php");
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pevas</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main-wrapper">
                    <div class="nav-login">
                        <form action="logout.php" method="POST">
                            <button type="submit" name="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <div class="unos">
            <form action="unos-db.php" method="post">
                <fieldset>
                    Ime: <select name="Ime">
                        <option value="Petar">Petar</option>
                        <option value="Vasilije">Vasilije</option>
                    </select><br/>
                    Dorucak: <input type="text" id="izmeni" name="Dorucak"/><br/>
                    Rucak: <input type="text" id="izmeni" name="Rucak"/><br/>
                    Vecera: <input type="text" id="izmeni" name="Vecera"/><br/>
                    Voce: <input type="text" id="izmeni" name="Voce"/><br/>
                    Ostali troskovi: <input type="text" id="izmeni" name="Ostali_troskovi"/><br/>
                    Preskok: <input type="text" id="izmeni" name="Preskok"/><br/>

                </fieldset>
                <hr/>
                <button type="submit" id="tisitupav">Posalji</button>
            </form>
        </div>       
    </body>
</html>