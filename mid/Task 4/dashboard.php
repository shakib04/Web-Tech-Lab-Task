<?php
session_start();
echo "<h1>Login Success! Welcome, " . $_SESSION['uname'] . "</h1>";
?>