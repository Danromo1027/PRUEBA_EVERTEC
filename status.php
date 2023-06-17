<?php
session_start(); // INICIA LAS VARIABLES DE SESSION PA LEER O ESCRIBIR  GetRequest Infotmation

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="http://localhost/EVERTECPHP/assets/css/bootstrap.css">
    <link rel="stylesheet" href="http://localhost/EVERTECPHP/assets/css/card.css">
</head>
<body>
    <div class="card">
        <img src="http://localhost/EVERTECPHP/assets/img/placetopay-logo.svg" class="card-img-top" alt="...">
        <div class="card-body">

            <h5 class="card-title">El estado de tu transaccion fue</h5>
            
            <p class="card-text"><?php
                    //echo $_SESSION['status'];

                 if ($_SESSION['status'] == 'APPROVED') {
                     echo "APROBADA";
                 } elseif ($_SESSION['status'] == 'PENDING') {
                     echo "PENDIENTE";
                 } elseif ($_SESSION['status'] == 'REJECTED') {
                     echo "RECHAZADA";
}
            ?></p>
            <p class="card-text"><small class="text-body-secondary">Gracias por usar nuestros servicios...</small></p>
            <!-- <form action="limpiar.php">

            </form> -->
        </div>
    </div>
    <script src="http://localhost/EVERTECPHP/assets/js/bootstrap.js"></script>
</body>
</html>

<?php
unset($_SESSION['requestId']);
unset($_SESSION['processURL']);

?>