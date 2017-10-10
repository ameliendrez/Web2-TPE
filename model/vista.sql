select
`db_tpe`.`cerveza`.`id_cerveza` AS `id_cerveza`
,`db_tpe`.`cerveza`.`nombre` AS `nombreCerveza`
,`db_tpe`.`estilocerveza`.`nombre` AS `estilo`
,`db_tpe`.`cerveza`.`%alc` AS `porcentajeALC`
,`db_tpe`.`cerveza`.`descripcion` AS `descripcion`
from `db_tpe`.`cerveza`
join `db_tpe`.`estilocerveza`
where (`db_tpe`.`cerveza`.`id_estilo` = `db_tpe`.`estilocerveza`.`id_estilo`)
