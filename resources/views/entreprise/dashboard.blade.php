<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entreprise Dashboard</title>
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
        .operation-btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
            display: block;
            width: 100%;
            text-align: center;
        }
        .operation-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
      <div class="container">
        <h2>entreprise Dashboard</h2>
           <!-- Operation Selection Section -->
        <button class="operation-btn" id="editBtn">Edit entreprise</button>
        <button class="operation-btn" id="statisticsBtn">View entreprise Statistics</button>
        <button class="operation-btn" id="createBtn">Create New entreprise</button>
    </div>

      <script>
        document.getElementById("editBtn").addEventListener("click", function() {
            window.location.href = "{{ route('entreprise.edit', ['entreprise' => 1]) }}";
        });

        document.getElementById("statisticsBtn").addEventListener("click", function() {
            window.location.href = "{{ route('search.entreprise') }}";
        });

        document.getElementById("createBtn").addEventListener("click", function() {
            window.location.href = "{{ route('entreprise.create') }}";
        });
    </script>
</body>
</html>
