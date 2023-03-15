<?php

include_once('conexion/conexion.php');
session_start();
$nombre = null;
$extension = null;

if(isset($_POST['btn']) && $_POST['btn'] == 'GUARDAR'){
    if(isset($_POST['nombre']) && isset($_POST['extension']) && !empty($_POST['nombre']) && !empty($_POST['extension'])){
        $nombre = $_POST['nombre'];
        $extension = $_POST['extension'];
        $query = "INSERT INTO pozos (nombrePozo, extension) values('$nombre', '$extension')";
        $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

        if($rsQuery == true){
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['nombre']);
            unset($_POST['extension']);
            unset($nombre);
            unset($extension);
            header('Location: index.php');
        }if($rsQuery == false){
            session_destroy();
            header('Location: agregarPozo.php');
            echo 'error', '<br />';
        }
    }else{
        session_destroy();
        header('Location: agregarPozo.php');
        echo 'error', '<br>';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles.css">

    <!-- Bootstrap, Fontawesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Icon -->
    <link rel="icon" href="./img/pdvsa-logo.png">
    
    <title>Válvulas PSI Pozos Petroleros</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="./img/pdvsa-logonav.png" alt="Logo" width="180" height="50" class="d-inline-block align-text-top">
            </a>
        </div>
    </nav>
    <div class="position-absolute top-50 start-50 translate-middle">
        <form name="form4" action="agregarPozo.php" method="post">
        <h1>Válvulas PSI Pozos Petroleros</h1><br>
        <h2>Agregar Pozo</h2><br>
        <label>Nombre</label><br>
        <input type="text" name="nombre" required><br><br>
        <label>Extensión (Km3)</label><br>
        <input type="number" name="extension" required><br><br>
        <br>
        <div class="div-boton">
            <a href="index.php" class="boton-rojo">REGRESAR</a>
            <input type="submit" value="GUARDAR" class="boton-verde" name="btn" data-bs-toggle="modal" data-bs-target="#guardarModal">
        </div>
    </div>
</body>
</html>