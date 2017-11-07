{include file="header.tpl"}
</div>
  </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        {if isset($error)}
          <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <form action="createUser" method="post">
          <div class="form-group">
            <label for="username">Email</label>
            <input type="email" class="form-control" id="username" name="username" placeholder="Email de usuario" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
          </div>
          <div class="form-group">
            <label for="password2">Vuelva a escribir su contraseña</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Contraseña" required>
          </div>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
          </div>
          <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" required>
          </div>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </div>
    </div>
{include file="footer.tpl"}
