<html>
    <head>
        <meta charset="utf-8">
        <title> Cadastro de pessoa </title>
        <link href="css/form.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
  
    <?php
    $id = $nome = $endereco = $bairro = $telefone = $email = $id_cidade = '';
  
    if (!empty($_REQUEST['action']))
    {
      $dsn  = "host=localhost port=5432 dbname=livro user=postgres password="; 
      $conn = pg_connect($dsn);
    
      if ($_REQUEST['action'] == 'edit')
      { 
          $id        = (int) $_GET['id'];
          $result    = pg_query($conn, "SELECT * FROM pessoa WHERE id='{$id}'");
          if ($row   = pg_fetch_assoc($result))
          {
              $id        = $row['id'];
              $nome      = $row['nome'];
              $endereco  = $row['endereco'];
              $bairro    = $row['bairro'];
              $telefone  = $row['telefone'];
              $email     = $row['email'];
              $id_cidade = $row['id_cidade'];
          }
      }
      else if ($_REQUEST['action'] == 'save')
      {
          $id        = $_POST['id'];
          $nome      = $_POST['nome'];
          $endereco  = $_POST['endereco'];
          $bairro    = $_POST['bairro'];
          $telefone  = $_POST['telefone'];
          $email     = $_POST['email'];
          $id_cidade = $_POST['id_cidade'];
          
          if (empty($_POST['id']))
          {
              $result = pg_query($conn, "SELECT max(id) as next FROM pessoa");
              $next   = (int) pg_fetch_assoc($result)['next'] +1;
            
              $sql = "INSERT INTO pessoa (id, nome, endereco, bairro,
                                          telefone, email, id_cidade)
                                 VALUES ( '{$next}', '{$nome}', '{$endereco}', '{$bairro}',
                                          '{$telefone}', '{$email}', '{$id_cidade}'
                                          )";
              $result = pg_query($conn, $sql);
          }
          else
          {
              $sql = "UPDATE pessoa SET nome      = '{$nome}',
                                        endereco  = '{$endereco}',
                                        bairro    = '{$bairro}',
                                        telefone  = '{$telefone}',
                                        email     = '{$email}',
                                        id_cidade = '{$id_cidade}'
                                  WHERE id = '{$id}'";
              $result = pg_query($conn, $sql);
          }
          
          print ($result) ? 'Registro salvo com sucesso' : pg_last_error($conn);
          pg_close($conn);
        }
  }
  ?>
  <body>
    <form enctype="multipart/form-data" method="post" action="pessoa_form.php?action=save">
      <label>Código</label>
      <input name="id" readonly="1" type="text" style="width: 30%" value="<?=$id?>">
      
      <label>Nome</label>
      <input name="nome" type="text" style="width: 50%" value="<?=$nome?>">
      
      <label>Endereço</label>
      <input name="endereco" type="text" style="width: 50%" value="<?=$endereco?>">
      
      <label>Bairro</label>
      <input name="bairro" type="text" style="width: 25%" value="<?=$bairro?>">
      
      <label>Telefone</label>
      <input name="telefone" type="text" style="width: 25%" value="<?=$telefone?>">
      
      <label>Email</label>
      <input name="email" type="text" style="width: 25%" value="<?=$email?>">
      
      <label>Cidade</label>
      <select name="id_cidade" style="width: 25%">
      <?php
      require_once 'lista_combo_cidades.php';
      print lista_combo_cidades( $id_cidade );
      ?>
      </select>
      <input type="submit">
    </form>
  </body>
</html>