@extends('main')
@section('content')
@php $naglowki = array("Nazwa", "Liczba godzin") @endphp
<b>Przedmioty</b><br>
<table border = 1><tr>
    @foreach($naglowki as $naglowek)
    <td><b>{{ $naglowek }}</b></td>
    @endforeach
    <td align='center'>
        <form method='GET' action='/przedmiots/create'>
            <b><input type='submit' value='Dodaj nowy'></b>
        </form>
    </td></tr>
    @foreach($przedmioty as $przedmiot)
    <tr>
        @foreach($przedmiot->getAttributes() as $p=>$pole)
        @if($p != 'id')<td>{{$pole}}</td>@endif
        @endforeach
        <td align='center'>

            <form method='GET' action='/przedmiots/{{$przedmiot->id}}/edit'
                style='display:inline'>
                <input type='submit' value='Edytuj'>
            </form>

            <form method='POST' action='/przedmiots/{{$przedmiot->id}}'
                style='display:inline'>
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type='submit' value='Usun'>
            </form>

        </td></tr>
        @endforeach
    </table>
    @endsection
