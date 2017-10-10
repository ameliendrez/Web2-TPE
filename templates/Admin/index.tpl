{include file="header.tpl"}

</div>
  </div>


  <a href="nuevaCerveza">Agregar Cerveza</a> |
  <a href="mostrarEstilo">Ver Lista de Estilos</a>

  <div class="table-responsive">
    <table class="table">
      <tr  class="">
        <td>Estilo de la cerveza</td>
        <td>Nombre de la cerveza</td>
        <td>%alc</td>
        <td>Descripción</td>
        <td></td>

      </tr>

        {foreach from=$cervezas item=cerveza}
        <tr class="">
          <td>{$cerveza['id_estilo']}</td>
          <td>{$cerveza['nombre']}</td>
          <td>{$cerveza['%alc']}</td>
          <td>{$cerveza['descripcion']|truncate:15}</td>
          <td>
            <a class ="borrarCerveza" href="eliminarCerveza/{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
          </td>


        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
