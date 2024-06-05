<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $nome = $_POST['nome'];
  $valor_atual = $_POST['valor_atual'];
  $retorno = $_POST['retorno'];

  $sql = "INSERT INTO investimento (nome, valor_atual, retorno) VALUES ('$nome', '$valor_atual', '$retorno')";
  if ($conn->query($sql) === TRUE) {
    header('Location: investimentos.php');
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Investimento</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Adicionar Investimento</h2>
    <form method="POST" action="">
      <input type="text" name="nome" placeholder="Nome" required>
      <input type="number" name="valor_atual" placeholder="Valor Atual" required>
      <input type="number" name="retorno" placeholder="Retorno" required>
      <button type="submit">Adicionar</button>
    </form>
  </div>
</body>
</html>