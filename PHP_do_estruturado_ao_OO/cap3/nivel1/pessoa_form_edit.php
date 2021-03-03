<html>
  <head>
    <meta charset="utf-8">
    <title> Cadastro de pessoa </title>
    <link href="css/form.css" rel="stylesheet" type="text/css" media="screen" />
  </head>
  <?php
  if (!empty($_GET['id'])) {
      $dsn       = "host=localhost port=5432 dbname=livro user=postgres password="; 
      $conn      = pg_connect($dsn); 
      $id        = (int) $_GET['id'];
      $result    = pg_query($conn, "SELECT * FROM pessoa WHERE id='{$id}'");
      $row       = pg_fetch_assoc($result);
    
      $id        = $row['id'];
      $nome      = $row['nome'];
      $endereco  = $row['endereco'];
      $bairro    = $row['bairro'];
      $telefone  = $row['telefone'];
      $email     = $row['email'];
      $id_cidade = $row['id_cidade'];
  }
  ?>
  <body>
    <form enctype="multipart/form-data" method="post" action="pessoa_save_update.php">
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