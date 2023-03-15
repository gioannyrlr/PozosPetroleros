<?php
    include_once('conexion/conexion.php');
    session_start();
    $id = $_GET["pozoID"];
    $QUERYmod = "SELECT * FROM pozos WHERE pozoID='$id'";
    $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
    $fileQUERYmod = mysqli_fetch_array($rsQUERYmod);

    if(isset($_POST['btn']) && $_POST['btn'] == 'GUARDAR'){
        $medicion = $_POST['medicion'];
        $fecha = $_POST['fecha'];
        $id = $_POST['pozoID'];
        $query = "INSERT INTO mediciones (medicion, fecha, pozoID) values('$medicion', '$fecha', '$id')";
        $rsQuery = mysqli_query($con, $query) or die(mysqli_error($con));

        if($rsQuery == true){
            header('Location: index.php');
            mysqli_close($con);

            unset($_POST['btn']);
            unset($_POST['medicion']);
            unset($_POST['fecha']);
            unset($_POST['pozoID']);
            unset($medicion);
            unset($fecha);
            unset($id);
        }
        if($rsQuery == false){
            session_destroy();
            header('Location: index.php');
            echo 'error', '<br />';
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
        <form name="form4" action="medicion.php" method="post">
            <h1>Válvulas PSI Pozos Petroleros</h1><br>
            <h2>Agregar Medición</h2><br>
            <input type="hidden" name="pozoID" value="<?php echo $fileQUERYmod['pozoID']; ?>"><br>
            <label>Medición</label><br>
            <input type="number" name="medicion" step="0.01" required><br><br>
            <label>Fecha</label><br>
            <input type="date" name="fecha" required><br><br>
            <br>
            <div class="div-boton">
                <a href="index.php" class="boton-rojo">REGRESAR</a>
                <input type="submit" value="GUARDAR" class="boton-verde" name="btn" data-bs-toggle="modal" data-bs-target="#guardarModal">
            </div>
        </form>
    </div>
</body>
</html>