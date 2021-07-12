<?php

session_start();

if(isset($_SESSION['name'])){

$name = $_SESSION['name'];

}else{
    $name="";

    include '../config/db_connect.php';

    $user_mail = $_SESSION['email'];

    $sql = "SELECT * FROM myUsers WHERE email = '$user_mail'";

    if(mysqli_query($conn,$sql)){

        $res = mysqli_query($conn,$sql);

        $result = mysqli_fetch_assoc($res);

        $name = $result['username'];


        

    }else{

       // echo "failed";
    }

}

if(isset($_POST['submit'])){
    deleteAccount();
}

function deleteAccount(){

    $user_mail = $_SESSION['email'];

    $delete_query = "DELETE FROM  myUsers 
    
                    WHERE email= '$user_mail'";

    if(mysqli($conn,$sql)){

        header("Location: ./Register.php");
    }else{

        print "Failed ! Try again...";
    }

    

   
}


?>


<div>


<h2> Welcome <?php echo $dispaly_name = $name ?? "" ?> </h2>

<form action="./Home.php"  method="post">

<input name="submit" class="unsubscribe" value="unsubscribe" type="submit"> 

</form>

</div>