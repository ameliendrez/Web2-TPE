select
`webBeer`.`cerveza`.`id_cerveza` AS `id_cerveza`
,`webBeer`.`cerveza`.`nombre` AS `nombreCerveza`
,`webBeer`.`estilocerveza`.`nombre` AS `estilo`
,`webBeer`.`cerveza`.`%alc` AS `porcentajeALC`
,`webBeer`.`cerveza`.`descripcion` AS `descripcion`
from `webBeer`.`cerveza`
join `webBeer`.`estilocerveza`
where (`webBeer`.`cerveza`.`id_estilo` = `webBeer`.`estilocerveza`.`id_estilo`)
