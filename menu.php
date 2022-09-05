<ul>
  
       
<?php 
//Menu só aparece para os administradores.
if($_SESSION['acesso']=="Admin"){
    echo "<li class='dropdown'><a href='javascript:void(0)' class='dropbtn'>Administração do Site</a>";
	echo "<div class='dropdown-content'><a href='usuarioscontrolar.php?pag=1'>Controlar Usuários</a><a href='profissionalcontrolar.php'>Profissionais</a><a href='usuariocadastrartela.php'>Cadastrar Usuário</a><a href='index.jsp'>Gráfico de Usuários</a><a href='listadeagendamentos.php'>Agendamentos marcados</a></div></li>";
}  
?>
  <li class="dropdown" style="float:right">
    <a href="javascript:void(0)" class="dropbtn"> <?php echo $logado;?></a>
    <div class="dropdown-content">
       <a href="minhaarea.php">Minha Área</a>
      <a href="cadastrarservico.php">Serviços</a> 
	  <a href="card.html">Nossos Serviços</a>
	  <a href="agendascontrolar.html">agendamento</a>
      <a href="deslogar.php">Deslogar</a>
    </div>
  </li>
</ul>