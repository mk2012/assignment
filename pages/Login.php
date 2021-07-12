<?php

include $_SERVER['DOCUMENT_ROOT']."/Project/config/db_connect.php";

if(isset($_POST['submit'])){

    

    $email = mysqli_real_escape_string($conn,$_POST['mail']);

    $mail_check = "SELECT * FROM myusers WHERE email='$email' ";

    $check_mail = mysqli_query($conn,$mail_check);

    $cm = mysqli_fetch_array($check_mail,MYSQLI_ASSOC);

    if(!empty($cm)){
      // print_r($total['username']);
    }else{
        echo "This mail is not registered";
    }

   $user_db_password = $cm['password']; // password got from db
 
    $password = $_POST['pwd']; // password entered by user

    

    if(password_verify($password, $user_db_password)) {

        echo "MAtched";

        $pwd = $user_db_password;
        
    }else{
        echo "PASSWORD DIDN'T MATCH";
    }



    

    $sql = "SELECT * FROM myusers WHERE email='$email' AND password='$pwd'";

    //echo $email,$hashed_password;

    $result = mysqli_query($conn,$sql);

    $total = mysqli_fetch_array($result,MYSQLI_ASSOC);

    echo "****";

    if(!empty($total)){

    session_start();


     $_SESSION['name'] = $total['username'];

     header('Location: Home.php');

    }else{
        echo "ERR" . mysqli_error($conn);
    }
}

?>



<style>

<?php include '../styles/index.css' ?>

</style>





<div class="register-container">

<h2> Login  </h2>


<form action= 'Login.php'  method="post" class="login-form" >


<input type="email" name="mail" placeholder="Email...">



<input type="text" name="pwd" placeholder="Password...">


<input type="submit" name="submit" class="submit-btn" >


</form>




</div>