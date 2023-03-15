<?php
    include_once('conexion/conexion.php');
    session_start();
    $id = $_GET["pozoID"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles.css">
    
    <!-- Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <h2>Grafica del histórico</h2><br>
        <canvas id="myChart">
            <script>
            const labels = [
                <?php
                $QUERYmod = "SELECT * FROM mediciones WHERE pozoID ='$id' ORDER BY fecha";
                $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
                //$fileQUERYmod = mysqli_fetch_array($rsQUERYmod);
                while ($fileQUERYmod = mysqli_fetch_array($rsQUERYmod)){
                    ?>
                    '<?php echo $fileQUERYmod['fecha']?>',
                    <?php
                }
                ?>
            ];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'Mediciones',
                    backgroundColor: '#E2EFE2',
                    borderColor: '#34c631',
                    <?php
                    $QUERYmod = "SELECT * FROM mediciones WHERE pozoID ='$id'";
                    $rsQUERYmod = mysqli_query($con, $QUERYmod) or die('Error: ' . mysqli_error($con));
                    ?>
                    data: [<?php while ($fileQUERYmod = mysqli_fetch_array($rsQUERYmod)){?>
                        '<?php echo $fileQUERYmod['medicion']?>',
                        <?php
                    }?>],
                }]
            };
            const config = {
                type: 'line',
                data: data,
                options: {}
            };
            </script>
        </canvas>
        <br><br>
        <div class="div-boton">
            <a href="index.php" class="boton-rojo">REGRESAR</a>
        </div>
    </div>
    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</body>
</html>