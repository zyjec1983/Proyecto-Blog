
<aside id="sidebar">
    
    
    <!-- SECCION LOGIN -->

    <!-- SECCION LOGIN - MOSTRANDO LOS DATOS DE LA PERSONA LOGEADA -->
    <?php if (isset($_SESSION['usuario'])) : ?>

            <div id="usuario-logeado" class="block-aside">
                <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']; ?> </h3>            
                
                  <!-- BOTONES -->
                  <a href="crearEntradas.php" class="boton boton-verde">Crear entradas</a> 
                  <a href="crearCategoria.php" class="boton">Crear categoria</a> 
                  <a href="misDatos.php" class="boton boton-naranja">Mis datos</a> 
                  <a href="CerrarSesion.php" class="boton boton-rojo">Cerrar sesión</a> 
                  
            </div>   
    <?php endif; ?>
    
    <!-- ESTA SECCION CONTROLA SI APARECE O NO EL MENU LATERAL CUANDO HAYA UNA SESION -->
     <?php if (!isset($_SESSION['usuario'])) : ?>
    
    <!-- SECCION LOGIN - MOSTRANDO LOS ERRORES AL INGRESAR -->    
    <?php if (isset($_SESSION['error_login'])) : ?>

        <div class="alerta alerta-error">
            <h3>Datos ingresados incorrectos</h3>            
        </div>   
    <?php endif; ?>

    <!-- SECCION LOGIN - FORMULARIO -->

    <div id="login" class="block-aside">
        <h3>Identificate</h3>
        
           <!-- SECCION LOGIN - MOSTRANDO LOS ERRORES -->    
   <?php if (isset($_SESSION['error_login'])) : ?>

        <div class="alerta alerta-error">
            <h3>Datos ingresados incorrectos</h3>            
        </div>   
    <?php endif; ?>
           
             <!-- FORMULARIO DE INGRESO -->
        <form action="Login.php" method="POST">

            <label for="email">Email</label>
            <input type="email" name="email">

            <label for="password">Password</label>
            <input type="password" name="password">

            <input type="submit" value="Ingresar">

        </form>
    </div>

    <!-- SECCION  REGISTRATE -->
    <div id="registrar" class="block-aside">
        <h3>Registrate</h3>

        <!-- MOSTRABDO MENSAJE DE EXITO DESDE REGISTRO.PHP -->
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>


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
    </div>
    <?php endif;?>
</aside>