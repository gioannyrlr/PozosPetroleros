<?php
    $con = mysqli_connect("localhost","root","","aplicacion_pozos");

    if(mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }else{
    //echo 'conectado';
    }
?>