<?php

$db = mysqli_connect("localhost","root","","banking");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>