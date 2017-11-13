<?php
 class ConfigApi
 {
     public static $RESOURCE = 'resource';
     public static $PARAMS = 'params';
     public static $RESOURCES = [
       'cervezas#GET'=> 'BeerApiController#getComentariosCerveza',
       'cervezas#DELETE'=> 'BeerApiController#borrarComentario',
       'cervezas#POST'=> 'BeerApiController#crearComentario'
     ];
 }
 ?>
