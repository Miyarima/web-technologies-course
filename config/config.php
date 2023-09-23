<?php

// Report all type of errors
error_reporting(-1);

// Display all errors
ini_set('display_errors', '1');

$name = preg_replace("/[^a-z\d]/i", "", __DIR__);
session_name($name);
session_start();

include('../src/functions.php');
include('../src/database.php');
