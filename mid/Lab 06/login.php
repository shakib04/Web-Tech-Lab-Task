<?php

if (count($_SESSION) == 0) {
} else {
    header("location:dashboard-admin.php");
}

require_once("validation/login-validation.php");
?>

<html>

<head>
    <title>Registration</title>

    <style>
        td {
            font-weight: bold;
        }

        form {
            background-image: url("resources/bgnoise_lg.png");

        }
    </style>
</head>

<body>

    <form action="" method="post">
        <div style="background-color: dimgray; padding: 10px; color:white; font-size: 20px;">Login</div>
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id=""><?php echo $err_username; ?></td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="text" name="password" id=""> <?php echo $er_password; ?>
                </td>
            </tr>

            <tr>
                <td><input type="reset" name="" id=""></td>
                <td><input type="submit" id="" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>

</html>