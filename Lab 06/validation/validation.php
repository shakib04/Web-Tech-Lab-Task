<?php

function validate($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlentities($data);
    return $data;
}
$er_fullname = $err_username = $er_password = $err_fname = $er_cfpassword = $er_email = $er_phoneNumber = $er_city = $er_gender = "";
$fullname = $username = $password = $fname = $cfpassword = $email = $phone_number = $city = "";
$temp_username = $temp_password = $temp_fname = $temp_user_type = $temp_email = $temp_phone_number = $temp_city = $temp_local_address = "";

$hasError = true;

if (isset($_POST['register'])) {
    
    //fullname validation

    if (empty(trim($_POST['fullname']))) {
        $er_fullname = "<span style='color:red;'> Name is Required </span>";
        $hasError = true;
    } else {
        $fullname = htmlspecialchars($_POST['fullname']);
        $hasError = false;
    }


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
        $hasError = false;
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
        $hasError = false;
    }




    //confirm password validation

    if (empty(trim($_POST['cfpassword']))) {
        $er_cfpassword = "<span style='color:red;'>Confirm Password is Required </span>";
        $hasError = true;
    } elseif ($password != $_POST['cfpassword']) {
        $er_cfpassword = "<span style='color:red;'>Password does not match</span>";
        $hasError = true;
    } else {
        $cfpassword = $_POST['cfpassword'];
        $hasError = false;
    }



    //gender validation

    if (!isset($_POST['gender'])) {
        $er_gender = "<span style='color:red;'> (Must Select 1) </span>";
        $hasError = true;
    } else {
        $gender = $_POST['gender'];
        $hasError = false;
    }


    //email validation

    if (empty(trim($_POST['email']))) {
        $er_email = "<span style='color:red;'> Email is Required </span>";
        $hasError = true;
    } elseif (strpos($_POST['email'], " ")) {
        $er_email = "<span style='color:red;'> Space is not Allowed </span>";
        $hasError = true;
    } elseif (!strpos($_POST['email'], "@") or !strpos($_POST['email'], ".")) {
        $er_email = "<span style='color:red;'> Email is not valid. No [@] </span>";
        $hasError = true;
    } elseif (strpos($_POST['email'], "@")) {
        $atRatePos = strpos($_POST['email'], "@");

        $tempEmail = $_POST['email'];
        $hasDot = false;

        for ($i = $atRatePos; $i < strlen($tempEmail); $i++) {
            if ($tempEmail[$i] == ".") {
                $hasDot = true;
                break;
            }
        }

        if ($hasDot) {
            $email = htmlspecialchars($_POST['email']);
            $hasError = false;
        } else {
            $er_email = "<span style='color:red;'> Email is not valid </span>";
            $hasError = true;
        }
    }



    //Phone number fields will only accept numeric value.

    if (empty(trim($_POST['contactNumber']))) {
        $er_phoneNumber = "<span style='color:red;'> Phone Number is Required </span>";
        $hasError = true;
    } elseif (!is_numeric($_POST['contactNumber'])) {
        $er_phoneNumber = "<span style='color:red;'> Number is not valid (only numeric) </span>";
        $hasError = true;
    } elseif (strpos($_POST['contactNumber'], " ")) {
        $er_phoneNumber = "<span style='color:red;'> Space is not Allowed </span>";
        $hasError = true;
    } else {
        $phoneNumber = $_POST['contactNumber'];
        $hasError = false;
    }



    //city

    if (empty(trim($_POST['city']))) {
        $er_city = "<span style='color:red;'> City is Required </span>";
        $hasError = true;
    } else {
        $city = htmlspecialchars($_POST['city']);
        $hasError = false;
    }



    //save data to admin.xml file

    if ($hasError == false) {
        $admin = simplexml_load_file("admin.xml");
        $user = $admin->addChild("user");
        $user->addChild("fullname", $fullname);
        $user->addChild("username", $username);
        $user->addChild("password", $password);
        $user->addChild("gender", $gender);
        $user->addChild("email", $email);
        $user->addChild("contact", $contact);
        $user->addChild("city", $city);
        //$user->addChild("username", $username);

        $newXmlobj = new DOMDocument("1.0");
        $newXmlobj->preserveWhiteSpace = false;
        $newXmlobj->formatOutput = true;

        $newXmlobj->loadXML($admin->asXML());

        $file = fopen("admin.xml", "w");
        fwrite($file, $newXmlobj->saveXML());

        header("Location: login.php");
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
//         <city>s1</city>
//     </user>
// </root>