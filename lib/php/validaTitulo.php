<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaTitulo(false|string $titulo_tarea)
{

 if ($titulo_tarea === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el título.",
   type: "/error/faltatitulo.html",
   detail: "La solicitud no tiene el valor de título."
  );

 $trimtitulotitulo_tarea = trim($titulo_tarea);

 if ($trimtitulotitulo_tarea === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Título en blanco.",
   type: "/error/tituloenblanco.html",
   detail: "Pon texto en el campo título.",
  );

 return $trimtitulotitulo_tarea;
}
