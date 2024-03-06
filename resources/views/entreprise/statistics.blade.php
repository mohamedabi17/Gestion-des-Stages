<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entreprise Statistics Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h2 {
            color: #333;
        }
        .chart-container {
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>entreprise Statistics Dashboard</h2>
        <div class="chart-container">
            <h3>entreprise Distribution by Sector of Activity</h3>
            <canvas id="sector-chart"></canvas>
        </div>
        <div class="chart-container">
            <h3>entreprise Distribution by Location</h3>
            <canvas id="location-chart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Top-Rated entreprises</h3>
            <ol>
                <li>entreprise A</li>
                <li>entreprise B</li>
                <li>entreprise C</li>
                <!-- Add more entreprises as needed -->
            </ol>
        </div>
    </div>

    <!-- Include necessary CSS and JavaScript libraries for charts/graphs -->
    <!-- For example, you can include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // JavaScript code to generate charts will go here
    </script>
</body>
</html>
