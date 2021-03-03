<?php

$dados = $_POST;

$dsn = "host=localhost port=5432 dbname=livro user=postgres password="; 
$conn = pg_connect($dsn); 

$result = pg_query($conn, "SELECT max(id) as next FROM pessoa");
$next   = (int) pg_fetch_assoc($result)['next'] +1;

$sql = "INSERT INTO pessoa (id,
                            nome,
                            endereco,
                            bairro,
                            telefone,
                            email,
                            id_cidade)
                   VALUES ( '{$next}',
                            '{$dados['nome']}',
                            '{$dados['endereco']}',
                            '{$dados['bairro']}',
                            '{$dados['telefone']}',
                            '{$dados['email']}',
                            '{$dados['id_cidade']}'
                            )";

$result = pg_query($conn, $sql);

if ($result)
{
    print 'Registro inserido com sucesso';
}
else
{
    print pg_last_error($conn);
}
pg_close($conn);
