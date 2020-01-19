<?php
    // Conectando ao servidor 
    $conecta = mysqli_connect("membros_sasel.mysql.dbaas.com.br","membros_sasel","QWERT#","membros_sasel");
//  $conecta = mysqli_connect("servidor","usuario","senha","banco de dados"); 
    
    //Testando a Conexão    
    if(mysqli_connect_errno()){
        die("Erro de conexão com o servidor: " . mysqli_connect_errno());
    }
?>
<!--
    <!doctype html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Conectar</title>
        </head>
        <body>

        </body>
    </html>  
    
-->
<?php
    //Fechando a conexão  colar no final do arquivo que esta na página!
//    mysqli_close($conecta);

?>

