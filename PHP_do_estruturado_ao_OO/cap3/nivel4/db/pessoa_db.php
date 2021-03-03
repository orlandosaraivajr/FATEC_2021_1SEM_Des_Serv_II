<?php
function lista_pessoas()
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $result = pg_query($conn, "SELECT * FROM pessoa ORDER BY id");
    $list = pg_fetch_all($result);
    pg_close($conn);
    return $list;
}

function exclui_pessoa($id)
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $result = pg_query($conn, "DELETE FROM pessoa WHERE id='{$id}'");
    pg_close($conn);
    return $result;
}

function get_pessoa($id)
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $result = pg_query($conn, "SELECT * FROM pessoa WHERE id='{$id}'");
    $pessoa = pg_fetch_assoc($result);
    pg_close($conn);
    return $pessoa;
}

function get_next_pessoa()
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $result = pg_query($conn, "SELECT max(id) as next FROM pessoa");
    $next = (int) pg_fetch_assoc($result)['next'] +1;
    pg_close($conn);
    return $next;
}

function insert_pessoa($pessoa)
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
    $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
                                telefone, email, id_cidade)
                       VALUES ( '{$pessoa['id']}', '{$pessoa['nome']}', '{$pessoa['endereco']}',
                                '{$pessoa['bairro']}', '{$pessoa['telefone']}',
                                '{$pessoa['email']}', '{$pessoa['id_cidade']}'
                                )";
    $result = pg_query($conn, $sql);
    pg_close($conn);
    return $result;
}

function update_pessoa($pessoa)
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
  
    $sql = "UPDATE pessoa SET nome      = '{$pessoa['nome']}',
                              endereco  = '{$pessoa['endereco']}',
                              bairro    = '{$pessoa['bairro']}',
                              telefone  = '{$pessoa['telefone']}',
                              email     = '{$pessoa['email']}',
                              id_cidade = '{$pessoa['id_cidade']}'
                        WHERE id = '{$pessoa['id']}'";
    $result = pg_query($conn, $sql);
    pg_close($conn);
    return $result;
}