<?php

$info = array(
    array("Valeza Maqedonci", "PHP", 13, 100, 93),
    array("Diella Maqedonci", "PHP", 13, 100, 93),
    array("Anisa Thaçi", "PHP", 16, 100, 31),
    array("Rita Bekteshi", "PHP", 14, 100, 52),
    array("Sara Çoçaj", "PHP", 13, 100, 87),
    array("Bardh Maliqi", "PHP", 14, 100, 21),
    array("Rion Dermaku", "PHP", 14, 100, 79)
);

$valezas_act = 93;
$diellas_act = 93;
$anisas_act = 31;
$ritas_act = 52;
$saras_act = 87;
$bardhs_act = 21;
$rions_act = 79;


echo "Student info: <br><br>";

echo "  Name: " . $info[0][0] . "<br>" . "  Level: " . $info[0][1] . "<br>" . "  Age: " . $info[0][2] . "<br>" . "  Number of activities: " . $info[0][3] . "<br>" . "  Completed activities: " . $info[0][4] . "<br><br><br>";

if($valezas_act > 50){
    echo "Valeza is passing!"."<br>"."<br>";
}else{
    echo "Valeza is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[1][0] . "<br>" . "  Level: " . $info[1][1] . "<br>" . "  Age: " . $info[1][2] . "<br>" . "  Number of activities: " . $info[1][3] . "<br>" . "  Completed activities: " . $info[1][4] . "<br><br><br>";

if($diellas_act > 50){
    echo "Diella is passing!"."<br>"."<br>";
}else{
    echo "Diella is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[2][0] . "<br>" . "  Level: " . $info[2][1] . "<br>" . "  Age: " . $info[2][2] . "<br>" . "  Number of activities: " . $info[2][3] . "<br>" . "  Completed activities: " . $info[2][4] . "<br><br><br>";

if($anisas_act > 50){
    echo "Anisa is passing!"."<br>"."<br>";
}else{
    echo "Anisa is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[3][0] . "<br>" . "  Level: " . $info[3][1] . "<br>" . "  Age: " . $info[3][2] . "<br>" . "  Number of activities: " . $info[3][3] . "<br>" . "  Completed activities: " . $info[3][4] . "<br><br><br>";

if($ritas_act > 50){
    echo "Rita is passing!"."<br>"."<br>";
}else{
    echo "Rita is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[4][0] . "<br>" . "  Level: " . $info[4][1] . "<br>" . "  Age: " . $info[4][2] . "<br>" . "  Number of activities: " . $info[4][3] . "<br>" . "  Completed activities: " . $info[4][4] . "<br><br><br>";

if($saras_act > 50){
    echo "Sara is passing!"."<br>"."<br>";
}else{
    echo "Sara is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[5][0] . "<br>" . "  Level: " . $info[5][1] . "<br>" . "  Age: " . $info[5][2] . "<br>" . "  Number of activities: " . $info[5][3] . "<br>" . "  Completed activities: " . $info[5][4] . "<br><br><br>";

if($bardhs_act > 50){
    echo "Bardh is passing!"."<br>"."<br>";
}else{
    echo "Bardh is failing!"."<br>"."<br>";
}

echo "  Name: " . $info[6][0] . "<br>" . "  Level: " . $info[6][1] . "<br>" . "  Age: " . $info[6][2] . "<br>" . "  Number of activities: " . $info[6][3] . "<br>" . "  Completed activities: " . $info[6][4] . "<br><br><br>";

if($rions_act > 50){
    echo "Rion is passing!"."<br>"."<br>";
}else{
    echo "Rion is failing!"."<br>"."<br>";
}

?>