<?php
function lista_combo_cidades($id = null)
{
    $output = '';
    
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password=";
    $conn = pg_connect($dsn); 
    $query = 'SELECT id, nome FROM cidade';
    $result = pg_query($conn, $query);
    if ($result) { 
      while ($row = pg_fetch_assoc($result)) {
        $check = ($row['id'] == $id) ? 'selected=1' : ''; 
        $output .= "<option $check value='{$row['id']}'> {$row['nome']} </option>\n";
      }
    }
    pg_close($conn);
    
    return $output;
}