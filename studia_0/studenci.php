<?php
include('funkcje.php');

function wypisz_studenci(){
	// zmienna przechowująca uchwyt do bazy
	// uzyskany jako wynik mysql_connect()
	global $polaczenie;

	$zapytanie = "select * from studenci";	
	$wynik = mysqli_query($polaczenie, $zapytanie) or exit("Błąd w zapytaniu: ".$rozkaz);
	// gdy zapytanie nie wykona się poprawnie funkcja jest przerywana 
	//if(!$wynik) return;

  // generowanie formularza, nagłówków tabeli i przycisku dodawania nowego rekordu (studenta)
	$naglowki = array("Imię", "Nazwisko");
	print("<form method='POST'>");
	print("<b>Studenci</b><br>");
	print("<table border = 1><tr>");
	foreach($naglowki as $naglowek) print("<td><b>$naglowek</b></td>");
	// zapis name='przycisk[]' oznacza że po wysłaniu formularza
	// w tablicy danych przesyłanych metodą POST
	// będzie podtablica o nazwie 'przycisk', pod indeksem -1
	// zapisze się wartość 'Dodaj nowego' jeśli ten właśnie przycisk został wciśnięty
	print("<td align='center'><b><input type='submit' name='przycisk[-1]' value='Dodaj nowego'></b></td>");	
	print("</tr>");
  // generowanie pozostałych wierszy tabeli zawierających dane studentów
  // oraz przyciski do wykonania operacji na każdym z nich  
	while($wiersz = mysqli_fetch_row($wynik)){		
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
	mysqli_free_result($wynik);
}

function edytuj_studenta($nr = -1) {
	global $polaczenie;	
	
  // poniższy fragment ustawia wartości zmiennych imie i nazwisko
  // wyciągając z bazy dla studenta o podanym w parametrze numerze
	if($nr != -1) {
		$rozkaz = "select imie, nazwisko from studenci where numer=$nr;";
		$rekord = mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
                
                $student = mysqli_fetch_row($rekord);
                $imie = $student[0];
                $nazwisko = $student[1];
                
		//$imie = mysqli_result($rekord, 0, "imie");
		//$nazwisko = mysqli_result($rekord, 0, "nazwisko");
	}
	else {
		$imie=''; $nazwisko='';
	}
	
  // generuje formularz do edycji imienia i nazwiska studenta	
	echo " 
	<form method=POST action=''> 
	<table border=0>
	<tr>
	<td>Imię</td><td colspan=2>
	<input type=text name='imie' value='$imie' size=15 style='text-align: left'></td>
	</tr>
	<tr>
	<td>Nazwisko</td><td colspan=2>
	<input type=text name='nazwisko' value='$nazwisko' size=15 style='text-align: left'></td>
	</tr>
	<tr>
	<td colspan=3>
	<!-- <input type='hidden' name='numer' value='$nr'> -->
	<input type=submit name='przycisk[$nr]' value='Zapisz' style='width:200'></td>
	</tr>
	</table></form>";
}

function zapisz_studenta($nr) {
	global $polaczenie;
	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	if($nr != -1)
		$rozkaz = "update studenci set imie='$imie', nazwisko='$nazwisko' where numer=$nr;";
	else $rozkaz = "insert into studenci values(null, '$imie', '$nazwisko');";		
	mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);	
}

function usun_studenta($nr) {
	global $polaczenie;
	
	$rozkaz = "delete from studenci where numer=$nr;";		
	mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
}

?>

<html>
<head>
<meta charset="utf-8">
<title>Obsługa studentów</title>
</head>
<body bgcolor=yellow text="#000FFF">

<input type=button value=" STUDENCI " onClick="window.location='studenci.php'">
<form name=menu action='oceny.php'>
<input type=submit value=" OCENY "> 
</form>
<a href='przedmioty.php'> PRZEDMIOTY </a>

<hr>
<center>

<?php
print_r($_POST);
$polecenie = '';

if(isset($_POST['przycisk'])) {
	$polecenie = current($_POST['przycisk']);
	$nr = key($_POST['przycisk']);
}


otworz_polaczenie();

switch($polecenie) {
	case 'Edytuj': edytuj_studenta($nr); break;
	case 'Dodaj nowego': edytuj_studenta(); break;	
	case 'Usun': usun_studenta($nr); break;
	case 'Zapisz': zapisz_studenta($nr); break;
}

wypisz_studenci();
zamknij_polaczenie();
?>

</center>
</body>
</html>
