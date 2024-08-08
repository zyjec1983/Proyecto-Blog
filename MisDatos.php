<?php
include_once 'includes/redireccionar.php';
include_once 'includes/Header.php';
include_once 'includes/Aside.php';
?>

<!-- SECCION PRINCIPAL -->
<div id="principal">
    <h1>ACTUALIZAR MIS DATOS</h1>
    <?php
    ?>

    <!-- FORMULARIO DE REGISTRO + ERRORES QUE PUEDEN VENIR DE REGISTRO.PHP -->
    <form action="Registro.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre">  
        <!-- De la clase helper viene estas lineas de errores -->           
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido">                        
        <!-- De la clase helper viene estas lineas de errores -->
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

        <label for="email">Email</label>
        <input type="text" name="email">
        <!-- De la clase helper viene estas lineas de errores -->
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'mail') : ''; ?>

        <label for="password">Password</label>
        <input type="password" name="password">
        <!-- De la clase helper viene estas lineas de errores -->
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

        <input type="submit" name="submit" value="Registrar">

    </form>
    <?php borrarErrores(); ?>

</div> <!-- FIN DE PRINCIPAL --> 


<?php
include_once 'includes/Footer.php';
?>
