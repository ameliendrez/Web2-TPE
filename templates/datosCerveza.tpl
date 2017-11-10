
<table class="table">

{include file="tablaCervezasHeader.tpl"}

  <tr>

    <td>{$cerveza['nombre_estilo']}</td>
    <td>{$cerveza['nombre_cerveza']}</td>
    <td>{$cerveza['alc']}</td>
    <td>{$cerveza['descripcion']}</td>


    {foreach from = $imagenes item = imagen}
      <td><img class="img-responsive" src="{$imagen['ruta']}" alt="{$cerveza['nombre_cerveza']}" width="65" height="65"></td>
    {/foreach}
  </tr>

</table>
