<?php

require_once("Conectar.php");
    
 //inicia a sessão
session_start();

//teste de login
    if(!isset($_SESSION["user"])){
      header("location: public_html/index.php");
    }
//fim do teste de login

    //Inicializando o carrinho vazio
    if(!isset($_SESSION['carrinho'])){ 
        $_SESSION['carrinho'] = array(); 
    }
   
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Garotos de programa</title>
    <link href="http://lwteste.saselusp.com.br/tmp/pagina_aluno_style.css" rel="stylesheet">
</head>

<body>

    <header>
        <?php require_once("cabecalho.php"); ?>
    </header>
    <h3 style="margin-top: 5%;">Conheça os outros membros da <a href="http://www.saselusp.com.br/" class="sasel">SA-SEL</a> e <a href="http://www.sieel.com.br/" class="sieel">SIEEL</a>:</h3>
   
    <?php
    //consulta ao banco de dados
    $membros = "SELECT * FROM dados_membros"; // * significa "todos", neste caso, todas as colunas da tabela

    $resultado = mysqli_query($conecta, $membros);
    if(!$resultado){
        die("Falha na consulta do banco");
    }

?>

<?php 
   while($linha = mysqli_fetch_assoc($resultado)){ 
?>
    <ul class="membros">
        <li><b>Nome:</b>      <?php echo $linha["nome"] ?></li>
        <li><b>Sobrenome:</b> <?php echo $linha["sobrenome"] ?></li>
        <li><b>Faculdade:</b> <?php echo $linha["faculdade"] ?></li>
        <li><b>Matricula:</b> <?php echo $linha["matricula"] ?></li>
        
    </ul>
<?php
   }
 ?>




</body>
</html>