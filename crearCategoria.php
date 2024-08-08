<?php
include_once 'includes/redireccionar.php';
include_once 'includes/Header.php';
include_once 'includes/Aside.php';
?>

<!-- SECCION PRINCIPAL -->
<div id="principal">
    <h1>CREAR CATEGORIAS</h1>

    <P>
        Añade una nueva categoria para que los usuarios puedan interactuar con los demas usuarios
    </P>
    
    <br><!-- comment -->
    
    <form action="GuardarCategoria.php" method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre"/>
        <input type="submit" name="guardar" value="guardar"/>
    </form>


</div> <!-- FIN DE PRINCIPAL -->    

<?php
include_once 'includes/Footer.php';
?>