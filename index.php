<?php

include_once('conexion/conexion.php');
session_start();

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
    <div class="position-absolute w-50 top-50 start-50 translate-middle">
        <h1>Válvulas PSI Pozos Petroleros</h1><br>
        <table class="table table-hover" style="line-height: 50px;">
            <tr>
                <td class="text-center"><b style="background-color: transparent !important;">ID</b></td>
                <td class="text-center"><b style="background-color: transparent !important;">Nombre del pozo</b></td>
                <td class="text-center"><b style="background-color: transparent !important;">Extensión (Km3)</b></td>
                <td class="text-center"><b style="background-color: transparent !important;">Opciones de histórico</b></td>
                <td class="text-center"><b style="background-color: transparent !important;">Opciones del pozo</b></td>
            </tr>

            <?php
            $query = "SELECT * FROM pozos";
            $rsquery = mysqli_query($con, $query) or die('Error: ' . mysqli_error($con));
            while($fileQUERY = mysqli_fetch_assoc($rsquery)){
            ?>

            <tr>
                <td class="text-center align-middle"><?php echo $fileQUERY['pozoID']; ?></td>
                <td class="align-middle"><?php echo $fileQUERY['nombrePozo']; ?></td>
                <td class="text-center align-middle"><?php echo $fileQUERY['extension']; ?></td>
                <td class="text-center align-middle">
                    <a href="medicion.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>" style="background-color: transparent !important;"><i class="bi bi-plus-circle" id="i-opc"></i></a>
                    <a href="modificarHistorico.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>" style="background-color: transparent !important;"><i class="bi bi-pencil-square" id="i-opc"></i></a>
                    <a href="grafica.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>" style="background-color: transparent !important;"><i class="bi bi-clipboard-data" id="i-opc"></i></a>
                </td>
                <td class="text-center align-middle">
                    <a href="modificarPozo.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>" style="background-color: transparent !important;"><i class="bi bi-gear" id="i-opc"></i></a>
                    <a href="eliminarPozo.php?pozoID=<?php echo $fileQUERY['pozoID']; ?>" style="background-color: transparent !important;"><i class="bi bi-trash3-fill" id="i-opc"></i></a>
                </td>
            </tr>
        <?php } ?>
        </table>
        <?php
        mysqli_close($con);
        ?>
        <br>
        <div class="div-boton">
            <a href="agregarPozo.php" class="boton-verde">AGREGAR POZO</a>
        </div>
    </div>
</body>
</html>