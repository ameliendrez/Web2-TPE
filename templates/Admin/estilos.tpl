{include file="header.tpl"}

</div>
  </div>

  <a href="nuevoEstilo">Agregar Estilo</a> |
  <a href="adminList">Ver Lista de Cervezas</a> |
  <a href="mostrarUsuario">Ver lista de usuarios</a>

  <div class="table-responsive">
    <table class="table">
      <tr>
        <td>Nombre del estilo</td>
        <td>Descripción</td>
        <td></td>
      </tr>

        {foreach from=$estilos item=estilo}

        <tr>
          <td>{$estilo['nombre_estilo']}</td>
          <td>{$estilo['descripcion']}</td>
          <td>
            <a href="eliminarEstilo/{$estilo['id_estilo']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="updateEstilo/{$estilo['id_estilo']}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
          </td>
        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
