@extends('main')
@section('content')

{{-- jak zdefiniować zmienną? --}}
@php $naglowki = array("Imię", "Nazwisko") @endphp
<form method='POST'>
    @csrf
    <b>Studenci</b><br>
    <table border = 1><tr>

        @foreach($naglowki as $naglowek)
        <td><b>{{ $naglowek }}</b></td>
        @endforeach
        <td align='center'>
            <b>
                <input type='submit' value='Dodaj nowego' onClick='action="/studenci/edit/-1"'>
            </b>
        </td>
        </tr>

        @foreach($students as $student)
        <tr>
            @foreach($student->getAttributes() as $p=>$pole)
            @if($p != 'id')
            <td>{{$pole}}</td>
            @endif
            @endforeach
            <td align='center'>
                <input type='submit' value='Edytuj' onClick="action='/studenci/edit/{{$student->id}}'">
                <input type='submit' value='Usuń' onClick='action="/studenci/destroy/"+{{$student->id}}'>
            </td>
            </tr>
            @endforeach
        </table>
    </form>
@endsection
