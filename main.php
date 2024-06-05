<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página Principal</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Bem-vindo, <?php echo $_SESSION['email']; ?></h2>
    <input type="text" placeholder="Pesquisar...">
    <div class="grid">
      <a href="gastos.php">Gastos</a>
      <a href="economias.php">Economias</a>
      <a href="investimentos.php">Investimentos</a>
    </div>
    <button onclick="window.location.href='add_gasto.php'">Adicionar Gasto</button>
  </div>
</body>
</html>