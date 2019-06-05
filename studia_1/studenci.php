<?php

include "student.php";


Studia::naglowek();
Studia::menu();

print_r($_POST);
$polecenie = '';

if(isset($_POST['przycisk'])) {
	$polecenie = current($_POST['przycisk']);
	$nr = key($_POST['przycisk']);
}


$student = Student::getStudent($nr); // zwraca obiekt wybranego jako podmiot wybranej operacji studenta 

switch($polecenie) {
	case 'Edytuj': $student->edytuj(); break;
	case 'Dodaj nowego': Student::nowy(); break;	
	case 'Usun': $student->usun(); break;
	case 'Zapisz': $student->zapisz(); break;
}


Student::wypiszWszystkie();

Studia::stopka();

?>