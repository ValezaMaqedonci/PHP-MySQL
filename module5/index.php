<?php


$cats = array(
    array("British Shorthair", "United Kindom", 17),
    array("Ragdoll", "United States of America", 15),
    array("Maine Coon", "United States of America", 17)
);

echo $cats[0][0] . " : Origin: " . $cats[0][1] . ", Lifespan: " . $cats[0][2] . "<br>";

echo $cats[1][0] . " : Origin: " . $cats[1][1] . ", Lifespan: " . $cats[1][2] . "<br>";

echo $cats[2][0] . " : Origin: " . $cats[2][1] . ", Lifespan: " . $cats[2][2] . "<br>";


for($row = 0; $row < 3; $row++){
    echo "<p><b> Row number $row </p></b>";
    echo "<ul>";
    for($col = 0; $col < 3; $col++){
        echo "<li>" . $cats[$row][$col] . "</li>";
    }

    echo "</ul>";
}


for($i = 0; $i < 5; $i++){
    for($j = 0; $j <= $i; $j++){
        echo "*";
    }
    echo "<br>";
}

//Associative arrays 

$grades = ["Math" => "2", "Art" => "5", "History" => "5", "Music" => "3", "Science" => "4", ];


echo "Art grade is: " . $grades["Art"];
echo "<br>";
echo "<br>";

foreach($grades as $subject => $grade){
    echo "Subject: ". $subject . ", Grade: " . $grade;
    echo "<br>";
}

?>