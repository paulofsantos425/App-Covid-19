<?php
$hostname='localhost';
$username='appcovid19';
$password='12345678';

$pdo = new PDO("mysql:host=$hostname;dbname=dbappcovid19",$username,$password);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // Add this line to set ERRMODE attribute with the EXCEPTION value like (attribute,value). The EXCEPTION value throw exceptions from DB...
// The object operator, -> , is used in object scope to access methods and properties of an object...

$fatos = $_POST['fatos'];
$luvas = $_POST['luvas'];
$gel = $_POST['gel'];
$mascaras = $_POST['mascaras'];

		$queryQuantidadeProdutos = "UPDATE products 
SET pquantity = CASE WHEN pname = 'fatos' THEN '".$fatos."'
                     WHEN pname = 'luvas' THEN '".$luvas."'
                     WHEN pname = 'gel' THEN '".$gel."'
                     WHEN pname = 'mascaras' THEN '".$mascaras."' 
					 END 
                     WHERE pname IN ('fatos','luvas','gel','mascaras')";
		
		$pdo->query($queryQuantidadeProdutos);	

		
	//
//
?>