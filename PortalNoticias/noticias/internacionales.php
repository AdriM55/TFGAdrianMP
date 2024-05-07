<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias de Medios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            position: relative;
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .contenedor-medios {
            display: flex;
            justify-content: space-around;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .medio {
            flex: 1;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 0 10px;
        }

        .medio h2 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 0;
            text-align: center;
        }

        .noticias {
            padding: 10px;
        }

        .noticia {
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .noticia h3 {
            margin-top: 0;
        }

        .noticia:hover {
            background-color: #e9e9e9;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        button.volver-inicio {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 20px 40px; /* Aumenta el padding para hacer el botón más grande */
            cursor: pointer;
            margin-top: 20px;
            display: block; /* Para centrar el botón */
            margin: 0 auto; /* Para centrar el botón */
            margin-bottom: 0.5cm;
        }

        button.volver-inicio:hover {
            background-color: #555;
        }       

        button.volver-inicio a {
            text-decoration: none;
            color: #fff;
            display: block;
        }

        button.volver-inicio a:hover {
            text-decoration: underline;
        }

        iframe {
            width: 100%;
            height: 24px;
            border: none;
            position: absolute;
            bottom: 0;
            right: 0;
        }
        
        .botones-login {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .botones-login a {
            margin-left: 10px;
            background-color: #333;
            border: none;
            border-radius: 5px;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none; /* Quita el subrayado predeterminado */
        }

        .botones-login a:hover {
            background-color: #000000;
        }
    </style>
    
</head>
<body>
    <header>
        <h1>Noticias Internacionales</h1>

        <!-- Botones de login y logout -->
        <div class="botones-login">
        <?php
            session_start();
               if (!isset($_SESSION["usuario"])) {
              echo "<a href='../login.php'>Acceder</a>";
            } else { 
        ?>
        Logueado como <a href="../perfil.php"><?= $_SESSION["usuario"] ?></a> (<a href="logout.php">Salir</a>)
        <?php
        }
        ?>

        </div>

        <iframe src="https://www.libertaddigital.com/fragmentos/infobolsa.php?layout=TickerDinamico" title="Cotizaciones IBEX-35"></iframe>
    </header>

    <div class="contenedor-medios">
        <div class="medio" id="elmundo">
            <h2>El Mundo</h2>
            <div class="noticias">
                <!-- Aquí se mostrarán las noticias de El Mundo -->
            </div>
        </div>

        <div class="medio" id="elpais">
            <h2>El País</h2>
            <div class="noticias">
                <!-- Aquí se mostrarán las noticias de El País -->
            </div>
        </div>

        <div class="medio" id="elconfidencial">
            <h2>El Confidencial</h2>
            <div class="noticias">
                <!-- Aquí se mostrarán las noticias de El Confidencial -->
            </div>
        </div>
    </div>
    <button class="volver-inicio"><a href="../index.php">Volver al inicio</a></button>
    <footer>
        <p>&copy; 2024 Portal de Noticias</p>
    </footer>

    <script>
        const Medios = {
          cargarNoticias: function(url, contenedorId) {
              const xhr = new XMLHttpRequest();
              
              xhr.onreadystatechange = function() {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                          const data = JSON.parse(xhr.responseText);
                          const contenedor = document.getElementById(contenedorId);
                          data.items.forEach(item => {
                              const noticia = document.createElement('div');
                              noticia.classList.add('noticia');
                              noticia.innerHTML = `
                                  <h3>${item.title}</h3>
                                  <p>${item.description}</p>
                                  <a href="${item.link}" target="_blank">Leer más</a>
                              `;
                              contenedor.querySelector('.noticias').appendChild(noticia);
                          });
                      } else {
                          console.error('Error al obtener las noticias. Código de estado:', xhr.status);
                      }
                  }
              };

              xhr.open('GET', url);
              xhr.send();
          }
        };

        document.addEventListener("DOMContentLoaded", function() {
          Medios.cargarNoticias('https://api.rss2json.com/v1/api.json?rss_url=https://e00-elmundo.uecdn.es/elmundo/rss/internacional.xml', 'elmundo');
          Medios.cargarNoticias('https://api.rss2json.com/v1/api.json?rss_url=https://feeds.elpais.com/mrss-s/pages/ep/site/elpais.com/section/internacional/portada', 'elpais');
          Medios.cargarNoticias('https://api.rss2json.com/v1/api.json?rss_url=https://rss.elconfidencial.com/mundo/', 'elconfidencial');
        });
    </script>
</body>
</html>
