<?php require_once 'includes/Header.php'; ?>

<!-- ********** BARRA LATERAL ********** -->

<!-- BARRA LATERAL -->
<?php require_once 'includes/Aside.php'; ?>

<!-- SECCION PRINCIPAL -->
<div id="principal">
    <h1>ULTIMAS ENTRADAS</h1>
    <?php
    $entradas = conseguirEntradas($conn);
    if (!empty($entradas)) :
        while ($entrada = mysqli_fetch_assoc($entradas)) :
            ?>

            <article class="entradas">
                <a href="">
                    <h2><?= $entrada['titulo']?></h2> <!-- Muestra titulos -->                    
                    <span class="fecha"><?= $entrada['nombre'] . ' | '. $entrada['fecha']?></span> <!-- Muestra fechas -->
                    <p>
                        <?= substr($entrada['descripcion'], 0, 200)."..."?>
                    </p>                                        
                </a>                    
            </article>
    
            <?php
                    endwhile;
                endif;
    ?>



    <div id="ver-todas">
        <a href="">Ver todas las entradas</a>                   
    </div>                
</div> <!-- FIN DE PRINCIPAL -->    


<!-- FOOTER  -->
<?php require_once 'includes/Footer.php'; ?>


