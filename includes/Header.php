<?php require_once 'includes/Conexion.php'; ?>
<?php include_once 'includes/Helpers.php'; ?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog de PROGRAMADORES</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/style.css"/>
    </head>

    <body>
        <!-- ********** CABECIERA ********** -->
        <!-- LOGO -->
        <header id="cabecera">
            <div id="logo">
                <a href="index.php">
                    Blog de Programación
                </a>
            </div>

            <!-- ********** MENU ********** -->

            <nav id="menu">
                <ul>
                    <li>
                        <a href="index.php">Sobre nosotros</a>
                    </li>
                    
                    <li>
                        <a href="index.php">Contacto</a>
                    </li>
                    
                    <!-- IMPORTO DESDE HELPER LA FUNCION CONSEGUIR CATEGORIAS -->
                    <?php
                    $categorias = conseguirCategorias($conn);
                    while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>

                        <li>
                            <a href="Categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
                        </li>

                    <?php endwhile; ?>

                    <li>
                        <a href="index.php">Inicio</a>
                    </li>
                </ul>                

            </nav>

            <div class="clearfix"></div>
        </header>

        <div id="contenedor">