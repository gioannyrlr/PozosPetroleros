<?php
    include_once('../conexion/conexion.php');
    session_start();

    $id = $_POST['medicionID'];
    $medicion = $_POST['medicion'];
    $fecha = $_POST['fecha'];
    $idPozo = $_POST['pozoID'];

    $query = "UPDATE mediciones_manometro SET medicion='$medicion', fecha='$fecha' WHERE medicionID='$id' AND pozoID = $idPozo";
    $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

    if($rsQuery == true){
        header('Location: ../index.php');
        mysqli_close($con);

        unset($_POST['btn']);
        unset($_POST['medicionID']);
        unset($_POST['pozoID']);
        unset($_POST['medicion']);
        unset($_POST['fecha']);
        unset($id);
        unset($idPozo);
        unset($medicion);
        unset($fecha);
    }
    if($rsQuery == false){
        session_destroy();
        header('Location: ../index.php');
        echo 'error', '<br />';
    }
?>