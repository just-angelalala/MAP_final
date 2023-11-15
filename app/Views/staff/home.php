<!-- admin_interface.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        header {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
        }
        header a {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #fff;
            text-decoration: none;
        }
        main {
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Staff Interface</h1>
        <a href="<?= site_url('logout'); ?>">Logout</a>
    </header>
    <main>
        <p>Welcome to the Staff interface. This is the home page.</p>
    </main>
</body>
</html>
