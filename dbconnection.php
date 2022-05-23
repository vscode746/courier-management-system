<?php

    $dbcon = mysqli_connect('localhost','root','','courierdb1');

    if($dbcon==false)
    {
        echo "Database is not Connected!";
    }
   
?>