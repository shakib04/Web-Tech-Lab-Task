<!-- user info
>username,Full Name password, email, gender, phone number, type( 
    user/ planner) type, local address,    -->


<?php


require_once("validation/validation.php");

//INSERT INTO `users` (`id`, `name`, `password`, `type`) VALUES (NULL, 'Shakib', '1234', 'user');


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
        <h2>Welcome to Registration</h2>
        <table>
            <!-- <tr>
                <td>Full Name: </td>
                <td><input type="text" name="fullname" id=""><?php echo $er_fullname; ?></td>
            </tr> -->

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


            <!-- <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="text" name="cfpassword" id="" value="<?PHP //echo $cfpassword; 
                                                                        ?>"> <?php echo $er_cfpassword; ?>
                </td>
            </tr>


            <tr>
                <td>Gender:
                    <?php echo $er_gender; ?>
                </td>
                <td>
                    <input type="radio" name="gender" id="" value="Male">Male
                    <input type="radio" name="gender" id="" value="Female">Female
                </td>
            </tr>

            <tr>
                <td>Email: </td>
                <td><input type="text" name="email" id=""><?php echo $er_email; ?></td>
            </tr>

            <tr>
                <td>Contact Number: </td>
                <td><input type="number" name="contactNumber" id=""><?php echo $er_phoneNumber; ?></td>
            </tr> -->

            <tr>
                <td>Type: </td>
                <td>
                    <select name="type" id="" style="width: 165px">
                        <option value="user">User</option>
                        <option value="planner">Planner</option>
                        <option value="vendor">Vendor</option>
                    </select><?php echo $er_type; ?>
                </td>
            </tr>

            <tr>
                <td><input type="reset" name="" id=""></td>
                <td><input type="submit" id="" name="register" value="OK"></td>
            </tr>
        </table>
    </form>
    <a href="login.php">Already Registered? Login</a>
</body>

</html>