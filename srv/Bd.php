<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS tareas (
      id_tarea INTEGER,
      titulo_tarea VARCHAR2 (255),
      descripcion VARCHAR2 (255),
      estado NUMBER,
      fecha DATE,
      costo NUMBER,
      created_at DATE,
      CONSTRAINT TAR_PK
       PRIMARY KEY(id_tarea),
      CONSTRAINT titulo_tarea_nv
       CHECK(LENGTH(titulo_tarea) > 0),
      CONSTRAINT descripcion_nv
       CHECK(LENGTH(descripcion) > 0),
      CONSTRAINT estado_nv
       CHECK((estado) > 0),
      CONSTRAINT costo_nv
       CHECK((costo) > 0),
     )"
   );
  }

  return self::$pdo;
 }
}
