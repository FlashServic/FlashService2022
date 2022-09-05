<?php
session_start();
//Verifica se o usuário logou.
if(!isset ($_SESSION['nome']) || !isset ($_SESSION['acesso']))
{
  unset($_SESSION['nome']);
  unset($_SESSION['acesso']);
  header('location:index.html');
  exit;
}

//Cria variáveis com a sessão.
$logado = $_SESSION['nome'];
$acesso = $_SESSION['acesso'];


//Faz a conexão com o BD.
require 'conexao.php';

//Cria o SQL com limites de página ordenado por id
$sql = "SELECT * FROM servico ORDER BY id";

//Executa o SQL
$result = $conn->query($sql);

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

  <title>Layout PF</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="styleprincipal.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/pesquisa.css">
  

</head>

<body>

<header>
    <nav>
     <p>Flash Service</p>
	 
<div class="topnav">
<?php
	//Coloca o menu que está no arquivo
	include 'menu.php';
?>
</div>
 
    </nav>
    
              
    </div>
</header>



  <section class="pacotes">

<h1 id="servicos" class="pacotes-title">Conheça Nossos Serviços</h1>

      <div class="pacotes-cards">
      <div class="card">
          
          <img class="card-image" src="https://img.freepik.com/fotos-gratis/trabalhador-da-construcao-civil-com-capacete-construindo-o-telhado-da-casa_23-2148748846.jpg?size=338&ext=jpg" alt="construção">
          <div class="card-content">
           </i>  <h1>Construção</h1>
           
          </div>
      </div>

      <div class="card">
          
        <img class="card-image" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTJlP5C7pjFEJxfZpmAA0v5m9MvYLSKS2Zsjw&usqp=CAU" alt="faxina">
        <div class="card-content">
         </i>  <h1>Serviços Gerais</h1>
         
        </div>
    </div>

    <div class="card">
          
        <img class="card-image" src="https://blog.lg.com.br/wp-content/uploads/2019/11/tecnologia-e-ser-humano-1.png" alt="tecnologia">
        <div class="card-content">
         </i>  <h1>Tecnologia</h1>
         
        </div>
    </div>


<div class="card">
          
    <img class="card-image" src="https://blog.uceff.edu.br/wp-content/uploads/2020/06/ucefffaculdades_uceff_image_530.jpeg" alt="estética">
    <div class="card-content">
     </i>  <h1>Estética</h1>
     
    </div>
</div>


<div class="card">
          
    <img class="card-image" src="https://www.pedrosoerocha.com.br/images/otm/jardinagem-e-paisagismo.jpg" alt="jardinagem">
    <div class="card-content">
     </i>  <h1>Jardinagem</h1>
     
    </div>
</div>


<div class="card">
          
    <img class="card-image" src="https://www.infoescola.com/wp-content/uploads/2017/05/eletricista_567307042.jpg">
    <div class="card-content">
     </i>  <h1>Eletricista</h1>
     
    </div>
</div>
</div>
<div id="divBusca">
<form action="servicocadastrarcodigo.php" method="post">
 <select name='servico_id' required>
	<option value=""></option>
<?php
	 if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {			
			echo "<option value=" . $row["id"] . ">" . $row["servico"] . "</option>";
		}
	}
?>	

</select>
	<input type="submit" value="Pesquisar">
	</form>
	</div>
  <br>
  <br>
  <br>
  <br>
  


  </section>

  <section class="funciona">
      <h1 class="funciona-title">Como Funciona?</h1>
      <div class="funciona-cards">
    
        <div class="card">
            <br>
            <div class="card-content">
            <h3>Para Profissional</h3>
           <p>O cliente acessa, pesquisa, encontra seu anúncio e conversa com você.

              Nós não nos envolvemos em nenhuma negociação ou orçamento.
              
              Nós simplesmente mostramos você, prestador de serviços, para o cliente que possui

              uma necessidade. </p>
        </div>
</div>

        <div class="card">
            <div class="card-content">
           <h3> Clientes e Profissionais</h3>
           <p>Viemos para aproximar clientes e profissionais de forma simples, rápida e colaborativa!

            Faça parte dessa parceria você também</p>

<br>
<br>
        </div>
</div>


        <div class="card">
            <div class="card-content">
            
            <br>
            <h3>Para Cliente</h3>
           <p>Encontre pedreiro, eletricista, costureira, encanador, passeador de cães, cuidador, faxineira ou diarista e muito mais.

            Você vai encontrar vários prestadores de serviços que podem te atender e estão próximos de você.
            
            Clique no whatsapp de quantos profissionais quiser e converse diretamente com eles.
        </div>
    </div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
   <div class="imgprestacao">
       <img src="https://gdr.adv.br/wp-content/uploads/Detalhes-obrigat%C3%B3rios-em-um-contrato-de-presta%C3%A7%C3%A3o-de-servi%C3%A7os.png" alt="prestacao">
   </div>
 
 

 
  </section>
 
<div class="footer-dark">
        <footer>
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-6 col-md-3 item">
                        
                    <div class="col item social"><a href="https://pt-br.facebook.com/"><i class="icon ion-social-facebook"></i></a><a href="https://twitter.com"><i class="icon ion-social-twitter"></i></a><a href="https://www.snapchat.com/pt-BR"><i class="icon ion-social-snapchat"></i></a><a href="https://www.instagram.com/"><i class="icon ion-social-instagram"></i></a></div>
                </div>
                <p class="copyright">© 2022 - Todos os direitos reservados | FLASH SERVICES | CNPJ : 27.227.433/0001-96</p>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
 
</body>





</body>
</html>


