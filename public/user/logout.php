<?php
require("user_path.php");
require_once('../../private/initialize.php');
// Log out the user
$session->logout();
$_SESSION["logged_in"] = false;
session_destroy();
redirect_to(url_for('index.php'));
?>
