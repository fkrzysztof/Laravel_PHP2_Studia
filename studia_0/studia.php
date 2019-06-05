<?php
// skrypt będzie korzystał z funkcji zdefiniowanych w tym pliku
include('funkcje.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Obsługa studentów</title>
</head>

<?php
// jeśli jeszcze nie istnieje 
// tworzona jest odpowiednia struktura bazy danych 
// wraz z danymi testowymi
utworz_baze();
?>

<body bgcolor=yellow text="#000FFF">

<!-- 1. przycisk ładujący stronę odpowiedzialną za zarządzanie studentami -->
<input type=button value=" STUDENCI " 
       onClick="window.location='studenci.php'">
<br><br>
<!-- 2. formularz ładujący stronę odpowiedzialną za zarządzanie ocenami -->
<form name=menu action='oceny.php'>
<input type=submit value=" OCENY "> 
</form>
<!-- 3. odsyłacz (link) do strony odpowiedzialnej za zarządzanie przedmiotami -->
<a href='przedmioty.php'> PRZEDMIOTY </a>

<hr>
</body>
</html>
