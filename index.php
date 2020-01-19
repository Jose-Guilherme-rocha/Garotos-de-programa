<?php
    require_once("../includes/Conectar.php");
    
    //inicia a sessão
    session_start();

    //Login
if (isset($_POST["login"])){

    $usuario = $_POST["usuario"];
    $cria_senha = $_POST["senha"];
    $senha = sha1($cria_senha);

    $login = "SELECT * FROM dados_membros WHERE email = '{$usuario}' and senha = '{$senha}'";
    
    $acesso = mysqli_query($conecta, $login);
    if (!$acesso){
        die("Um erro ocorreu!");
    }

    $informacao = mysqli_fetch_assoc($acesso);

    if(empty($informacao)){
        $mensagem = "Login sem sucesso. :(";
    }else{
        $_SESSION["user"] = $informacao["ID_membro"];
        header("location: ../includes/pagina_aluno.php");
        
    }
    
}

    //Cadastro
    
    // isset serve para testar se o array estar vazio
if (isset($_POST["submeter_cadastro"])){
    $nome =  utf8_decode(isset ($_POST["nome"]) ? $_POST["nome"] : "Sem nome"); //operador ternário
    $sobrenome = utf8_decode(isset($_POST["sobrenome"]) ? $_POST["sobrenome"] : "Sem sobrenome"); //utf8_decode serve para manter os caracteres especiais no DB
    $faculdade = isset ($_POST["faculdade"]) ? $_POST["faculdade"] : "Faculdade não declarada";
    $matricula = $_POST["matricula"];
    $email = $_POST["email"];
    $cria_senha = $_POST["criar_senha"];
    $senha = sha1($cria_senha); //criptografar a senha

//inserindo informação no BD
    $inserir = "INSERT INTO dados_membros(nome,sobrenome,faculdade,matricula,email,senha) VALUES ('$nome','$sobrenome','$faculdade','$matricula','$email','$senha')";
    
    $operacao_inserir = mysqli_query($conecta,$inserir); //$conectar vem do arquivo conectar.php
    if(!$operacao_inserir){
        die("Falha no código: " . mysqli_errno($conecta));
        
        die("Erro no Banco"); //die interrompe a operação acusando um erro
    } else{
        unset($_POST); //limpar o formulário
    }

    if(isset($_POST["fazer_login"])){
        unset($_POST);
    }

}

?>


<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Sistema Integrado da SIEEL</title>
    <link href="http://lwteste.saselusp.com.br/tmp/style_index.css" rel="stylesheet">
</head>
<body>

    <h1>SA-SEL - SIEEL</h1>
    

<?php if(!isset($_POST["cadastrar"])) { ?>
    <div id = "Janela de login" class="fomulario">
        <form action = "index.php" method = "post">
			<h2>Login</h2>
			<input type="email" name="usuario" placeholder="Email" require class="caixa_texto"> </br>
			<input type="password" name="senha" placeholder="Senha" require class="caixa_texto"> </br>
			<input type="submit" value="Login" name="login" class="botao"/> </br>
            <input type="submit" value="Cadastrar" name="cadastrar" class="botao"/> </br>
        </form>
    </div>
<?php } ?>

    <?php if(isset($mensagem)){ ?>
        <p><?php echo $mensagem ?></p>
    <?php } ?>

<?php if(isset($_POST["cadastrar"])) { ?>
    <div id = "Janela de Cadastro">
        <form action="index.php" method="post">

            <h2>Realizar Cadastro</h2>
            <input type="text" id="nome" name="nome" maxlength="100" placeholder="Insira seu nome" class="caixa_texto" require/> <br />
            
            <input type="text" id="sobrenome" name="sobrenome" maxlength="100" placeholder="Insira o seu sobrenome" class="caixa_texto" require /> <br />
        
            <label for="faculdade">Qual é a sua universidade?</label> <br />
            <input type="radio" name="faculdade" value="USP" />USP <br />
            <input type="radio" name="faculdade" value="UFSCar" />UFSCar <br />
            
            <input type="text" id="matricula" name="matricula" class="caixa_texto" maxlength="30" placeholder="Insira o seu número de matrícula" /> <br />
            
            <input type="email" id="email" name="email" class="caixa_texto" placeholder="Insira um email" require /> <br />

            <input type="password" id="criar_senha" name="criar_senha" class="caixa_texto" maxlength="50" placeholder="Crie um senha" require/> <br />

            <input type="submit" id="botao_cadastro" value="Cadastrar" name="submeter_cadastro" class="botao" /> </br>

            <input type="submit" id="fazer_login" value="Já sou cadastrado" name="fazer_login" class="botao"/>

        </form>
    </div>


<?php } ?>


</body>
</html>