<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_tareas.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id_tarea");

 $modelo =
  selectFirst(pdo: Bd::pdo(),  from: tareas,  where: [id_tarea => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Tarea no encontrada.",
   type: "/error/tareanoencontrada.html",
   detail: "No se encontró ninguna tarea con el id $idHtml.",
  );
 }

 devuelveJson([
    "id" => ["value" => $id],
    "titulo_tarea" => ["value" => $modelo[titulo_tarea]],
    "descripcion" => ["value" => $modelo[descripcion]],
    "estado" => ["value" => $modelo[estado]],
    "fecha" => ["value" => $modelo[fecha]],
    "costo" => ["value" => $modelo[costo]],
    "created_at" => ["value" => $modelo[created_at]],
 ]);
});
