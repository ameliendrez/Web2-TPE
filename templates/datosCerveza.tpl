
<table class="table">

{include file="tablaCervezasHeader.tpl"}

  <tr>

    <td>{$cerveza['nombre_estilo']}</td>
    <td>{$cerveza['nombre_cerveza']}</td>
    <td>{$cerveza['alc']}</td>
    <td>{$cerveza['descripcion']}</td>
    <td><img class="img-responsive " src="images/{$cerveza['nombreCerveza']}.jpg" alt="{$cerveza['nombreCerveza']}"></td>

  </tr>

</table>
