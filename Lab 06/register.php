<!-- user info
>username,Full Name password, email, gender, phone number, type( 
    user/ planner) city, local address,    -->


<?php


require_once("validation/validation.php");


// $xml = simplexml_load_file("xml-data/data-file.xml");
// $users = $xml->user;

// $a = $xml->addChild("user");
// $a->addChild("username", "niloy");
// $a->addChild("password", "00");

// foreach ($users as $key => $value) {
//     echo "username: " . $value->username . "<br>";
//     echo "password: " . $value->password . "<br>";
//     echo "<br>";
// }

// $newXmlobj = new DOMDocument("1.0");
// $newXmlobj->preserveWhiteSpace = false;
// $newXmlobj->formatOutput = true;

// $newXmlobj->loadXML($xml->asXML());

// $f = fopen("new-d.xml", "w");
// fwrite($f, $newXmlobj->saveXML());





// $user = $xml->addChild("user");
// $user->addChild("username", "rabbi");
// $user->addChild("password", 23);



// $xml2 = new DOMDocument("1.0");
// $xml2->preserveWhiteSpace = false;
// $xml2->formatOutput = true;

// $xml2->loadXML($xml->asXML());


// $f = fopen("new-d.xml", "w");
// fwrite($f, $xml2->saveXML());
// echo "<pre>";

// echo "</pre>";



?>

<html>

<head>
    <title>Registration</title>

    <style>
        td {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <form action="" method="post">
        <h2>Welcome to Registration</h2>
        <table>
            <tr>
                <td>Full Name: </td>
                <td><input type="text" name="fullname" id=""><?php echo $er_fullname; ?></td>
            </tr>

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
            </tr>

            <tr>
                <td>City: </td>
                <td>
                    <select name="city" id="" style="width: 165px">
                        <option value="Dhaka">Dhaka</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="CTG">CTG</option>
                    </select><?php echo $er_city; ?>
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