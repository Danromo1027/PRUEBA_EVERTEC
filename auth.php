<?php
session_start();

// Acceder a la variable de sesión establecida anteriormente
$url = $_SESSION['processURL'];
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
            <h5 class="card-title">Bienvenido a placetopay !!!</h5>
            <p class="card-text">Su Referencia esta comprobada </p>
            <p class="card-text"><small class="text-body-secondary"></small></p>
            <a href="<?php echo $url ?>" class="btn btn-primary">Ir a pasarela</a>
        </div>
    </div>
    <script src="http://localhost/EVERTECPHP/assets/js/bootstrap.js"></script>
</body>
</html>
