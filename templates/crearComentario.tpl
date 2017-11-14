<form id="formularioComentar" action="api/crearComentario" method="post" data-idusuario={$usuario}>
  <div class="form-group">
    <label class="col-md-12" for="comentario">Comentario</label>
    <textarea class="texto" id="comentario" name="comentario" rows="4" cols="170"></textarea>
  </div>
  <button id="crearComentario" type="submit" class="btn btn-default">Publicar</button>
</form>
