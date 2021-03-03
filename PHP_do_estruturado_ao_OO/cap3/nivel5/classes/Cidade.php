<?php
class Cidade
{
  public static function all()
  {
    $conn = new PDO("pgsql:dbname=livro;user=postgres;host=127.0.0.1");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $result = $conn->query("SELECT * FROM cidade");
    return $result->fetchall();
  }
}