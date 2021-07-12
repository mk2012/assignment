<?php


session_start();


if(isset($_SESSION['otp'])){

    //verify otp

    if(!isset($_POST['submit'])){

        include '../mailer/index.php';

    }

    


    include '../config/db_connect.php';

    if(isset($_POST['submit'])){
        
        if(empty($_POST['verify'])){

            echo "OTP not entered";

        }else{

            $entered_otp = mysqli_real_escape_string($conn,$_POST['verify']);

            if($entered_otp == $_SESSION['otp']){

                $user_mail = $_SESSION['email'];

                $sql = "UPDATE myUsers SET active=1 WHERE email='$user_mail'";

             //echo  $_SESSION['email'];

                

                if(mysqli_query($conn,$sql)){

                    header("Location: ../pages/Home.php");

                }else{
                    echo "VERIFICATION FAILED" . mysqli_error($conn);
                }
                
            }else{
                echo 'INVALID OTP';

                header("Location: ../pages/Register.php");
            }
        }
    }
}

?>



<div>

<h2> VERIFICATION </h2>

<h4> Enter your OTP here </h4>

<form action = "verify.php" method="post">

<input type="text" name="verify" >

<input type="submit" name="submit" >

</form>


</div>