<?php
header('Content-type: text/xml');

$xmlout = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n";
$xmlout .= "<persons>";

$db = new PDO('mysql:host=localhost;dbname=pev','root','');
$stmt = $db->prepare("SELECT * FROM pregled");
$stmt->execute();
while($row = $stmt->fetch()){
    $xmlout .= "\t<person>\n";
    $xmlout .= "\t\t<Datum>" . $row['Datum'] . "</Datum>\n";
    $xmlout .= "\t\t<Dorucak>" . $row['Dorucak'] . "</Dorucak>\n";
    $xmlout .= "\t\t<Rucak>" . $row['Rucak'] . "</Rucak>\n";
    $xmlout .= "\t\t<Vecera>" . $row['Vecera'] . "</Vecera>\n";
    $xmlout .= "\t\t<Voce>" . $row['Voce'] . "</Voce>\n";
    $xmlout .= "\t\t<Ostali_troskovi>" . $row['Ostali_troskovi'] . "</Ostali_troskovi>\n";
    $xmlout .= "\t\t<Vaso_preskok>" . $row['Vaso_preskok'] . "</Vaso_preskok>\n";
    $xmlout .= "\t\t<Petar_preskok>" . $row['Petar_preskok'] . "</Petar_preskok>\n";
    $xmlout .= "\t\t<Kasa>" . $row['Kasa'] . "</Kasa>\n";
    $xmlout .= "\t</person>\n";
}

$xmlout .= "</persons>";
echo $xmlout;