<?php
function conexao() 
{
	try 
	{
		$pdo = new PDO("mysql:host=".DB_HOSTNAME.";dbname=dbappcovid19",DB_USER,DB_PASS);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $pdo;
	} 
	catch (PDOException $e) 
	{
		echo 'Connection failed: ' . $e->getMessage();
	}
}

conexao();
?>