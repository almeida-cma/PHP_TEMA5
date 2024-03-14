<?php

// Matriz de filmes e gêneros
$filmes_e_generos = array(
    array("filme" => "Interestelar", "genero" => "Ficção Científica"),
    array("filme" => "O Poderoso Chefão", "genero" => "Drama"),
    array("filme" => "Vingadores: Ultimato", "genero" => "Ação"),
    array("filme" => "Cidade de Deus", "genero" => "Drama"),
    array("filme" => "Matrix", "genero" => "Ficção Científica"),
    array("filme" => "O Senhor dos Anéis: A Sociedade do Anel", "genero" => "Fantasia"),
    array("filme" => "O Lobo de Wall Street", "genero" => "Drama"),
    array("filme" => "Batman: O Cavaleiro das Trevas", "genero" => "Ação"),
    array("filme" => "A Origem", "genero" => "Ficção Científica"),
    array("filme" => "Clube da Luta", "genero" => "Drama")
);

// Contagem de gêneros
$contagem_generos = array();
foreach ($filmes_e_generos as $filme) {
    $genero = $filme['genero'];
    if (!isset($contagem_generos[$genero])) {
        $contagem_generos[$genero] = 1;
    } else {
        $contagem_generos[$genero]++;
    }
}

// Encontrar o gênero predominante
$genero_predominante = "";
$quantidade_maxima = 0;
foreach ($contagem_generos as $genero => $quantidade) {
    if ($quantidade > $quantidade_maxima) {
        $genero_predominante = $genero;
        $quantidade_maxima = $quantidade;
    }
}

// Matriz apenas com o gênero predominante
$filmes_genero_predominante = array();
foreach ($filmes_e_generos as $filme) {
    if ($filme['genero'] == $genero_predominante) {
        $filmes_genero_predominante[] = $filme['filme'];
    }
}

echo "Array contagem_generos";
echo "<pre>";
print_r($contagem_generos);
echo "</pre>";

echo "genero_redominante = " . $genero_predominante ."<br>";
echo "quantidade_maxima = " . $quantidade_maxima ."<br>";

echo "<br> Array filmes_genero_predominante";
echo "<pre>";
print_r($filmes_genero_predominante);
echo "</pre>";

// Exibição dos resultados
echo "<br> Lista de filmes assistidos em 2021 e seus gêneros:<br>";
foreach ($filmes_e_generos as $filme) {
    echo $filme['filme'] . " - " . $filme['genero'] . "<br>";
}

echo "<br>Gênero que mais predomina na lista: $genero_predominante<br>";

echo "<br>Filmes do gênero predominante:<br>";
foreach ($filmes_genero_predominante as $filme) {
    echo $filme . "<br>";
}

?>
