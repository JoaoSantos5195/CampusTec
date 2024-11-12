<?php
// Conexão ao banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campustec";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar os dados
$sql = "SELECT idade, habilidades FROM candidatos";
$result = $conn->query($sql);

$idades = [];
$habilidades = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $idades[] = $row["idade"];
        
        // Separar habilidades em um array
        $skills = explode(',', $row["habilidades"]);
        foreach($skills as $skill) {
            $habilidades[] = trim($skill);
        }
    }
} else {
    echo "0 resultados";
}
$conn->close();

// Contar a frequência das habilidades
$habilidades_contagem = array_count_values($habilidades);
arsort($habilidades_contagem);

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Candidatos</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #53884B, #000000);
            color: white;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 50px auto;
        }
        canvas {
            margin: 20px;
            background: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <h1>Gráficos de Candidatos</h1>
    <div class="container">
        <canvas id="idadeChart"></canvas>
        <canvas id="habilidadesChart"></canvas>
    </div>

    <script>
        // Dados de idades dos candidatos
        const idades = <?php echo json_encode($idades); ?>;
        const ctxIdade = document.getElementById('idadeChart').getContext('2d');
        new Chart(ctxIdade, {
            type: 'bar',
            data: {
                labels: [...new Set(idades)],
                datasets: [{
                    label: 'Distribuição de Idades',
                    data: idades.reduce((acc, idade) => {
                        acc[idade] = (acc[idade] || 0) + 1;
                        return acc;
                    }, {}),
                    backgroundColor: 'rgba(83, 136, 75, 0.7)',
                    borderColor: 'rgba(83, 136, 75, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });

        // Dados de habilidades dos candidatos
        const habilidades = <?php echo json_encode(array_keys($habilidades_contagem)); ?>;
        const habilidadesCount = <?php echo json_encode(array_values($habilidades_contagem)); ?>;
        const ctxHabilidades = document.getElementById('habilidadesChart').getContext('2d');
        new Chart(ctxHabilidades, {
            type: 'pie',
            data: {
                labels: habilidades,
                datasets: [{
                    label: 'Habilidades',
                    data: habilidadesCount,
                    backgroundColor: [
                        'rgba(83, 136, 75, 0.7)',
                        'rgba(75, 192, 192, 0.7)',
                        'rgba(255, 206, 86, 0.7)',
                        'rgba(153, 102, 255, 0.7)',
                        'rgba(255, 159, 64, 0.7)'
                    ],
                    borderColor: [
                        'rgba(83, 136, 75, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    </script>
</body>
</html>
