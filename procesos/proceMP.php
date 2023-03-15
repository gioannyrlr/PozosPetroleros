<?php
    include_once('../conexion/conexion.php');
    session_start();

    $id = $_POST['pozoID'];
    $nombre = $_POST['nombre'];
    $extension = $_POST['extension'];

    $query = "UPDATE pozos_petroleros SET nombrePozo='$nombre', extension='$extension' WHERE pozoID='$id'";
    $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

    if($rsQuery == true){
        header('Location: ../index.php');
        mysqli_close($con);

        unset($_POST['btn']);
        unset($_POST['pozoID']);
        unset($_POST['nombre']);
        unset($_POST['extension']);
        unset($id);
        unset($nombre);
        unset($extension);
    }
    if($rsQuery == false){
        session_destroy();
        header('Location: ../index.php');
        echo 'error', '<br />';
    }
?>