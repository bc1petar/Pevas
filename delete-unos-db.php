<?php

$bp = mysqli_connect("localhost", "root", "","pev");
if(!$bp){
    die("Problem sa povezivanjem sa bazom podataka");
}

$ID = filter_input(INPUT_GET, "ID");

$upit = "delete from unos where ID='$ID'";
$rezultat = mysqli_query($bp, $upit);
if(!$rezultat){
    die("Greška pri izvršavanjue delete upita");
}

die(header("Location: loggedin.php"));