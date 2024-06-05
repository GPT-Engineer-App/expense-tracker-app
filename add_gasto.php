<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $descricao = $_POST['descricao'];
  $valor = $_POST['valor'];
  $data = $_POST['data'];
  $categoria_nome = $_POST['categoria_nome'];
  $conta_id = '1234567890'; // Exemplo de conta_id

  $sql = "INSERT INTO transacao (descricao, valor, data, tipo, conta_id, categoria_nome) VALUES ('$descricao', '$valor', '$data', 'Débito', '$conta_id', '$categoria_nome')";
  if ($conn->query($sql) === TRUE) {
    header('Location: gastos.php');
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
  <title>Adicionar Gasto</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Adicionar Gasto</h2>
    <form method="POST" action="">
      <input type="text" name="descricao" placeholder="Descrição" required>
      <input type="number" name="valor" placeholder="Valor" required>
      <input type="date" name="data" required>
      <input type="text" name="categoria_nome" placeholder="Categoria" required>
      <button type="submit">Adicionar</button>
    </form>
  </div>
</body>
</html>