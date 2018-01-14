<?php

$bp = mysqli_connect("localhost", "root", "", "pev");
if (!$bp) {
    die("Problem sa povezivanjem sa bazom podataka");
}

$Datum = date("Y-m-d");
//Upis u bazu
$selekt = "SELECT Datum, sum(Dorucak), sum(Rucak), sum(Vecera), sum(Voce), sum(Ostali_troskovi),(sum(Dorucak)+sum(Rucak)+sum(Vecera)+sum(Voce)+sum(Ostali_troskovi)+sum(Preskok)) as total from unos where Datum='$Datum'";
$selektp1 = "SELECT Preskok AS Petar_preskok from unos where Ime='Petar' AND Datum='$Datum'";
$selektp2 = "SELECT Preskok AS Vaso_preskok from unos where Ime='Vasilije' AND Datum='$Datum'";
$daj = mysqli_query($bp, $selektp1);
$daj2 = mysqli_query($bp, $selektp2);
if (!$daj) {
    die(mysqli_error($bp));
}
while ($red = mysqli_fetch_object($daj)) {
    $petar = "$red->Petar_preskok";
}

if (!$daj2) {
    die(mysqli_error($bp));
}
while ($red = mysqli_fetch_object($daj2)) {
    $vaso = "$red->Vaso_preskok";
}

$rezultat = mysqli_query($bp, $selekt);

if(!$rezultat){
    die("Greška pri izvršavanjue delete upita");
}


while ($row = mysqli_fetch_assoc($rezultat)) {
    
    mysqli_query($bp, "Insert into pregled (Datum,Dorucak,Rucak,Vecera,Voce,Ostali_troskovi,Vaso_preskok,Petar_preskok,Kasa) values "
            . "('$Datum','" . $row['sum(Dorucak)'] . "','" . $row['sum(Rucak)'] . "','" . $row['sum(Vecera)'] . "','" . $row['sum(Voce)'] . "','" . $row['sum(Ostali_troskovi)'] . "','$vaso','$petar','".$row['total']."') ON DUPLICATE KEY UPDATE Datum ='$Datum', Dorucak ='" . $row['sum(Dorucak)'] . "', Rucak= '" . $row['sum(Rucak)'] . "', Vecera ='" . $row['sum(Vecera)'] . "', Voce ='" . $row['sum(Voce)'] . "', Ostali_troskovi ='" . $row['sum(Ostali_troskovi)'] . "', Vaso_preskok ='$vaso', Petar_preskok ='$petar',Kasa = '".$row['total']."';");
}
header("Location: loggedin.php");