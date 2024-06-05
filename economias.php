<?php
session_start();
include 'db.php';

if (!isset($_SESSION['email'])) {
  header('Location: index.php');
  exit();
}

$sql = "SELECT * FROM transacao WHERE tipo='Crédito'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Economias</title>
  <link rel="stylesheet" href="styles.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div class="container">
    <h2>Economias</h2>
    <canvas id="economiasChart"></canvas>
    <table>
      <thead>
        <tr>
          <th>Descrição</th>
          <th>Valor</th>
          <th>Data</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td><?php echo $row['data']; ?></td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
    <button onclick="window.location.href='add_economia.php'">Adicionar Economia</button>
  </div>

  <script>
    var ctx = document.getElementById('economiasChart').getContext('2d');
    var economiasChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho'],
        datasets: [{
          label: 'Economias',
          data: [200, 250, 300, 350, 400, 450],
          borderColor: 'rgba(54, 162, 235, 1)',
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