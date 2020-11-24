<?php
/*$file = fopen("data.txt","r");
	$i=1;
    while(!feof($file)){
		$line = fgets($file);
		$info = explode(":",$line);
		echo "username: $info[0] <br> ";
		echo "password: $info[1] <br> ";
		echo "type: $info[2] <br> ";
		
	}*/

	session_start();

	
require_once "registration.php";

//echo $uname . "<br>";
//echo $pass . "<br>";


$xml = simplexml_load_file("data.xml");
$users = $xml->user;
$flag = false;
foreach ($users as $user) {
	//echo "Username: $user->username <br>" ;
	//echo "Password: $user->password <br>" ;
	//echo "Type: $user->type <br>" ;

	if ($user->username == $uname && $user->password == $pass) {
		$flag = true;
		break;
	} else {
		$flag = false;
	}
}
if (isset($_POST['register'])) {
	if ($flag) {
		$_SESSION['uname'] = $uname;
		header("Location: dashboard.php");
	} else {
		echo "Invalid credentiails";
	}
}


?>

<html>

<script>
	document.querySelector("#submit").value = "Login";
</script>

</html>