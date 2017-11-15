
<!-- <div class="estrellasContenedor">
	<h1>Calificacion : </h1>
	<a class="estrellas" href="" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
	<a class="estrellas" href="" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
	<a class="estrellas" href="" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
	<a class="estrellas" href="" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
	<a class="estrellas" href="" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
</div> -->
<div id="rateYo"></div>
<form id="formularioComentar" action="api/crearComentario" method="post" data-idusuario={$usuario}>
  <div class="form-group">
    <label class="col-md-12" for="comentario">Comentario</label>
    <textarea class="texto" id="comentario" name="comentario" rows="4" cols="170"></textarea>
  </div>
  <button id="crearComentario" type="submit" class="btn btn-default">Publicar</button>
</form>
