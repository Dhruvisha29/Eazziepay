
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Banking System</title>
    <link rel="stylesheet" href="transfer.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Petit Formal Script">
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
     

<div class="container">
  <form method="POST" action="mid.php">
    
   <label for="sender">Select Sender</label>
    <select id="sender" name="sender" required="true">
      <option disabled selected>--Sender--</option>
      <?php
        include "dbconnect.php";  
        $records = mysqli_query($db, "SELECT Name From customer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";  // displaying data in option menu
        } 
    ?>  
      
    </select>
   
    <label for="receiver">Select Receiver</label>
    <select id="receiver" name="receiver" required="true">
      <option disabled selected>--Receiver--</option>
      <?php
        include "dbconnect.php";  
        $records = mysqli_query($db, "SELECT Name From customer");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['Name'] ."'>" .$data['Name'] ."</option>";  // displaying data in option menu
        } 
    ?> 
    </select> 
      
    <label for="amount">Enter Amount</label>
    <input type="text" id="amount" name="amount" placeholder="amount.." required="true" autocomplete="off">
  
   <center><input type="submit" value="Submit" name="submit"></center>
  </form>
</div>
</div>

    <div class="footer">
     Designed and Developed by Eazziepay
    </div>
    <?php mysqli_close($db); ?>
  </body>
</html>