{include file="header.tpl"}

</div>
  </div>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">

        <form action="verificarUsuario" method="post">
          <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario">
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="contraseña">
          </div>

          {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
          {/if}

          <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
