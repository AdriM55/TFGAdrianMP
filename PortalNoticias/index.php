<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Noticias</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Portal de Noticias</h1>
        <!-- Botones de login y logout -->
        <div class="botones-login">
        <?php
            session_start();
               if (!isset($_SESSION["usuario"])) {
              echo "<a href='login.php'>Acceder</a>";
            } else { 
        ?>
        Logueado como <a href="perfil.php"><?= $_SESSION["usuario"] ?></a> (<a href="logout.php">Salir</a>)
        <?php
        }
        ?>
        </div>
        
        <!-- Aquí insertamos el fragmento de cotizaciones del IBEX-35 -->
        <iframe src="https://www.libertaddigital.com/fragmentos/infobolsa.php?layout=TickerDinamico" title="Cotizaciones IBEX-35"></iframe>
    </header>
    <br>
    <div class="contenedor">
        <section id="internacional" class="categoria">
            <h2>Internacional</h2>
            <div class="noticias" id="noticias-internacionales">
                <!-- Aquí se mostrarán las noticias internacionales -->
            </div>
            <button class="ver-mas"><a href="noticias/internacionales.php">Ver más</a></button>
        </section>
        <section id="nacional" class="categoria">
            <h2>Nacional</h2>
            <div class="noticias" id="noticias-nacionales">
                <!-- Aquí se mostrarán las noticias nacionales -->
            </div>
            <button class="ver-mas"><a href="noticias/nacionales.php">Ver más</a></button>
        </section>
    </div>

    <div class="contenedor">
        <section id="campoGIB" class="categoria">
            <h2>Campo de Gibraltar</h2>
            <div class="noticias" id="noticias-campoGIB">
                <!-- Aquí se mostrarán las noticias del campo de Gibraltar -->
            </div>
            <button class="ver-mas"><a href="noticias/campoGIB.php">Ver más</a></button>
        </section>
        <section id="opinion" class="categoria">
            <h2>Opinión</h2>
            <div class="noticias" id="noticias-opinion">
                <!-- Aquí se mostrarán las noticias de opinión -->
            </div>
            <button class="ver-mas"><a href="noticias/opinion.php">Ver más</a></button>
        </section>
    </div>

    <div class="contenedor">
    <section id="campoGIB" class="categoria">
            <h2>Trending</h2>
            <div class="noticias" id="noticias-trending">
                <!-- Aquí se mostrarán las noticias con más likes -->
            </div>
            <button class="ver-mas"><a href="#">Ver más</a></button>
    </div>
    <footer>
        <p>&copy; 2024 Portal de Noticias</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
