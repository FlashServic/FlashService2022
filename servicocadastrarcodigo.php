<?php
session_start();

//Verifica se o usuário logou.
require 'acessocomum.php';

// Dados do Formulário
$campousuario_id = $_SESSION['id'];
$camposervico_id = $_POST["servico_id"];    
	
//Faz a conexão com o BD.
require 'conexao.php';

//Insere na tabela os valores dos campos
$sql = "INSERT INTO profissional(usuario_id, servico_id) VALUES($campousuario_id, $camposervico_id)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  //header( "refresh:5;url=servicocontrolar.php" );	
  echo "Gravado com sucesso.";
  
include 'log.php';

} else {
  //header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}

//Fecha a conexão.
$conn->close();
 


?>