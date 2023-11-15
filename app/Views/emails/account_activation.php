<!DOCTYPE html>
<html lang="en">

<head>
    <title>pixels</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Objektiv+Mk1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: objektiv mk1;
            src: url(fonts.ttf);
        }

        * {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>

<body style="margin: 0; padding: 0;">
<tr>
    <td style="background: #fff; font-size: 25px; padding: 0 26px;">
        <p style="text-align: left; font-weight: bold; color: #000;">
            Hello <?= $name ?>,
        </p>
        <p style="text-align: justify;">
            Welcome to Mindoro Auto Parts. To continue, please confirm your account by clicking this <a href="<?php echo base_url(); ?>/activate_account/<?php echo $token; ?>">Activate Account</a>
        </p>
    </td>
</tr>

        <tr>
            <td style="padding: 26px; background-image: url(https://i.postimg.cc/RZfQd50z/1-Transactional-xxx-Order-xxx-svg-1.png); background-repeat: no-repeat; background-position: 100% 350px; width: 100%;">
                <table width="100%;">
                    <tr>
                        <td style="border-bottom: 1.5px solid #969696; opacity: 0.25;"></td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <p style="font-weight: 600; margin: 0; font-size: 16px;">Account Details:</p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $name ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $position ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $userEmail ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;">Tel. <?= $contactNumber ?></p>
                                <p style="margin: 0; font-size: 20px; font-size: 15px;"><?= $address ?></p>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

                                            
        <tr>
        </tr>
    </tbody>
</table>
</body>

</html>