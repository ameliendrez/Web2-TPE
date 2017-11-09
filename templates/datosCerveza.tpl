
<table class="table">

{include file="tablaCervezasHeader.tpl"}

  <tr>

    <td>Imagen</td>
    <td>Borrar Imagen</td>

    {foreach from = $imagenes item = imagen}
      <td><img class="img-responsive" src="{$imagen['ruta']}" alt="{$cerveza['nombre_cerveza']}"></td>
      <td></td>
    {/foreach}
  </tr>

</table>
