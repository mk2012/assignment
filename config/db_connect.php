<?php


$uname = "mkuser";
$pwd = "mambarai";
$host = "localhost";
$db = "userDb";

$conn = mysqli_connect($host,$uname,$pwd,$db);

if($conn){
   // echo "db_connected";
}else{
    echo "Error " . mysqli_error($conn);
}



?>