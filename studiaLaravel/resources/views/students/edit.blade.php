@extends('main')
@section('content')
<form method='POST' action="{{ route('update', $student->id) }}">
    @csrf
    <table border=0>
        <tr>
            <td>Imię</td>
            <td colspan=2>
                <input type=text name='imie' value='{{$student->imie}}'
                size=15 style='text-align: left'>
            </td>
        </tr>
        <tr>
            <td>Nazwisko</td>
            <td colspan=2>
                <input type=text name='nazwisko' value='{{$student->nazwisko}}'
                size=15 style='text-align: left'>
            </td>
        </tr>
        <tr>
            <td colspan='3'>
                <input type=submit name='przycisk[{{$student->id}}]' value='Zapisz'
                style='width:200'>
            </td>
        </tr>
    </table>
</form>
@endsection
