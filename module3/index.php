<?php

$num = 4;

if($num > 0){
    echo "$num is greater then 0";
}else{
   echo "$num is smaller then 0";
}

echo "<br><br>";

$age = 13;

if(($age > 12) && ($age < 18)){
    echo "You are a teenager";
}

echo "<br><br>";

$age = 19;

if($age < 18){
    echo "You are under 18";
}else{
    echo "You are an adult";
}

echo "<br><br>";

$number = 1;

if($number < 0){
    echo "The value of $number is a negative number";
}elseif($number == 0){
    echo "The value of $number is zero";
}else{
    echo "The value of  $number is a positive number";
}

echo "<br><br>";

$nr1 = 5;
$nr2 = 13;

if($nr1 == $nr2){
    echo "$nr1 is equal with $nr2";
}else{
    echo "$nr1 is not equal with $nr2";
}

echo "<br><br>";

$day = 3;

switch ($day) {
    case '1':
        echo "It's Monday";
        break;

    case '2':
        echo "It's Tuesday";
        break;

    case '3':
        echo "It's Wednesday";
        break;

    case '4':
        echo "It's Thursday";
        break;
    
    default:
        echo "Day unavalible";
        break;
}

?>