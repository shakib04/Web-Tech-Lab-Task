<?php

require_once "validation.php";
?>

<!DOCTYPE html>
<html>

<head>

    <title>Lab Task 4</title>
    <style>
        span {
            font-weight: bold;
        }
    </style>
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
                        <input type="text" name="fullname" id="" value="<?PHP echo $fullname; ?>"> <?php echo $er_fullname; ?>
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="uname" id="" value="<?PHP echo $uname; ?>"> <?php echo $er_uname; ?>
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="text" name="password" id="" value="<?PHP echo $password; ?>"> <?php echo $er_password; ?>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>
                        <input type="text" name="cfpassword" id="" value="<?PHP echo $cfpassword; ?>"> <?php echo $er_cfpassword; ?>
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" id="" value="<?PHP echo $email; ?>"> <?php echo $er_email; ?>
                    </td>
                </tr>

                <tr>
                    <td>Phone</td>
                    <td>
                        <input type="text" name="phone-code" value="<?PHP echo $phoneCode; ?>" size="2" id="" placeholder="code"><?php echo $er_phoneCode; ?> -
                        <input type="text" name="phoneNumber" size="11" id="" value="<?PHP echo $phoneNumber; ?>" placeholder="Number"> <?php echo $er_phoneNumber; ?>
                    </td>
                </tr>

                <tr>
                    <td>Address</td>
                    <td>
                        <input type="text" name="street" id="" value="<?PHP echo $street; ?>" placeholder="Street Address"><?php echo $er_street; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="city" size="2" id="" value="<?PHP echo $city; ?>" placeholder="City"><?php echo $er_city; ?>-
                        <input type="text" name="state" id="" size="11" value="<?PHP echo $state; ?>" placeholder="State"><?php echo $er_state; ?>
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="text" name="postal" id="" value="<?PHP echo $postal; ?>" placeholder="Postal"><?php echo $er_postal; ?>
                    </td>
                </tr>

                <tr>
                    <td>Birth Date:
                        <?php echo $er_bod; ?>
                    </td>

                    <td>

                        <select name="Day" id="">
                            <option value="<?php if ($day == "") {
                                                echo "Day";
                                            } else {
                                                echo $day;
                                            }
                                            ?>" disabled selected><?php if ($day == "") {
                                                                        echo "Day";
                                                                    } else {
                                                                        echo $day;
                                                                    }
                                                                    ?></option>

                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>

                        <select name="Month" id="">
                            <option value="<?php if ($month == "") {
                                                echo "Month";
                                            } else {
                                                echo $month;
                                            }
                                            ?>" disabled selected><?php if ($month == "") {
                                                                        echo "Month";
                                                                    } else {
                                                                        echo $month;
                                                                    }
                                                                    ?></option>

                            <?php
                            $months = ['January', 'February', 'March', 'April', 'June', 'July', 'August', 'Sep', 'Oct', 'Nov', 'Dec'];

                            foreach ($months as $m) {
                                echo "<option value='$m'>$m</option>";
                            }
                            ?>

                        </select>

                        <select name="Year" id="">
                            <option value="<?php if ($year == "") {
                                                echo "Year";
                                            } else {
                                                echo $year;
                                            }
                                            ?>" disabled selected><?php if ($year == "") {
                                                                        echo "Year";
                                                                    } else {
                                                                        echo $year;
                                                                    }
                                                                    ?></option>

                            <?php
                            for ($i = 1995; $i <= 2000; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>

                        </select>
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
                    <td>
                        Where Did you hear about us?
                        <?php echo $er_hearFrom; ?>

                    </td>

                    <td>
                        <input type="checkbox" name="hear-from[]" id="" value="A Friend or Colleague">A Friend or Colleague <br>
                        <input type="checkbox" name="hear-from[]" id="" value="Google">Google <br>
                        <input type="checkbox" name="hear-from[]" id="" value="Blog Post"> Blog Post <br>
                        <input type="checkbox" name="hear-from[]" id="" value="News Atricle"> News Atricle
                    </td>
                </tr>

                <tr>
                    <td>
                        Bio:
                    </td>
                    <td>
                        <textarea name="bio" id="" cols="30" rows="10"><?PHP echo $bio; ?></textarea> <?php echo $er_bio; ?>
                    </td>
                </tr>

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