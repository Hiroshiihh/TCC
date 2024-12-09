
<!DOCTYPE html>
<html>
<head>
    <title>.::Mural::.</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body background="#">

<?php
include('conexao.php');

// Recebe os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

// Exibe os dados recebidos (opcional, para debug)
echo $email;
echo $nome;
echo $mensagem;

// Valida o campo nome, recado e e-mail
if (empty($nome) || empty($email) || empty($mensagem)) {
    echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
    echo "<center><font size='5' color='red'>O campo nome, comentário ou e-mail está vazio. Por favor, preencha corretamente.<br><br>";
    echo "<a href='contact.html'>Voltar</a></center></font>";
} else {
    // Regra para validar o e-mail
    $regra = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
    if (!preg_match($regra, $email)) {
        echo "<center>Digite um endereço de e-mail válido!";
        echo "<br><a href='contact.html'>Voltar</a></center>";
    } else {
        echo "<span style='color:white;'><center>Recado enviado</center><br></span>";

        // Insere os dados no banco de dados usando MySQLi
        $sql = "INSERT INTO usuarios (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
        
        // Verifica se a conexão com o banco foi estabelecida
        if (!$conexao) {
            die("Erro na conexão: " . mysqli_connect_error());
        }

        // Executa a consulta e verifica se foi bem-sucedida
        if (mysqli_query($conexao, $sql)) {
            echo "<br><center>Dados inseridos com sucesso!</center>";
            echo "<br><center><iframe src='exibir.php' width='50%' height='500'></iframe></center>";
            echo "<br><center><a href='index.html'>Voltar</a></center>";
        } else {
            echo "<br><center>Não foi possível inserir os dados: " . mysqli_error($conexao) . "</center>";
        }

        // Fecha a conexão
        mysqli_close($conexao);
    }
}
?>

</body>
</html>