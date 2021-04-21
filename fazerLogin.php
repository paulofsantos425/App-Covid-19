<?php
include_once("config/dados.php");
include_once("config/conexao.php");

date_default_timezone_set("PORTUGAL");

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") 
{
	$email = $_POST["email"];
	$_SESSION["loggedin"] = false;
	$pass = $_POST["password"];
	$lastLogin = date("Y-m-d H:i:s", time());
	
	try 
	{
		$pdo = conexao();
		$query = $pdo->prepare("select * from accounts where lower(aemail)=lower(:email)");
		$query->bindParam(':email',$email);
		$query->execute();
		$row = $query->fetch(PDO::FETCH_ASSOC);
		$count = $query->rowCount();
		
		$pass2 = 12345678;
		
		if($count > 0)
		{
			if($pass==$pass2)
			{
				$_SESSION["loggedin"] = true;
				$_SESSION["myuserid"] = $row["aid"];
				$_SESSION["usermail"] = $row["aemail"];
				$_SESSION["usertype"] = $row["atype"];

				$query = $pdo->prepare("update accounts set alastlogin='".$lastLogin."' where aid=:id");
				$query->bindParam(':id', $_SESSION["myuserid"]);
				$query->execute();
								
				echo "logadoFuncionario";
			}
			else
			{
				echo "naoLogadoPassword";
			}
		}
		else
		{
			echo "naoLogadoEmail";
		}
	}
	catch(Exception $e) 
	{
		echo("error:" . $e->getMessage());
	}
	
	$pdo = null;
}
?>