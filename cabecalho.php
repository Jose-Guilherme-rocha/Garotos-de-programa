<div id = "saudacao">    
    <?php 

        if (isset($_SESSION["user"])){
            $saudacao = "SELECT nome FROM dados_membros WHERE ID_membro = {$_SESSION["user"]}";

            $login_saudacao = mysqli_query($conecta, $saudacao);
            if (!isset($login_saudacao)){
                die ("Falha no Banco de dados");
            }
            $dados_user = mysqli_fetch_assoc($login_saudacao);
            $nome = $dados_user["nome"];

    ?>   
        <h4> Seja bem-vindo <?php echo $nome ?>, ainda estamos em desenvolvimento</h4>
        
    <?php
        }
    ?>
    <h4>Caso queria sair da sua conta, basta entrar no link ao lado <a href="logout.php">Logout</a></h4>
    
</div>
