<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Minhas ideias</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">
   <style>
    .content{
      padding-top: 30px;
    }
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cadastroBlog.php">Escrever</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Tabela de posts</h1>
            <span class="subheading"></span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Corpo</th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>    
          <?php
            include_once("./servico/Bd.php");             
            $bd = new Bd();          
            $sql = "select * from blog";          
            
            foreach ($bd->query($sql) as $row) {              
              echo "<tr>";
                echo "<td>". $row['id'] . "</td>";
                echo "<td>" .$row['titulo'] . "</td>";
                echo "<td>" .$row['corpo'] . "</td>";
                echo "<td> <a onclick='Pergunta(".$row['id'].")' href='#' > Excluir</a></td>";
                echo "<td> <a href='alterarBlog.php?id=" .$row['id'] . "' > Alterar</a></td>";
              echo '</tr>';
            }
          ?>
        </tbody>
        <tfoot>
          <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Corpo</th>
            <th></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
      <script>
        function Pergunta(id){
          if (confirm("Deseja realmente excluir o registro ?")) {
            window.location.replace("excluirBlog.php?id="+id);
          } 
        } 
      </script>
    </div>      
  </div>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://www.linkedin.com/in/gabriel-de-souza-calixto/">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://web.facebook.com/gabriel.desouzacalixto">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/GSCalixto">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Trabalho de final de período 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>
  <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
  </script>

</body>

</html>
