<?php
include_once 'includes/redireccionar.php';
include_once 'includes/Header.php';
include_once 'includes/Aside.php';
?>



<!-- SECCION PRINCIPAL -->
<div id="principal">
    <h1>CREAR ENTRADAS</h1>

    <P>
        Añade una nueva entrada para que los usuarios puedan opinar con los demas usuarios sobre temas importantes
    </P>

    <br><!-- comment -->

    <form action="GuardarEntrada.php" method="POST">
        <label for="titulo">Titulo</label>
        <input type="text" name="titulo"/>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : '' ; ?>

        <label for="descripcion">Descripcion</label>
        <textarea name="descripcion"></textarea> 
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : '' ; ?>

        <label for="categoria">Categoria</label>
        <select name="categoria">

            <!-- EXTRAER LOS DATOS DE LA CATEGORIA DESDE LA BASE DE DATOS -->
            <?php $categorias = conseguirCategorias($conn) ?>

            <!-- EXTRAER LOS DATOS DE LA CATEGORIA DESDE LA BASE DE DATOS -->             
            <?php
            if (!empty($categorias)) :
                while ($categoria = mysqli_fetch_assoc($categorias)):
                    ?>

                    <option value="<?= $categoria['id'] ?>">
                        <?= $categoria['nombre'] ?>                 
                    </option>

                    <?php
                endwhile;
            endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : '' ; ?>

        <input type="submit" name="guardar" value="Guardar"/>
    </form>


</div> <!-- FIN DE PRINCIPAL -->    

