<?php
  define('DB_NAME', 'webbeer');
  define('DB_USER', 'root');
  define('DB_PASSWORD', '');
  define('DB_HOST', 'localhost');
  define('DB_FILE', 'database/webBeer.sql');
  define('DB_SELECT', 'cerveza.nombre_cerveza, cerveza.alc, cerveza.descripcion, estilocerveza.nombre_estilo
   FROM cerveza INNER JOIN estilocerveza ON cerveza.id_estilo = estilocerveza.id_estilo')


 ?>
