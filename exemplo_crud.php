<?php
// Criar um array
$frutas = array("Maçã", "Banana", "Laranja");

// Exibir o array antes da modificação
echo "Array antes da modificação: ";
print_r($frutas);
echo "<br>";

// Modificar um elemento do array
$frutas[1] = "Abacaxi";
echo "Trocando Banana por Abacaxi<br>";

// Exibir o array após a modificação
echo "Array após a modificação: ";
print_r($frutas);
echo "<br>";

// Inserir um novo elemento no final do array
$frutas[] = "Morango";
echo "Array após inserir Morango: ";
print_r($frutas);
echo "<br>";

// Inserir um novo elemento em uma posição específica
$frutas[4] = "Uva";
echo "Array após inserir Uva na posição 4: ";
print_r($frutas);
echo "<br>";

// Remover um elemento do array usando unset
unset($frutas[2]);
echo "Array após remover o elemento na posição 2 (Laranja): ";
print_r($frutas);
echo "<br>";

// Reindexar o array (opcional, se quiser que as chaves fiquem sequenciais)
$frutas = array_values($frutas);
echo "Array após reindexação: ";
print_r($frutas);
?>
