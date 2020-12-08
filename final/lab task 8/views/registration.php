<?php require_once "../controller/user-controller.php";  ?>

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
    <form action="" onsubmit="return regValidation()" method="post">
        <h2>Welcome to Registration</h2>
        <table>
            <tr>
                <td>Full Name: </td>
                <td>
                    <input type="text" id="fullname" name="fullname" id=""><span class="err_message" id="erName"></span>
                </td>
            </tr>

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
                <td>Email: </td>
                <td><input type="text" id="email" name="email" id=""><span class="err_message" id="erEmail"></span></td>
            </tr>

            <tr>
                <td>Contact Number: </td>
                <td>
                    <input type="text" id="contact" name="contactNumber" id=""><span class="err_message" id="erContact"></span>
                </td>
            </tr>

            <tr>
                <td><input type="reset" name="" id=""></td>
                <td><input type="submit" id="" name="register" value="OK"></td>
            </tr>
        </table>
    </form>
    <a href="login.php">Already Registered? Login</a>

    <script src="js/reg-validation.js"></script>
</body>

</html>