<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$_SESSION['title']?></title>
    <link rel="stylesheet" href="public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary-plantilla p-0">
        <div class="container-fluid ">
            <a class="navbar-brand" href="#">MACAK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item ">
                        <a class="item nav-link listar activar_boton" aria-current="page" href="src/vistas/home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="item nav-link listar activar_boton" href="src/vistas/fundaciones.php">Fundaciones Asociadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="item nav-link listar activar_boton" href="src/vistas/adopcion_apadrinamiento.php">Adopción y
                            Apadrinamiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="item nav-link listar activar_boton" href="src/vistas/donaciones.php">Donaciones</a>
                    </li>
                    <li class="nav-item " style=" color:black;">
                        <b><a class="item nav-link btn p-1 m-1 bg-primary-plantilla listar activar_boton"
                                href="src/vistas/login.php">Iniciar Sesión</a></b>
                    </li>
                    <li class="nav-item " style=" color:black;">
                        <b><a class="item nav-link btn p-1 m-1 bg-primary-plantilla listar activar_boton"
                                href="src/vistas/register.php">Registrarse</a></b>
                    </li>
                </ul>
               
            </div>

        </div>
    </nav>
    <div id="contenido">