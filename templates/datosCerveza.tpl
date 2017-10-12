
<table class="table">

{include file="tablaCervezasHeader.tpl"}

  <tr>

    <td>{$cerveza['estilo']}</td>
    <td>{$cerveza['nombreCerveza']}</td>
    <td>{$cerveza['porcentajeALC']}</td>
    <td>{$cerveza['descripcion']}</td>
    <td><img class="img-responsive carrusel" src="images/{$cerveza['nombreCerveza']}.jpg" alt="{$cerveza['nombreCerveza']}"></td>


  </tr>

</table>
