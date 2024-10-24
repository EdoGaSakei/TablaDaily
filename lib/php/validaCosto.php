<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaCosto(false|string $costo)
{

 if ($costo === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el costo.",
   type: "/error/faltacosto.html",
   detail: "La solicitud no tiene el valor de Costo."
  );

 $trimCosto = trim($costo);

 if ($trimCosto === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Costo en blanco.",
   type: "/error/costoenblanco.html",
   detail: "Pon un valor en el campo costo.",
  );

 return $trimCosto;
}
