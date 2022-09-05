<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>
<%@ page import="dao.ConexaoDao, dao.UsuarioDao, dao.ServicoDao, classes.Usuario, classes.Servico, java.util.*"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="./css/tabela.css">
        <link href="css/grafico.css" rel="stylesheet" type="text/css"/>
        <link href="css/menu.css" rel="stylesheet" type="text/css"/>
        <link href="css/padrao.css" rel="stylesheet" type="text/css"/>
        <script src="./scripts/filtrar.js"></script>
        <title>Lista de Usuarios</title>
    </head>
    
    <body>        
        
            <div class="topnav">
           
            </div>
            <div class="content">        
            <%                
                List<Usuario> list = UsuarioDao.getUsuarios();
                request.setAttribute("list", list);  

                int[] valores = UsuarioDao.getRelatorioUsuarios();
                request.setAttribute("valores", valores);                
            %>
            
            <h1>Lista de Usuarios</h1>
            
            <input type="text" id="filtrarnomes" onkeyup="filtrar('filtrarnomes', 1)" placeholder="Busca de nomes">
            <input type="text" id="filtraremails" onkeyup="filtrar('filtraremails', 2)" placeholder="Busca de emails">
    
            
           <table id="myTable">
            <tr><th>Id</th><th>Nome</th><th colspan="1">Email</td><th colspan="3">Data_Acesso</td><tr>
                <c:forEach items="${list}" var="usuario">
                <tr>
                    <td>${usuario.getId()}</td>
                    <td>${usuario.getNome()}</td>
                    <td>${usuario.getEmail()}</td>
                    <td>${usuario.getTelefone()}</td>
                    <td>${usuario.getAcesso()}</td>
                    <td>${usuario.getData_Acesso()}</td>
                    </tr>
                </c:forEach>
            </table>                       
 
    </div>
         <h1>Relatório de Usuários</h1>
                            
               <div class="grafico">
               <canvas id="Usuários Cadastrados"></canvas>
               <p>Distribuição de Cadastro:</p>
               <p>Março: 2</p>
               <p>Abril: 2</p>
               <p>Maio: 3</p>
               <p>Junho: 2</p>
               <p>Julho: 4</p>
            </div>
         
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js
            "></script>
    
    <script type="text/javascript">
        var ctx = document.getElementById("Usuários Cadastrados");
        var valores = [2, 2, 3, 2, 4 ];
        var tipos = ["Março", "Abril", "Maio", "Junho", "Julho"];

        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "Usuarios",
                data: valores,
                backgroundColor: [
                  "rgba(70, 130, 180, 0.2)",
                  "rgba(188, 143, 143, 0.2)",
		  "rgba(147, 112, 219, 0.2)",
		  "rgba(205, 16, 118, 0.2)",
                  "rgba(238, 232, 170, 0.2)",
                ]
              }
            ]
          }
        }); 
    </script>   
  
    <div class="footer">
       
    </div>
    
    </body>
</html>