<?php

//$my_file = fopen("file1.txt", "w");

//w=writing mode only r=reading mode only a=add something only to the end

//fclose($my_file );

// $filename = "file1.txt";
// $file = fopen($filename, "r");

// $filesize = filesize($filename);

// $my_filedata = fread($file, $filesize);
// echo $my_filedata . "<br>";

$file1 = fopen("myfile.txt", "r");
while(!feof($file1)){
    echo fgets($file1). "<br>";
}

//fwrite

$my_file1 = fopen("example.txt", "w");

$text = "computer programming";

fwrite($my_file1, $text);

//w+ (read and write only)

$file2 = fopen("data.txt", "w+");
fwrite($file2, "Welcome to Digital Scool!");






?>