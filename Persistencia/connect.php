<?php
class Conexion
{
  private $host = "localhost";
  private $usuario = "infobyte_ceibal"; // Cambia por tu usuario de cPanel
  private $password = "N7TjbaYATMTw6j6"; // La clave que creaste para ese usuario en cPanel
  private $bd = "infobyte_ceibal"; // Nombre exacto de la base de datos en cPanel

  public function conectar()
  {
    $link = mysqli_connect($this->host, $this->usuario, $this->password, $this->bd);

    if (!$link) {
      die("Error al conectar con la base de datos: " . mysqli_connect_error());
    }

    // Asegura codificación UTF-8 para tildes y caracteres especiales
    mysqli_set_charset($link, "utf8mb4");

    return $link;
  }

  public function ejecutarSQL($sql)
  {
    $link = $this->conectar();
    $result = mysqli_query($link, $sql);

    if (!$result) {
      die("Error en la consulta: " . mysqli_error($link));
    }

    return $result;
  }
}
?>
