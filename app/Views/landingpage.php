<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 10px;
            text-align: center;
            color: white;
        }

        main {
            text-align: center;
            margin: 50px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-decoration: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
        }

        .btn-login {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>

    <header>
        <h1>Your Website</h1>
        <nav>
            <a href="<?php echo base_url('Register'); ?>" class="btn">Register</a>
            <a href="<?php echo base_url('Login'); ?> " class="btn btn-login">Login</a>
        </nav>
    </header>

    <main>
        <h2>Welcome to Your Website</h2>
        <p>Explore amazing features and services.</p>
    </main>

</body>
</html>
