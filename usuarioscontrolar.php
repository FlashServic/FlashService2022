<?php
session_start();

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];

//Verifica o acesso.
//require 'acessoadm.php';

//Faz a conexão com o BD.
require 'conexao.php';

//Lê a página que será exibida
$id = $_GET["pag"];

//Quantidade de registros a serem exibidos
$total = 5;

//Indica o registro limite para paginação
if($id!=1){
    $id = $id -1;
    $id = $id * $total + 1;
}

$id--;

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM usuario ORDER BY id LIMIT $id, $total";

//Conta a quantidade total de registros
$sql1 = "SELECT count(*) as contagem FROM usuario";

//Executa o SQL
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

//Recupera o resultado da contagem
$row1 = $result1->fetch_assoc();
$contagem = $row1["contagem"];

if($contagem%$total==0){
    $contagem=$contagem/$total;
}else{
    $contagem=$contagem/$total + 1;    
}

	//Se a consulta tiver resultados
	 if ($result->num_rows > 0) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Tela Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/tabela.css">
<link rel="stylesheet" href="./css/menu.css">
<link rel="stylesheet" href="./css/padrao.css">
</head>
<body>

<div class="topnav">
<?php
//Coloca o menu que está no arquivo
include 'menu.php';
?>
</div>

<div class="content">


			<h1>Lista de Usuários</h1>
			<table>
<tr><th>Id</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Acesso</th><th colspan="3">Ações</td></tr>
				
	<?php
	  while($row = $result->fetch_assoc()) {

	          echo "<tr>";

	      
	      
		echo "<td>" . $row["id"] . "</td>
		<td>" . $row["nome"] . "</td>
		<td>" . $row["email"] . "</td>
		<td>" . $row["telefone"] . "</td>
		<td>" . $row["acesso"] . "</td>";
		echo "<td><a href='usuarioeditarform.php?id=" . $row["id"] . "'><img src='./imagens/editar1.png' alt='Editar Usuário'></a></td>
		<td><a href='usuariobloquear.php?id=" . $row["id"] .  "&status=" . $row["status"] .  "'><img src='./imagens/bloquear1.png' alt='Bloquear Usuário'></a></td>
		<td><a href='usuarioexcluir.php?id=" . $row["id"] . "'><img src='./imagens/excluir1.png' alt='Excluir Usuário'></a></td>
		</tr>";
	  }
	?>
				
			</table>
</div>
<div class="pagination">
    <?php for($i=1; $i <= $contagem; $i++) {
            echo "<a href='usuarioscontrolar.php?pag=1$i'></a>";
    } 
	?>   
</div>  
            <a href="usuariocadastrartela.php"><img src="./imagens/incluir1.png" alt="Incluir Usuário"></a>
    </div>
<div class="footer">
  <p>Projeto Final</p>
</div>

</body>
</html>
<?php
	//Se a consulta não tiver resultados  			
	} else {
		echo "<h1>Nenhum resultado foi encontrado.</h1>";
	}
	
//Fecha a conexão.	
	$conn->close();
	
//Se o usuário não usou o formulário

?> 