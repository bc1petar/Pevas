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
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <div class="main-wrapper">
                    <div class="nav-login">
                        <form action="sqlToXML.php" method="post">                            
                            <button type="submit" name="submit">XMLog</button>
                        </form>
                        <form action="logout.php" method="POST">
                            <button type="submit" name="submit">Logout</button>
                        </form>

                    </div>
                </div>
            </nav>
        </header>

        <div class="dugmeUnos">
            <section class="main-container">
                <div class="main-">



                    <table id = "sto1">
                        <tr>
                            <th>Datum</th>
                            <th>Dorucak</th>
                            <th>Rucak</th>
                            <th>Vecera</th>
                            <th>Voce</th>
                            <th>Ostali troskovi</th>
                            <th>Vaso preskok</th>
                            <th>Petar preskok</th>
                            <th>Kasa</th>
                        </tr>





                        <?php
                        //Povezivanje sa serverom baze podataka
                        $bp = mysqli_connect("localhost", "root", "", "pev");
                        if (!$bp) {
                            die(mysqli_error($bp));
                        }
                        //Učitavanje podataka iz baze
                        $upit = "select * from pregled";
                        $rezultat = mysqli_query($bp, $upit);
                        if (!$rezultat) {
                            die(mysqli_error($bp));
                        }
                        //Prikaz podataka
                        while ($red = mysqli_fetch_object($rezultat)) {
                            echo "<tr>\n";
                            echo "<td>{$red->Datum}</td>\n";
                            echo "<td>{$red->Dorucak}</td>\n";
                            echo "<td>{$red->Rucak}</td>\n";
                            echo "<td>{$red->Vecera}</td>\n";
                            echo "<td>{$red->Voce}</td>\n";
                            echo "<td>{$red->Ostali_troskovi}</td>\n";
                            echo "<td>{$red->Vaso_preskok}</td>\n";
                            echo "<td>{$red->Petar_preskok}</td>\n";
                            echo "<td>{$red->Kasa}</td>\n";
                        }
                        ?>
                    </table>

                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <div id="unos">
                    <table id = "sto2">
                        <tr>
                            <th>Ime</th>
                            <th>Datum</th>
                            <th>Dorucak</th>
                            <th>Rucak</th>
                            <th>Vecera</th>
                            <th>Voce</th>
                            <th>Ostali troskovi</th>
                            <th>Preskok</th>
                        </tr>





                        <?php
                        //Povezivanje sa serverom baze podataka

                        $bp = mysqli_connect("localhost", "root", "", "pev");
                        if (!$bp) {
                            die(mysqli_error($bp));
                        }

                        //   $date = date(Y-m-d);
                        //Učitavanje podataka iz baze
                        $upit = "select * from unos";
                        $rezultat = mysqli_query($bp, $upit);
                        if (!$rezultat) {
                            die(mysqli_error($bp));
                        }
                        //Prikaz podataka
                        while ($red = mysqli_fetch_object($rezultat)) {
                            echo "<tr>\n";
                            echo "<td>{$red->Ime}</td>\n";
                            echo "<td>{$red->Datum}</td>\n";
                            echo "<td>{$red->Dorucak}</td>\n";
                            echo "<td>{$red->Rucak}</td>\n";
                            echo "<td>{$red->Vecera}</td>\n";
                            echo "<td>{$red->Voce}</td>\n";
                            echo "<td>{$red->Ostali_troskovi}</td>\n";
                            echo "<td>{$red->Preskok}</td>\n";
                            echo "<td><a href='#' onclick='if(confirm(\"Jeste li sigurni da želite izbrisati ovo?\")) "
                            . "location.href=\"delete-unos-db.php?ID={$red->ID}\";'> Uklanjanje </a></td> \n";
                        }
                        ?>
                    </table>          
                    <form action="unos.php" method="post">
                        <button type="submit" class="b1" href="unos.php">UNOS</button>
                    </form>
                    </body>
                    </html>

