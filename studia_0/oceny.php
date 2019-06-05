<?php
include('funkcje.php');

function wypisz_oceny(){
	global $polaczenie;

	$zapytanie = "select studenci.numer, przedmioty.numer, imie, nazwisko, nazwa, ocena from studenci,przedmioty,oceny 
                      where studenci.numer=oceny.nr_stud and przedmioty.numer=oceny.nr_przed;";
	$wynik = mysqli_query($polaczenie, $zapytanie);
	//if(!$wynik) return;

	$naglowki = array("Imię", "Nazwisko", "Przedmiot", "Ocena");
	print("<form method='POST'>");
	print("<b>Oceny studentów</b><br>");
	print("<table border = 1><tr>");
	foreach($naglowki as $naglowek)
		print("<td><b>$naglowek</b></td>");
	print("<td align='center'><b><input type='submit' name='przycisk[][]' value='Nowa ocena'></b></td>");	
	print("</tr>");
	
	while($wiersz = mysqli_fetch_row($wynik)){		
			print("<tr>");
			foreach($wiersz as $p=>$pole)
				if($p > 1) print("<td>" . $pole . "</td>");
			print("<td align='center'><input type='submit' name='przycisk[".$wiersz[0]."][".$wiersz[1]."]' value='Edytuj'>
									  <input type='submit' name='przycisk[".$wiersz[0]."][".$wiersz[1]."]' value='Usuń'></td>");	
			print("</tr>");		
	}
	print("</table>");
    print("</form>");
	mysqli_free_result($wynik);
}

function edytuj_ocene($nr_stud,$nr_przed) {
	global $polaczenie;	
	
	$rozkaz = "select * from studenci";
	$rekord = mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
	while($wynik = mysqli_fetch_row($rekord)){
		$studenci[$wynik[0]] = $wynik[1].' '.$wynik[2];
	}
	$rozkaz = "select * from przedmioty";
	$rekord = mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
	while($wynik = mysqli_fetch_row($rekord)){
		$przedmioty[$wynik[0]] = $wynik[1];
	}
	
	if($nr_stud != null) {	
		$rozkaz ="select ocena from oceny 
				  where nr_stud=$nr_stud and nr_przed=$nr_przed";		
		$ocena=mysqli_fetch_row( mysqli_query($polaczenie, $rozkaz)) or exit("Błąd w zapytaniu: ".$rozkaz);	
		$ocena = $ocena[0];
	}
	else $ocena=''; 

	echo " 
	<form method=POST action=''> 
	<table border=0>
	
	<tr>		
	<td>Student</td><td colspan=2>
	<input type=text name='student' value='$nr_stud' 
		   size=15 style='text-align: left'>
	</td>
	</tr>	
	
	<tr>
	<td>Przedmiot</td><td colspan=2>
	<input type=text name='przedmiot' value='$nr_przed' 
		   size=15 style='text-align: left'>
	</td>
	</tr>
	
	<tr>
	<td>Ocena</td><td colspan=2>
	<input type=text name='ocena' value='$ocena' 
	size=15 style='text-align: left'></td>
	</tr>
	
	<tr>
	<td colspan=3>	
	<input type=submit name='przycisk[$nr_stud][$nr_przed]' value='Zapisz' 
	style='width:200'></td>
	</tr>
	
	</table></form>";
}

function zapisz_ocene() {
	global $polaczenie;
	$studentID = $_POST['student'];
	$przedmiotID = $_POST['przedmiot'];
	$ocena = $_POST['ocena'];
	$rozkaz="select ocena from oceny where nr_stud=$studentID and nr_przed=$przedmiotID";
	$wynik=mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
	$wynik=mysqli_num_rows($wynik);
	if($wynik==0)
		$rozkaz = "insert into oceny values($studentID, $przedmiotID, $ocena);";
	else
		$rozkaz = "update oceny set ocena=$ocena where nr_stud=$studentID
		and nr_przed=$przedmiotID ;";	
	mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);	
}

function usun_ocene($nr_stud, $nr_przed) {
	global $polaczenie;
	
	$rozkaz = "delete from oceny where nr_stud=$nr_stud and nr_przed=$nr_przed;";		
	mysqli_query($polaczenie, $rozkaz) or exit("Błąd w zapytaniu: ".$rozkaz);
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250">
<title>Obsługa studentów</title>
</head>
<body bgcolor=yellow text="#000FFF">

<input type=button value=" STUDENCI " onClick="window.location='studenci.php'">
<form name=menu action='oceny.php'>
<input type=submit value=" OCENY "> 
</form>
<a href='przedmioty.php'> PRZEDMIOTY </a>
<hr><center>

<?php
//print_r($_POST);
$polecenie = '';
if(isset($_POST['przycisk'])) {
	$polecenie = current(current($_POST['przycisk']));	
	$nr = key($_POST['przycisk']);			// nr studenta
	$nr2 = key($_POST['przycisk'][$nr]);	// nr przedmiotu
}

otworz_polaczenie();

switch($polecenie) {
	case 'Usuń': usun_ocene($nr, $nr2);
	case 'Nowa ocena': edytuj_ocene(null,null); break;
	case 'Edytuj': edytuj_ocene($nr,$nr2); break;
	case 'Zapisz': zapisz_ocene(); break;
}

wypisz_oceny();
zamknij_polaczenie();
?>

</center>
</body>
</html>
