<?php
include_once("config/dados.php");
include_once("config/conexao.php");

date_default_timezone_set("PORTUGAL");

session_start();
session_destroy();
header('Location: index.html');
exit;

?>