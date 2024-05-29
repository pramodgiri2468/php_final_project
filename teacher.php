<!DOCTYPE html>
<html>
<head>
    <title>Teacher's Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Teacher's Dashboard</h1>

    <form method="POST" action="">
        <label for="enrollment_type">Enrollment Type:</label>
        <br>
        <button type="button" onclick="location.href='course.php'">Course</button>
        <button type="button" onclick="location.href='degree.php'">Degree</button>
    </form>
</body>
</html>
