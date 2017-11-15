
<h6>Calificacion : </h6>

<div class="ratings">

    <input type="radio" name="star" id="rating" value="1"/>
    <input type="radio" name="star" id="rating" value="2"/>
    <input type="radio" name="star" id="rating" value="3"/>
    <input type="radio" name="star" id="rating" value="4"/>
    <input type="radio" name="star" id="rating" value="5"/>

</div>
<form id="formularioComentar" action="api/crearComentario" method="post" data-idusuario={$usuario}>
  <div class="form-group">
    <label class="col-md-12" for="comentario">Comentario:</label>
    <textarea class="texto" id="comentario" name="comentario" rows="4" cols="170"></textarea>
  </div>
  <!-- <div class="g-recaptcha" data-sitekey="6Ley3TgUAAAAAJVNTddvcWu9-NvOu5GdQ9_kYWQb" data-theme="dark"></div> -->
  <button id="crearComentario" type="submit" class="btn btn-default">Publicar</button>
</form>
