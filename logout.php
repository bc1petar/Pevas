<?php
if (!isset($_SESSION['u_id'])) {    
    session_start();
    session_unset();                       // PROVJERA DA LI JE USER ULOGOVAN PALJENJE SESIJE, I UNISTAVANJE ISTE;
    session_destroy();
}

header("Location: index.php");           // VRACA SE NA POCETNU
exit();
?>