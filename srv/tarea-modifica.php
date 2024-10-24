<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaTitulo.php";
require_once __DIR__ . "/../lib/php/validaCosto.php";
require_once __DIR__ . "/../lib/php/validaFecha.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/validaEstado.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_tareas.php";

ejecutaServicio(function () {

  $id = recuperaIdEntero("id");
  $titulo_tarea = recuperaTexto("titulo_tarea");
  $titulo_tarea = validaTitulo($titulo_tarea);

  $descripcion = recuperaTexto("descripcion");
  $descripcion = validaDescripcion($descripcion);

  $estado = recuperaTexto("estado");
  $estado = validaEstado($estado);

  $fecha = recuperaTexto("fecha");
  $fecha = validaFecha($fecha);   

  $costo = recuperaTexto("costo");
  $costo = validaCosto($costo);

 update(
  pdo: Bd::pdo(),
  table: tareas,
  set: [
    titulo_tarea => $titulo_tarea,
  descripcion => $descripcion,
  estado => $estado,
  fecha => $fecha,
  costo => $costo,
  created_at => $created_at,
],
  where: [id_tarea => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "titulo_tarea" => ["value" => $nombre],
  "descripcion" => ["value" => $titulo_tarea],
  "estado" => ["value" => $estado],
  "fecha" => ["value" => $fecha],
  "costo" => ["value" => $costo],
  "created_at" => ["value" => $created_at]
 ]);
});
