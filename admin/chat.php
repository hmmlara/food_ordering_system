<?php
// Retrieve data from the database
// ...

// Prepare data for the chart
$labels = []; // Array of labels for each bar
$totalBalances = []; // Array of total balances for each bar
$bestSellingProducts = []; // Array of best-selling products for each bar

foreach ($data as $row) {
    $labels[] = $row['month'] . '/' . $row['year'];
    $totalBalances[] = $row['total_balance'];
    $bestSellingProducts[] = $row['product_name'];
}

// Create the bar chart using Chart.js
?>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Balance',
                    data: <?php echo json_encode($totalBalances); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }, {
                    label: 'Best-Selling Products',
                    data: <?php echo json_encode($bestSellingProducts); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
