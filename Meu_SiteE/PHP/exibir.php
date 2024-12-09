<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <title>.::Comentários::.</title>
    <style type="text/css">
        /* Definindo o estilo global da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Estilo para os comentários (nome e email) */
        ._nome {
            width: 560px;
            height: auto;
            border-radius: 15px; /* Bordas mais arredondadas */
            border: 2px solid #1f1f1f; /* Cor da borda */
            background-color: #7335b7; /* Cor de fundo */
            color: #fff;
            font-size: 18px;
            padding: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para um efeito de profundidade */
            transition: all 0.3s ease; /* Efeito de transição para interação */
        }

        ._nome:hover {
            background-color: #f8842b; /* Cor de fundo muda ao passar o mouse */
            border-color: #f8842b; /* Cor da borda muda ao passar o mouse */
        }

        /* Estilo para a mensagem */
        ._mensagem {
            width: 600px;
            padding: 20px;
            background-color: #fff;
            border: 2px solid #1f1f1f; /* Cor da borda */
            border-radius: 15px; /* Bordas arredondadas */
            color: #333;
            font-size: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para a mensagem */
            margin-bottom: 30px; 
            transition: all 0.3s ease; /* Efeito de transição */
        }

        ._mensagem:hover {
            border-color: #f8842b; /* Cor da borda muda ao passar o mouse */
        }

        /* Estilo de alinhamento centralizado para os elementos */
        .comentarios-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="comentarios-container">
</head>
<body>
<?php
// Faz a conexão com o banco de dados
include('conexao.php');

// Consulta SQL para selecionar os dados da tabela
$sql = "SELECT * FROM usuarios";
$consulta = mysqli_query($conexao, $sql);

// Verifica se a consulta foi bem-sucedida
if ($consulta) {
    // Loop para exibir os resultados
    while ($linha = mysqli_fetch_assoc($consulta)) {
        $email = $linha['email'];
        $nome = $linha['nome'];
        $mensagem = $linha['mensagem'];

        // Exibe os comentários
        echo "<div class=\"_nome\"><strong>E-mail:</strong> $email</div>";
        echo "<div class=\"_nome\"><strong>Comentário de:</strong> $nome</div>";
        echo "<div class=\"_mensagem\"><strong>$mensagem</strong></div>";
    }
} else {
    echo "Não foi possível conectar ao banco de dados: " . mysqli_error($conexao);
}

// Fecha a conexão com o banco de dados
mysqli_close($conexao);
?>
</body>
</html>