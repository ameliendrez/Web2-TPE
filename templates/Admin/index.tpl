{include file="header.tpl"}

</div>
  </div>


  <a href="nuevaCerveza">Agregar Cerveza</a> |
  <a href="mostrarEstilo">Ver Lista de Estilos</a>

  <div class="table-responsive">
    <table class="table">
      <tr>
        <td>Estilo de la cerveza</td>
        <td>Nombre de la cerveza</td>
        <td>%alc</td>
        <td>Descripción</td>
        <td></td>

      </tr>

        {foreach from=$cervezas item=cerveza}
        <tr>
          <td>{$cerveza['estilo']}</td>
          <td>{$cerveza['nombreCerveza']}</td>
          <td>{$cerveza['porcentajeALC']}</td>
          <td>{$cerveza['descripcion']|truncate:15}</td>
          <td>
            <a href="eliminarCerveza/{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="updateCerveza" name="{$cerveza['id_cerveza']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>




        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
