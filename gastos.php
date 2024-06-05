<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

$sql = "SELECT * FROM transacao WHERE tipo='Débito'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gastos</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h2>Gastos</h2>
    <canvas id="gastosChart"></canvas>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Data</th>
          <th>Categoria</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td><?php echo $row['categoria_nome']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <button onclick="window.location.href='add_gasto.php'">Adicionar Gasto</button>
  </div>

  <script>
    var ctx = document.getElementById('gastosChart').getContext('2d');
    var gastosChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
        datasets: [{
          label: 'Gastos',
          data: [120, 150, 180, 200, 170, 190],
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>
</html>