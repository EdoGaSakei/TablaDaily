<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaTitulo.php";
require_once __DIR__ . "/../lib/php/validaCosto.php";
require_once __DIR__ . "/../lib/php/validaFecha.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/validaEstado.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_tareas.php";

ejecutaServicio(function () {

    $titulo_tarea = recuperaTexto("titulo_tarea");
    $titulo_tarea = validaTitulo($titulo_tarea);

    $descripcion = recuperaTexto("descripcion");
    /*$descripcion = validaDescripcion($descripcion);*/

    $estado = recuperaTexto("estado");
    $estado = validaEstado($estado);

    $fecha = recuperaTexto("fecha");
    $fecha = validaFecha($fecha);   

    $costo = recuperaTexto("costo");
    $costo = validaCosto($costo);

    $created_at = time();

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: tareas, values: [
      titulo_tarea => $titulo_tarea,
      descripcion => $descripcion,
      estado => $estado,
      fecha => $fecha,
      costo => $costo,
      created_at => $created_at,
 ]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/tarea.php?id=$encodeId", [
  "id" => ["value" => $id],
  "titulo_tarea" => ["value" => $nombre],
  "descripcion" => ["value" => $titulo_tarea],
  "estado" => ["value" => $estado],
  "fecha" => ["value" => $fecha],
  "costo" => ["value" => $costo],
  "created_at" => ["value" => $created_at]
 ]);
});
