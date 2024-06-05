<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $sql = "SELECT * FROM usuario WHERE email='$email' AND senha='$senha'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header('Location: main.php');
  } else {
    echo "Login falhou!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="senha" placeholder="Senha" required>
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>