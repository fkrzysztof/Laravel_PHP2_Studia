<?php
include "studia.php";

class Student
{
	private $id;
	private $imie;
	private $nazwisko;
	
	static function wypiszWszystkie()
	{
		$polaczenie = Studia::otworzPolaczenie();
		$zapytanie = "select * from studenci";
		$wynik = $polaczenie->query($zapytanie)
			or exit("Blad w zaptaniu $zapytanie");
			
			
			
		$naglowki = array("Imię", "Nazwisko");
		print("<form method='POST'>");
		print("<b>Studenci</b><br>");
		print("<table border = 1><tr>");
		foreach($naglowki as $naglowek) 
			print("<td><b>$naglowek</b></td>");
		// zapis name='przycisk[]' oznacza że po wysłaniu formularza
		// w tablicy danych przesyłanych metodą POST
		// będzie podtablica o nazwie 'przycisk', pod indeksem -1
		// zapisze się wartość 'Dodaj nowego' jeśli ten właśnie przycisk został wciśnięty
		print("<td align='center'><b><input type='submit' name='przycisk[-1]' value='Dodaj nowego'></b></td>");	
		print("</tr>");
	    // generowanie pozostałych wierszy tabeli zawierających dane studentów
	    // oraz przyciski do wykonania operacji na każdym z nich  
		while($wiersz = $wynik->fetch()){		
				print("<tr>");
				foreach($wiersz as $p=>$pole)
					if($p != 0) print("<td>" . $pole . "</td>");
			  // wciśnięcie przycisku ustawi odpowiednią nazwę operacji do wykonania
			  // jako wartość elementu 'przycisk[id]', gdzie id jest numerem odpowiedniego wiersza
				print("<td align='center'><input type='submit' name='przycisk[".$wiersz[0]."]' value='Edytuj'>
										  <input type='submit' name='przycisk[".$wiersz[0]."]' value='Usun'></td>");	
				print("</tr>");		
		}
		print("</table>");
		print("</form>");
		$wynik->closeCursor();
				
				
			
			
	}
}

?>