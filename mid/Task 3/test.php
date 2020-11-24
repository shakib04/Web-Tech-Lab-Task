<?php

$fullname = $er_fullname = $uname = "";

if (isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    //$uname = $_POST['uname'];
    echo $fullname;
} else {
    echo "button is not clicked";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <fieldset>
            <legend>
                <h1>Club Member Registration</h1>
            </legend>

            <h3>All Fields are Required</h3>
            <table>
                <tr>
                    <td>Name: </td>
                    <td>
                        <input type="text" name="fullname" id="" value="<?PHP echo $fullname; ?>"> <?php echo $fullname; ?>
                    </td>
                </tr>
                <!-- <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="uname" id="" value="<?PHP echo $uname; ?>"> <?php echo $er_uname; ?>
                    </td>
                </tr> -->
                <tr>
                    <td></td>

                    <td>
                        <input type="submit" name="register" id="" value="Register">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>

</body>

</html>