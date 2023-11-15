<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input, select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .invalid-feedback {
            color: #ff0000;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <form action="Register" method="post">
        <h2>Registration Form</h2>
   
        <?php $validation = \Config\Services::validation(); ?>

        <label for="name">Name:</label>
        <input type="text" id="name" name="Name" required>
        <?php if ($validation->getError('Name')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Name') ?>
            </div>                                
        <?php endif; ?>

        <label for="contactNumber">Contact Number:</label>
        <input type="number" id="contactNumber" name="ContactNumber" required>
        <?php if ($validation->getError('ContactNumber')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('ContactNumber') ?>
            </div>                                
        <?php endif; ?>

        <label for="userEmail">Email:</label>
        <input type="email" id="userEmail" name="UserEmail" required>
        <?php if ($validation->getError('UserEmail')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('UserEmail') ?>
            </div>                                
        <?php endif; ?>

        <label for="userPassword">Password:</label>
        <input type="password" id="userPassword" name="UserPassword" required>
        <?php if ($validation->getError('UserPassword')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('UserPassword') ?>
            </div>                                
        <?php endif; ?>

        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" id="confirmPassword" name="confirm_password" required>
        <?php if ($validation->getError('confirm_password')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('confirm_password') ?>
            </div>                                
        <?php endif; ?>

        <label for="position">Position:</label>
        <select id="position" name="Position" required>
            <option value="Admin">Admin</option>
            <option value="Staff">Staff</option>
        </select>
        <?php if ($validation->getError('Position')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Position') ?>
            </div>                                
        <?php endif; ?>

        <label for="address">Address:</label>
        <textarea id="address" name="Address" rows="4" required></textarea>
        <?php if ($validation->getError('Address')): ?>
            <div class="invalid-feedback">
                <?= $validation->getError('Address') ?>
            </div>                                
        <?php endif; ?>

        <input type="submit" value="Register">
        <br>
        <br>

        <label for="address">Already have account?</label>
            <a href="<?php echo base_url('Login'); ?>">Login</a>

    </form>

</body>
</html>
