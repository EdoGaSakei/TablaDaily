<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaEstado(false|String $estado)
{

 if ($estado === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta la estado.",
   type: "/error/faltaestado.html",
   detail: "La solicitud no contiene la estado."
  );

 $trimEstado = trim($estado);

 if ($trimEstado === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Estado en blanco.",
   type: "/error/estadoenblanco.html",
   detail: "Selecciona un valor en el campo estado.",
  );

 return $trimEstado;
}