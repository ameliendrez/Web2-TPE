{include file="header.tpl"}

</div>
  </div>

  <a href="mostrarEstilo">Ver Lista de Estilos</a> |
  <a href="adminList">Ver Lista de Cervezas</a>

  <div class="table-responsive">
    <table class="table">
      <tr>
        <td>Username</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>¿Es admin?</td>
        <td></td>
      </tr>

        {foreach from=$usuarios item=usuario}

        <tr>
          <td>{$usuario['usuario']}</td>
          <td>{$usuario['nombre']}</td>
          <td>{$usuario['apellido']}</td>
          <td>{$usuario['esAdmin']}</td>
          <td>
            <a href="eliminarUsuario/{$usuario['id_usuario']}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            <a href="cambiarPermiso/{$usuario['id_usuario']}/{$usuario['esAdmin']}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
          </td>
        </tr>

      {/foreach}

    </table>
  </div>
{include file="footer.tpl"}
