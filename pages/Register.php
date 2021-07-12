<?php

include $_SERVER['DOCUMENT_ROOT']."/Project/config/db_connect.php";

$emailErr = $nameErr = $pass_error = '';


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }



if(isset($_POST['submit'])){
    
   
    
 

    if(!empty($_POST['mail'])){
        $temp_email = test_input($_POST["mail"]);
   
    if (!filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    
    }else{
        $email = mysqli_real_escape_string($conn,$_POST['mail']);
        }
    }else{
        $emailErr = "MAIL REQUIRED";     
        
    }



    if(!empty($_POST['name'])){
        $temp_name = test_input($_POST["name"]);
       
       
        $username = mysqli_real_escape_string($conn,$_POST['name']);
            
        }else{
            $nameErr = "NAME REQUIRED";
      
    }




    if(!empty($_POST['pwd'])){
        $temp_password = mysqli_real_escape_string($conn,$_POST['pwd']);

        $hashed_password = password_hash($temp_password,PASSWORD_DEFAULT);
    }else{
       $pass_error  =  "PASSWORD REQUIRED ";
       
    }

   


    if(!empty($username) && !empty($hashed_password) && !empty($email) ){
      
       
        $sql = "INSERT INTO myusers(email,username,password) VALUES ('$email','$username','$hashed_password')";

        if(mysqli_query($conn,$sql)){

            // send mail verification

            session_start();

            $msg  = rand(1000,9999);

            $_SESSION["otp"] = $msg;
            $_SESSION['email'] = $email;


            $subject = "Verification";

          //  echo $email,$subject,$msg;  

           // mail($email,$subject,$msg);

            header("Location: verify.php");

           




           // echo "RECORD SENT";

        }else{
            echo "ERR" . mysqli_error($conn);
        }
    }else{
       
        echo $nameErr . "<br/>",$emailErr . "<br/>",$pass_error;
        
    }


    
}


?>

<style>

<?php include '../styles/index.css' ?>

</style>





<div class="register-container">

<h2> REGISTER  </h2>


<form action= 'Register.php'  method="post" class="register-form" >


<input type="email" name="mail" placeholder="Email...">


<input type="text" name="name" placeholder="Name...">


<input type="text" name="pwd" placeholder="Password...">


<input type="submit" name="submit" class="submit-btn" >


</form>




</div>