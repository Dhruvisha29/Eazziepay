<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Banking System</title>
    <link rel="stylesheet" href="history.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Petit Formal Script">
    <style>
    #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
  padding:40px 60px;
  position: center;
  color:white;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 15px;
}

#customers tr:nth-child(even){background-color: #476b6b;}

#customers tr{background-color: #476b6b;}

#customers th {
  padding-top: 19px;
  padding-bottom: 12px;
  padding-left: 50px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
  </head>
  <body>
    <div class="header">
    
      <div class="header-logo" style="display: inline-block;margin-top:10px; font-family:Petit Formal Script;font-size:27px;color:#F8FFF8;">Eazziepay</div>
      
         <div class="header-list" style="display: inline-block;float: right;">
            <ul style="display: inline-block;margin-top:20px;font-size:17px;">
              <li><a href="transfer.php" class="d">Transfer</a></li>
              <li><a href="users.php" class="d">Users</a></li>
              <li><a href="history.php" class="d">History</a></li>
              <li><a href="index.php" class="d">Home</a></li>
             </ul>
          </div> 
      
    </div>

    <div class="main">
      <table id="customers" align="center">
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Amount</th>
        </tr>

          <?php include('dbconnect.php') ?>
          <?php

            if($_SESSION["success"]=="done")
            {
                   echo '<script>alert("Money Transferred Succesfully")</script>'; 
                   $_SESSION["success"]="go";
            
                   $sql= "SELECT Id,Name,Email,Amount from customer";
                   $result = $db->query($sql);

                    if($result-> num_rows>0)
                  {
                      while($row=$result-> fetch_assoc())
                    {
                      echo"<tr><td>".$row["Id"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Amount"]."</td></tr>";
                    }
                 }
            
                    else
                  {
                      echo "0 result";
                  }

              echo "</table>";
              mysqli_close($db);
          }

          else{

            $sql= "SELECT Id,Name,Email,Amount from customer";
            $result = $db->query($sql);

            if($result-> num_rows>0)
            {
              while($row=$result-> fetch_assoc())
              {
                echo"<tr><td>".$row["Id"]."</td><td>".$row["Name"]."</td><td>".$row["Email"]."</td><td>".$row["Amount"]."</td></tr>";
              }
            }
            else
            {
              echo "0 result";
            }
            echo "</table>";
            mysqli_close($db);
          }
         ?>
      
    </div>

    <div class="footer">
    Designed and Developed by Eazziepay
    </div>

  </body>
</html>