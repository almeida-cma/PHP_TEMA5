<?php
session_start();

// Função para adicionar um novo produto
function adicionarProduto($nome, $descricao, $quantidade) {
    $_SESSION['produtos'][$nome] = array(
        'descricao' => $descricao,
        'quantidade' => $quantidade
    );
}

// Função para atualizar a quantidade de um produto existente
function atualizarQuantidadeProduto($nome, $quantidade) {
    if (isset($_SESSION['produtos'][$nome])) {
        $_SESSION['produtos'][$nome]['quantidade'] = $quantidade;
		$_SESSION['produtos'][$nome]['descricao'] = "ALT";
    }
}

// Função para excluir um produto
function excluirProduto($nome) {
    if (isset($_SESSION['produtos'][$nome])) {
        unset($_SESSION['produtos'][$nome]);
    }
}

// Função para exibir todos os produtos
function exibirProdutos() {
    if (!empty($_SESSION['produtos'])) {
        echo "<h2>Lista de Produtos</h2>";
        echo "<ul>";
        foreach ($_SESSION['produtos'] as $nome => $produto) {
            echo "<li><strong>$nome</strong>: {$produto['descricao']} (Quantidade: {$produto['quantidade']})</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Não há produtos na lista.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <style>
        body {
		font-family: Arial, sans-serif;
		background-color: #f4f4f4;
		margin: 0;
		padding: 20px;
	}

	.container {
		max-width: 800px;
		margin: 0 auto;
		padding: 20px;
		background-color: #fff;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
	}

	h1 {
		text-align: center;
		color: #333;
	}

	form {
		margin-bottom: 20px;
	}

	label {
		display: block;
		margin-bottom: 5px;
		font-weight: bold;
	}

	input[type="text"],
	input[type="number"] {
		width: 100%;
		padding: 8px;
		margin-bottom: 15px;
		box-sizing: border-box;
	}

	button {
		background-color: #4CAF50;
		color: white;
		padding: 10px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	button:hover {
		background-color: #45a049;
	}

	ul {
		list-style-type: none;
		padding: 0;
	}

	li {
		margin-bottom: 10px;
		padding: 10px;
		background-color: #f9f9f9;
		border-radius: 4px;
		box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
	}
    </style>
</head>
<body>
    <h1>CRUD de Produtos</h1>

    <!-- Formulário para adicionar um produto -->
    <h2>Adicionar Produto</h2>
    <form method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        
        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" required>
        
        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" required>
        
        <button type="submit" name="adicionar">Adicionar Produto</button>
    </form>

    <!-- Exibir lista de produtos -->
    <?php
    exibirProdutos();
    ?>

    <!-- Formulário para atualizar a quantidade de um produto -->
    <h2>Atualizar Quantidade</h2>
    <form method="post">
        <label for="nomeAtualizar">Nome do Produto:</label>
        <input type="text" id="nomeAtualizar" name="nomeAtualizar" required>
        
        <label for="novaQuantidade">Nova Quantidade:</label>
        <input type="number" id="novaQuantidade" name="novaQuantidade" required>
        
        <button type="submit" name="atualizar">Atualizar Quantidade</button>
    </form>

    <!-- Formulário para excluir um produto -->
    <h2>Excluir Produto</h2>
    <form method="post">
        <label for="nomeExcluir">Nome do Produto:</label>
        <input type="text" id="nomeExcluir" name="nomeExcluir" required>
        
        <button type="submit" name="excluir">Excluir Produto</button>
    </form>

    <?php
    // Processar as operações CRUD quando os formulários forem enviados
    if (isset($_POST['adicionar'])) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $quantidade = $_POST['quantidade'];
        adicionarProduto($nome, $descricao, $quantidade);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_POST['atualizar'])) {
        $nome = $_POST['nomeAtualizar'];
        $quantidade = $_POST['novaQuantidade'];
        atualizarQuantidadeProduto($nome, $quantidade);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_POST['excluir'])) {
        $nome = $_POST['nomeExcluir'];
        excluirProduto($nome);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    ?>
</body>
</html>
