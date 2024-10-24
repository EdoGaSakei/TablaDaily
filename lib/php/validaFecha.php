<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaFecha(false|String $fecha)
{

 if ($fecha === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta la fecha.",
   type: "/error/faltafecha.html",
   detail: "La solicitud no contiene la fecha."
  );

 $trimFecha = trim($fecha);

 if ($trimFecha === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Fecha en blanco.",
   type: "/error/fechaenblanco.html",
   detail: "Coloca un valor en el campo fecha.",
  );

 return $trimFecha;
}