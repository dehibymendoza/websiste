<?php $url_base = "http://localhost/websiste/admin/"; ?>

<!doctype html>
<html lang="en">

<head>
    <title>ADM-WEBSISTE</title>
    <link rel="icon" type="assets/Logo.png" href="assets/Logo.png">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <a class="nav-item nav-link active" href="<?php echo $url_base; ?>index.php" aria-current="pege">ADMINISTRADOR<span class="visually-hidden">(current)</span></a>
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/servicios/">SERVICIOS
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/portafolio/" aria-current="page">PORTAFOLIO
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/entradas/" aria-current="page">ENTRADAS
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/equipo/" aria-current="page">EQUIPO
                                <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/blog/" aria-current="page">BLOG
                            <span class="visually-hidden">(current)</span></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo $url_base; ?>secciones/configuraciones/" aria-current="page">CONFIGURACIONES <span class="visually-hidden">(current)</span> </a>

                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USUARIOS</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="<?php echo $url_base; ?>login.php">CLIENTES</a>
                                <a class="dropdown-item" href="<?php echo $url_base; ?>login.php">CERRAR SECCIÓN</a>
                        </li>
                    </ul>
                    <form class="d-flex my-2 my-lg-0">
                        <input class="form-control me-sm-2" type="text" placeholder="Buscar">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit"> Buscar </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main class="container">
</br>