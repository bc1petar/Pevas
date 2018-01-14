<?php

//Povezivanje sa serverom
$bp = mysqli_connect("localhost", "root", "", "pev");
if (!$bp) {
    die("Problem sa povezivanjem sa bazom podataka");
}

$Ime = filter_input(INPUT_POST, "Ime");
$Datum = date("Y-m-d");
$Dorucak = filter_input(INPUT_POST, "Dorucak");
$Rucak = filter_input(INPUT_POST, "Rucak");
$Vecera = filter_input(INPUT_POST, "Vecera");
$Voce = filter_input(INPUT_POST, "Voce");
$Ostali_troskovi = filter_input(INPUT_POST, "Ostali_troskovi");
$Preskok = filter_input(INPUT_POST, "Preskok");

$sql = "SELECT Ime FROM unos WHERE Datum ='$Datum'";
$result = mysqli_query($bp, $sql);

while($red = mysqli_fetch_object($result)){
    if($Ime == $red->Ime){
        
        echo '<script type="text/javascript">'; 
echo 'alert("Ime je vec uneseno za danasnji datum");'; 
echo 'window.location.href = "unos.php";';
echo '</script>';
        exit();
        
    }
}

$upit = "Insert into unos (Ime,Datum,Dorucak,Rucak,Vecera,Voce,Ostali_troskovi,Preskok) "
        . "values ('$Ime','$Datum','$Dorucak','$Rucak','$Vecera','$Voce','$Ostali_troskovi','$Preskok')";
$rezultat = mysqli_query($bp, $upit);
if (!$rezultat) {
    die("Greška pri upisivanju u tabelu");
}

$sql = "SELECT * FROM unos WHERE Datum ='$Datum'";
$result = mysqli_query($bp, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck == 2) {
    header("Location: pregled-db.php");
    exit();
}

header("Location: loggedin.php");