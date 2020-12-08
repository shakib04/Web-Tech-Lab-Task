<?php

require_once "../controller/user-controller.php";
?>

<html>

<head>
    <style>
        .err_message {
            color: red;
            font-weight: 500;
        }
    </style>
    <title>JS Validation</title>
</head>

<body>
    <form action="" onsubmit="return logValidation()" method="post">
        <h2>Welcome to Login</h2>
        <table>

            <tr>
                <td>Username</td>
                <td>
                    <input type="text" id="username" name="username" id=""><span class="err_message" id="erUsername"></span>
                </td>
            </tr>

            <tr>
                <td>Password: </td>
                <td>
                    <input type="text" id="password" name="password" id=""> <span class="err_message" id="erPassword"></span>
                </td>
            </tr>

            <tr>
                <td><input type="reset" name="" id=""></td>
                <td><input type="submit" id="" name="login" value="OK"></td>
            </tr>
        </table>
    </form>
    <a href="registration.php">Registration</a>

    <script src="js/login-validation.js"></script>
</body>

</html>