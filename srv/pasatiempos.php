<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_tareas.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: tareas,  orderBy: titulo_tarea);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[id_tarea]);
  $id = htmlentities($encodeId);
  $titulo = htmlentities($modelo[titulo_tarea]);
  $descripcion = htmlentities($modelo[descripcion]);
  $estado = htmlentities($modelo[estado]);
  $fecha = htmlentities($modelo[dfecha]);
  $costo = htmlentities($modelo[costo]);
  $created_at = htmlentities($modelo[created_at]);
  $render .=
   "<li>
     <p>
      <a href='modifica.html?id=$id'>$titulo</a>
     </p>
    </li>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
