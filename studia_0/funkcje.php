<?php

function otworz_polaczenie(){
	global $polaczenie;
	$serwer = "127.0.0.1";
	$uzytkownik = "root";
	$haslo = "";
	$baza = "studia";

	$polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo) or exit("Nieudane połączenie z serwerem");	
	mysqli_select_db($polaczenie, $baza) or exit("Nieudane połączenie z bazą");
	mysqli_set_charset($polaczenie, "utf-8");
}

function zamknij_polaczenie(){
	global $polaczenie;
	mysqli_close($polaczenie);
}

function utworz_baze() {
	global $polaczenie;
	$serwer = "127.0.0.1";
	$uzytkownik = "root";
	$haslo = "";
	$baza = "studia";
	$polaczenie = mysqli_connect($serwer, $uzytkownik, $haslo) or exit("Nieudane połączenie z serwerem");	
	
	mysqli_query($polaczenie, "CREATE DATABASE `$baza` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;");
	$error = mysqli_errno($polaczenie);
	if($error != 0) {
		//if($error == 1007) echo "Baza dla serwisu już istnieje<br>"; 
		if($error != 1007) { echo "Błąd w zapytaniu tworzącym bazę<br>"; return false; }
	}
	else echo "Tworze baze danych '$baza' ... <br>";
	
	mysqli_select_db($polaczenie, $baza) or exit("Nieudane połączenie z bazą");
	mysqli_set_charset($polaczenie, "utf-8");
	
	utworz_tabele();
	wstaw_dane_testowe();
	zamknij_polaczenie();
}

function utworz_tabele() {
	global $polaczenie;
	
	$rozkaz = 	"create table przedmioty " .
				"(numer int NOT NULL AUTO_INCREMENT ," .
				"nazwa varchar(32), " .	
				"godzin int, PRIMARY KEY (`numer`))";
	mysqli_query($polaczenie, $rozkaz);	//or exit("Błąd w zapytaniu: ".$rozkaz);
	//echo mysqli_errno($polaczenie);
	$error = mysqli_errno($polaczenie);
	if($error != 0) {
		// 1050 to błąd, że tabela już istnieje, jego ignoruję
		if($error != 1050) { echo "Błąd w zapytaniu: $rozkaz<br>"; return false; }	
	} else echo "Utworzono tabelę przedmiotów<br>";
	
	$rozkaz = 	"create table studenci " .
				"(numer int NOT NULL AUTO_INCREMENT ," .
				"imie varchar(32), " .	
				"nazwisko varchar(32), " .	
				"PRIMARY KEY (`numer`))";
	mysqli_query($polaczenie, $rozkaz);
	$error = mysqli_errno($polaczenie);
	if($error != 0) {
		if($error != 1050) { echo "Błąd w zapytaniu: $rozkaz<br>"; return false; }	
	} else echo "Utworzono tabelę studentów<br>";
	
	$rozkaz = 	"create table oceny " .
				"(nr_stud int NOT NULL, " .
				"nr_przed int NOT NULL, " .	
				"ocena float " .	
				")";
	mysqli_query($polaczenie, $rozkaz);
	$error = mysqli_errno($polaczenie);
	if($error != 0) {
		if($error != 1050) { echo "Błąd w zapytaniu: $rozkaz<br>"; return false; }	
	} else echo "Utworzono tabelę ocen<br>";
}

function wstaw_dane_testowe() {
	// wypełnia tabele danych tylko gdy są puste
	global $polaczenie;
	
	$test = mysqli_query($polaczenie, "select * from przedmioty;");
	if(mysqli_num_rows($test) == 0) {
		$rozkazy = array("insert into przedmioty values(null, 'Programowanie', 30);",
						 "insert into przedmioty values(null, 'Szydełkowanie', 20);",
						 "insert into przedmioty values(null, 'Pływanie', 50);");	
		foreach($rozkazy as $rozkaz)
			mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);		   
	}
	
	$test = mysqli_query($polaczenie, "select * from studenci;");
	if(mysqli_num_rows($test) == 0) {
	$rozkazy = array("insert into studenci values(null, 'Jan', 'Smith');",
					 "insert into studenci values(null, 'Agnieszka', 'Bond');",
					 "insert into studenci values(null, 'Monika', 'Ratownik');");
	foreach($rozkazy as $rozkaz)				 
		mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
	}
	
	$test = mysqli_query($polaczenie, "select * from oceny;");
	if(mysqli_num_rows($test) == 0) {
	$rozkazy = array("insert into oceny values(1, 1, 4.0);",
				     "insert into oceny values(1, 2, 5.5);",
					 "insert into oceny values(3, 3, 5.0);");			   
	foreach($rozkazy as $rozkaz)				 
		mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
	}
}

?>