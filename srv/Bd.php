<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:dailyplanner.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS tareas (
      id_tarea INTEGER,
      titulo_tarea TEXT,
      descripcion TEXT,
      estado NUMERIC,
      fecha TEXT,
      costo NUMERIC,
      created_at TEXT,
      CONSTRAINT id_tarea_PK
       PRIMARY KEY(id_tarea),
       constraint title_tarea
       CHECK(LENGTH(titulo_tarea) > 0),
       constraint descrip_tarea
       CHECK(LENGTH(descripcion) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
