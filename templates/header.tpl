<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>{{$titulo}}</title>
  <base href="{{$base_sitio}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/rating.css">
  <link rel="stylesheet" href="css/webBeer.css">
</head>

<body>

  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="col-md-12">
        <h1>WEB BEER -
          <small>LA MEJOR CERVEZA ARTEZANAL DE TANDIL
            <a href="log{{$session}}"><span class="glyphicon glyphicon-log-{{$session}}" id="session" val="{{$session}}" aria-hidden="true"></span></a>
            {if {$userAdmin} eq 'esAdmin'}
            <a id="admin" val="{$userAdmin}" href="adminList">Admin</a>
            {/if}
          </small>
        </h1>
      </div>
