<?php

$dados = $_POST; 

if ($dados['id'])
{
    $dsn = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $sql = "UPDATE pessoa SET nome      = '{$dados['nome']}',
                              endereco  = '{$dados['endereco']}',
                              bairro    = '{$dados['bairro']}',
                              telefone  = '{$dados['telefone']}',
                              email     = '{$dados['email']}',
                              id_cidade = '{$dados['id_cidade']}'
                        WHERE id = '{$dados['id']}'";
    
    $result = pg_query($conn, $sql);
    
    if ($result)
    {
        print 'Registro atualizado com sucesso';
    }
    else
    {
        print pg_last_error($conn);
    }
    
    pg_close($conn);
}
