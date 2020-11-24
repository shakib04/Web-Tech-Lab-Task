<?php

require_once("db-connect.php");

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
$er_fullname = $err_username = $er_password = $err_fname = $er_cfpassword = $er_email = $er_phoneNumber = $er_type = $er_gender = "";
$fullname = $username = $password = $fname = $cfpassword = $email = $phoneNumber = $type = "";
$temp_username = $temp_password = $temp_fname = $temp_user_type = $temp_email = $temp_phone_number = $temp_type = $temp_local_address = "";

$hasError = true;
$validCount = 0;

if (isset($_POST['register'])) {

    //fullname validation

    // if (empty(trim($_POST['fullname']))) {
    //     $er_fullname = "<span style='color:red;'> Name is Required </span>";
    //     $hasError = true;
    // } else {
    //     $fullname = htmlspecialchars($_POST['fullname']);
    //     $validCount++;
    //     //$hasError = false;
    // }


    //username validation

    if (empty(trim($_POST['username']))) {
        $err_username = "<span style='color:red;'>Username is Required</span>";
        $hasError = true;
    } elseif (strlen($_POST['username']) < 5) {
        $err_username = "Username must be 5 Charectors Long";
        $hasError = true;
    } elseif (strlen($_POST['username']) > 10) {
        $err_username = "Username cannot be more than 10 Charectors Long";
        $hasError = true;
    } elseif (strpos($_POST['username'], " ")) {
        $err_username = "Space is not Allowed";
        $hasError = true;
    } else {
        $username = validate($_POST['username']);
        $validCount++; //$hasError = false;
    }



    //password validation

    if (empty(trim($_POST['password']))) {
        $er_password = "<span style='color:red;'> Password is Required </span>";
        $hasError = true;
    } elseif (strlen($_POST['password']) < 8) {
        $er_password = "<span style='color:red;'>Password must contain at least 8 character </span>";
        $hasError = true;
    } elseif (!strpos($_POST['password'], "#")) {
        $er_password = "<span style='color:red;'>Password must contain 1 special character # </span>";
        $hasError = true;
    } elseif (!strpos($_POST['password'], "1")) {
        $er_password = "<span style='color:red;'>Password must contain 1 number  </span>";
        $hasError = true;
    } elseif (ctype_upper($_POST['password'])) {
        $er_password = "<span style='color:red;'>Password must contain 1 Lowercase  </span>";
        $hasError = true;
    } elseif (ctype_lower($_POST['password'])) {
        $er_password = "<span style='color:red;'>Password must contain 1 Uppercase  </span>";
        $hasError = true;
    } else {
        $password = validate($_POST['password']);
        $validCount++;
        //$hasError = false;
    }




    //confirm password validation

    // if (empty(trim($_POST['cfpassword']))) {
    //     $er_cfpassword = "<span style='color:red;'>Confirm Password is Required </span>";
    //     $hasError = true;
    // } elseif ($password != $_POST['cfpassword']) {
    //     $er_cfpassword = "<span style='color:red;'>Password does not match</span>";
    //     $hasError = true;
    // } else {
    //     $cfpassword = $_POST['cfpassword'];
    //     $validCount++;
    //     //$hasError = false;
    // }



    //gender validation

    // if (!isset($_POST['gender'])) {
    //     $er_gender = "<span style='color:red;'> (Must Select 1) </span>";
    //     $hasError = true;
    // } else {
    //     $gender = $_POST['gender'];
    //     $validCount++;
    //     //$hasError = false;
    // }


    //email validation

    // if (empty(trim($_POST['email']))) {
    //     $er_email = "<span style='color:red;'> Email is Required </span>";
    //     $hasError = true;
    // } elseif (strpos($_POST['email'], " ")) {
    //     $er_email = "<span style='color:red;'> Space is not Allowed </span>";
    //     $hasError = true;
    // } elseif (!strpos($_POST['email'], "@") or !strpos($_POST['email'], ".")) {
    //     $er_email = "<span style='color:red;'> Email is not valid. No [@] </span>";
    //     $hasError = true;
    // } elseif (strpos($_POST['email'], "@")) {
    //     $atRatePos = strpos($_POST['email'], "@");

    //     $tempEmail = $_POST['email'];
    //     $hasDot = false;

    //     for ($i = $atRatePos; $i < strlen($tempEmail); $i++) {
    //         if ($tempEmail[$i] == ".") {
    //             $hasDot = true;
    //             break;
    //         }
    //     }

    //     if ($hasDot) {
    //         $email = htmlspecialchars($_POST['email']);
    //         $validCount++;
    //         $hasError = false;
    //     } else {
    //         $er_email = "<span style='color:red;'> Email is not valid </span>";

    //         //$hasError = true;
    //     }
    // }



    //Phone number fields will only accept numeric value.

    // if (empty(trim($_POST['contactNumber']))) {
    //     $er_phoneNumber = "<span style='color:red;'> Phone Number is Required </span>";
    //     $hasError = true;
    // } elseif (!is_numeric($_POST['contactNumber'])) {
    //     $er_phoneNumber = "<span style='color:red;'> Number is not valid (only numeric) </span>";
    //     $hasError = true;
    // } elseif (strpos($_POST['contactNumber'], " ")) {
    //     $er_phoneNumber = "<span style='color:red;'> Space is not Allowed </span>";
    //     $hasError = true;
    // } else {
    //     $phoneNumber = $_POST['contactNumber'];
    //     $validCount++;
    //     //$hasError = false;
    // }



    //type

    if (empty(trim($_POST['type']))) {
        $er_type = "<span style='color:red;'> type is Required </span>";
        $hasError = true;
    } else {
        $type = htmlspecialchars($_POST['type']);
        $validCount++;
        $hasError = false;
    }



    //save data to database

    //echo $validCount;

    if ($validCount == 3) {
        // $admin = simplexml_load_file("admin.xml");
        // $user = $admin->addChild("user");
        // $user->addChild("fullname", $fullname);
        // $user->addChild("username", $username);
        // $user->addChild("password", $password);
        // $user->addChild("gender", $gender);
        // $user->addChild("email", $email);
        // $user->addChild("contact", $phoneNumber);
        // $user->addChild("type", $type);
        // //$user->addChild("username", $username);

        // $newXmlobj = new DOMDocument("1.0");
        // $newXmlobj->preserveWhiteSpace = false;
        // $newXmlobj->formatOutput = true;

        // $newXmlobj->loadXML($admin->asXML());

        // $file = fopen("admin.xml", "w");
        // fwrite($file, $newXmlobj->saveXML());
        $password = md5($password);


        $query = "INSERT INTO users VALUES (NULL, '$username', '$password', '$type')";
        $result = mysqli_query($conn, $query);
        //mysqli_close($conn);
        if ($result) {
            header("Location: login.php");
        } else {
            echo "Failed to Register! Try Again..";
        }
    }


    //echo $_POST['username'];
}


// <root>
//     <user>
//         <fullname>Shakib</fullname>
//         <username>s1</username>
//         <password>s1</password>
//         <gender>s1</gender>
//         <email>s1</email>
//         <contact>s1</contact>
//         <type>s1</type>
//     </user>
// </root>