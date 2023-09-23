<?php

include("../config/config.php");

checkIfUserIsLoggedInOrRedirectToLogin();

unset($_SESSION["user"]);

$_SESSION["flash-message"] = "Du har loggat ut!";
redirectTo("home.php");
