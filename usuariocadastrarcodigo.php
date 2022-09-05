<?php
session_start();
//Só administrador pode acessar o programa.


// Dados do Formulário
$camponome = $_POST["nome"];
$campoemail = $_POST["email"];
$campotelefone = $_POST["telefone"];
$campodata = date("d/m/Y");
$campostatus = "'Ativo'";




//O EasyPHP não tem password_hash, por isso deixei as duas opções

$camposenha = password_hash($_POST["senha"], PASSWORD_BCRYPT);

//$camposenha = $_POST["senha"];       

	
//Faz a conexão com o BD.
require 'conexao.php';

//Verifica email duplicado e retorna erro.
$sql = "SELECT * FROM usuario WHERE email='$campoemail'";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
  echo "<script>alert('E-mail já existe!)</script>";
  header('refresh:3;url=usuariocadastrarform.html');
	exit;	
}

//Insere na tabela os valores dos campos
$sql = "INSERT INTO usuario(nome, email, senha, telefone, acesso, data_acesso, status) VALUES('$camponome', '$campoemail', '$camposenha', '$campotelefone', 'Comum', '$campodata', $campostatus)";

//Executa o SQL e faz tratamento de erros
if ($conn->query($sql) === TRUE) {
  header( "refresh:5;url=login.html" );	
  
  
  

} else {
 //header( "refresh:5;url=principal.php" );	
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>