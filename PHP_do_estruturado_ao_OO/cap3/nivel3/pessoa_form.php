<?php
if (!empty($_REQUEST['action']))
{
    $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
    $conn = pg_connect($dsn);
  
    if ($_REQUEST['action'] == 'edit')
    { 
        $id     = (int) $_GET['id'];
        $result = pg_query($conn, "SELECT * FROM pessoa WHERE id='{$id}'");
        $pessoa = pg_fetch_assoc($result);
    }
    else if ($_REQUEST['action'] == 'save')
    {
        $pessoa = $_POST;
        if (empty($_POST['id']))
        {
            $result = pg_query($conn, "SELECT max(id) as next FROM pessoa");
            $next   = (int) pg_fetch_assoc($result)['next'] +1;
              
            $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
                                        telefone, email, id_cidade)
                               VALUES ( '{$next}', '{$pessoa['nome']}', '{$pessoa['endereco']}',
                                        '{$pessoa['bairro']}', '{$pessoa['telefone']}',
                                        '{$pessoa['email']}', '{$pessoa['id_cidade']}'
                                        )";
            $result = pg_query($conn, $sql);
        }
        else
        {
            $sql = "UPDATE pessoa SET nome      = '{$pessoa['nome']}',
                                      endereco  = '{$pessoa['endereco']}',
                                      bairro    = '{$pessoa['bairro']}',
                                      telefone  = '{$pessoa['telefone']}',
                                      email     = '{$pessoa['email']}',
                                      id_cidade = '{$pessoa['id_cidade']}'
                                WHERE id = '{$pessoa['id']}'";
            $result = pg_query($conn, $sql);
        }
        print ($result) ? 'Registro salvo com sucesso' : pg_last_error($conn);
        pg_close($conn);
    }
}
else
{
    $pessoa = [];
    $pessoa['id']        = '';
    $pessoa['nome']      = '';
    $pessoa['endereco']  = '';
    $pessoa['bairro']    = '';
    $pessoa['telefone']  = '';
    $pessoa['email']     = '';
    $pessoa['id_cidade'] = '';
}

require_once 'lista_combo_cidades.php';

$form = file_get_contents('html/form.html');
$form = str_replace('{id}',        $pessoa['id'],        $form);
$form = str_replace('{nome}',      $pessoa['nome'],      $form);
$form = str_replace('{endereco}',  $pessoa['endereco'],  $form);
$form = str_replace('{bairro}',    $pessoa['bairro'],    $form);
$form = str_replace('{telefone}',  $pessoa['telefone'],  $form);
$form = str_replace('{email}',     $pessoa['email'],     $form);
$form = str_replace('{id_cidade}', $pessoa['id_cidade'], $form);
$form = str_replace('{cidades}',   lista_combo_cidades( $pessoa['id_cidade'] ), $form);
print $form;
