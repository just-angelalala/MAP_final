<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign In</h2>
        <?php if(session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('msg') ?>
            </div>
        <?php endif; ?>
        
        <form action="Login" method="post">
            <?php $validation =  \Config\Services::validation(); ?>
            <?= csrf_field(); ?>

            <?php if ($validation->getError('UserEmail')): ?>
                <div class="invalid-feedback">
                    <?= $validation->getError('UserEmail') ?>
                </div>                                
            <?php endif; ?>

            <input type="email" placeholder="Username" name="UserEmail" required>
            
            <input type="password" placeholder="Password" name="UserPassword"required>
            
            <button type="submit">Sign In</button>
            <br>
            <br>
            <label for="address">Don't have a account?</label>
             <a href="<?php echo base_url('Register'); ?>">Register</a>
        </form>
    </div>
</body>
</html>
