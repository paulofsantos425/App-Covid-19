<?php
$hostname='localhost';
$username='appcovid19';
$password='12345678';

$pdo = new PDO("mysql:host=$hostname;dbname=dbappcovid19",$username,$password);

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); // Add this line to set ERRMODE attribute with the EXCEPTION value like (attribute,value). The EXCEPTION value throw exceptions from DB...
// The object operator, -> , is used in object scope to access methods and properties of an object...

$stmt = $pdo->prepare("select * from accounts");
$stmt->execute();

$select = array();

while($data = $stmt->fetch(PDO::FETCH_ASSOC))
{
	array_push($select,$data);
}

echo json_encode($select);
?>