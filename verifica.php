<?php
session_start();

include_once("./servico/Bd.php");
                        
$bd = new Bd();
                        
$login = $_POST['login'];
$senha= $_POST['senha'];

$sql = "select * from `usuario` where login = '$login' and senha = '$senha'";
$linhas = 0;
$html="";
foreach ($bd->query($sql) as $row) {
    $linhas += count($row);
    if($row['login']== "admin" || $row['sena'] == "1234"){
        $_SESSION["autenticacao"]=true;

        $html ="
    <!doctype>
    <html>
        <head> <title> Página de verificação </title></head>
        <body>
    
           <script>
    window.location.replace('https://fungiform-diodes.000webhostapp.com/ideias/tabela.php');
           </script>
      
        </body>
    </html>
    
    ";
    } 
}

if ($linhas == 0){
    session_destroy();
    $html ='
    <!doctype>
    <html>
        <head> <title> Página de verificação </title></head>
        <body>
            <h1>Login não aprovado</h1>
            <a class="nav-link" href="login.php">Login</a>
        </body>
    </html>
    ';
}

echo $html;
?>