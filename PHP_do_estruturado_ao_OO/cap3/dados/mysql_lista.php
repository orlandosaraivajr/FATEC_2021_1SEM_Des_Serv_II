<?php 
// abre conexão com o MySQL 
$conn = mysqli_connect('127.0.0.1', 'root', 'mysql', 'livro');  

// define a consulta que será realizada 
$query = 'SELECT codigo, nome FROM famosos'; 

// envia consulta ao banco de dados 
$result = mysqli_query($conn, $query); 

if ($result) { 
	// percorre resultados da pesquisa 
	while ($row = mysqli_fetch_assoc($result)) { 
	    echo $row['codigo'] . ' - ' . $row['nome'] . "<br>\n"; 
	} 
} 
mysqli_close($conn); // fecha a conexão