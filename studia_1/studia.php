<?php
class Studia
{
	static function naglowek()
	{
		echo "
			<!DOCTYPE html>
			<html>
			<head>
			<meta charset='utf-8'>
			<title>Obsługa studentów</title>
			</head>
			<body bgcolor=yellow text='#000FFF'>
			";
	}	
	static function stopka()
	{
		echo "
			</center>
			<hr>
			</body>
			</html>
			";
	}
	static function menu()
	{
		echo "
			<input type=button value=' STUDENCI ' 
				   onClick='window.location=\"studenci.php\"'>
			<br><br>
			<form name=menu action='oceny.php'>
			<input type=submit value=' OCENY '> 
			</form>
			<a href='przedmioty.php'> PRZEDMIOTY </a>
			<center>
			";
	}

	static function otworzPolaczenie()
	{
		$serwer = "127.0.0.1";
		$uzytkownik = "root";
		$haslo = "";
		$baza = "studia";
		
		try
		{
		$polaczenie = new PDO("mysql:host=$serwer;dbname=$baza", $uzytkownik, $haslo);
		}
		catch(PDOException $e) { echo $e->getMessage(); }
		
		return $polaczenie;
	}
	
	
}
?>






