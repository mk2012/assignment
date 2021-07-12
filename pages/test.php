<?php

$msg  = rand(1000,9999);

$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";


$subject = "Verification";

$email = "manojsharp3@gmail.com";


if( mail($email,$subject,$msg,$headers)){
    print "Sent";
}else{
    print "NOt sent";
}

 

// $result = mail($email,$subject,$msg,$headers);

// echo $result;


?>