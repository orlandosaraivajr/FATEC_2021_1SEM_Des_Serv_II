<?php
class Cidade
{
  private static $conn;
  
  public static function getConnection()
  {
    if (empty(self::$conn))
    {
  		$conexao = parse_ini_file( 'config/livro.ini');
  		$host = $conexao['host'];
  		$name = $conexao['name'];
  		$user = $conexao['user'];
  		$pass = $conexao['pass'];
  		
      self::$conn = new PDO("pgsql:dbname={$name};user={$user};password={$pass};host={$host}");
      self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    return self::$conn;
  }
  
  public static function all()
  {
    $conn = self::getConnection();
    
    $result = $conn->query("SELECT * FROM cidade");
    return $result->fetchall();
  }
}