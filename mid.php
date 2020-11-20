<?php 
session_start();
include 'dbconnect.php';

if(isset($_POST['submit'])){
    $send= $_POST['sender'];
    $rece= $_POST['receiver'];
    $amt= $_POST['amount'];

    $query = "INSERT INTO transaction(`Sender`,`Receiver`,`Amount`) VALUES ('$send','$rece','$amt')";

    
    $result=mysqli_query($db,$query);
    if($result)
    {

      $upd="UPDATE customer SET Amount=Amount+'$amt' WHERE Name='$rece'";
    
      $result1=mysqli_query($db,$upd);
      $ded="UPDATE customer SET Amount=Amount-'$amt' WHERE Name='$send'";
    
      $result2=mysqli_query($db,$ded);
      $_SESSION["success"]="done";
         /*echo '<script>alert("Money Transferred Succesfully'.$_SESSION["success"].'")</script>';*/ 
      header('Location:users.php');
      
    }
    else
    { 
       echo '<script>alert("Money Transfer failed")</script>'; 
    }

    
   } 
  
  ?>
  