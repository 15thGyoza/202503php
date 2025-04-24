<?php

require '../helpers.php';

header('Content-type: text/html; charset=utf-8');

printRWithBr($_GET);
echoHr();
printRWithBr($_POST);
echoHr();
printRWithBr($_REQUEST);
echoHr();
printRWithBr($_FILES);
echoHr();
printRWithBr($_COOKIE);
echoHr();
session_start();
printRWithBr($_SESSION);
echoHr();
printRWithBr($_SERVER);


