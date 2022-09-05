<?php
//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL
$sql = "SELECT * FROM agendamento";

//Executa o SQL
$result = $conn->query($sql);

$agendamento=[];

//Existem formas mais simples tipo fetchAll,
//mas depende de versão do PHP
while($row = $result->fetch_assoc()) {
	array_push($agendamento, $row);
}

//Transforma o array em um padrão json
$agendamento = json_encode($agendamento);

//O javascript recebe os dados
//Só pode haver um echo
echo $agendamento;
?>