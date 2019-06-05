@extends('main')
@section('content')

@if($ocena->id != -1)
    <form method='POST' action="{{ route('ocenas.update', $ocena->id) }}">
    <input type="hidden" name="_method" value="PUT">
@else
    <form method='POST' action="{{ route('ocenas.store') }}">
@endif

    @csrf
    <table border=0>
        <tr>
            <td>Imie</td><td colspan=2>
                <input type=text name='imie' value='{{$ocena->imie}}' size=15 style='text-align: left'>
            </td>
        </tr>
        <tr>
            <td>Nazwisko</td><td colspan=2>
                <input type=text name='nazwisko' value='{{$ocena->nazwisko}}' size=15 style='text-align: left'>
            </td>
        </tr>
        <tr>
            <td>Przedmiot</td><td colspan=2>
                <input type=text name='przedmiot' value='{{$ocena->przedmiot}}' size=15 style='text-align: left'>
            </td>
        </tr>
        <tr>
            <td>Ocena</td><td colspan=2>
                <input type=text name='ocena' value='{{$ocena->ocena}}' size=15 style='text-align: left'>
            </td>
        </tr>

        <tr>
            <td colspan='3'>
                <input type=submit value='Zapisz' style='width:200'>
            </td>
        </tr>
    </table>
</form>


@if(count($errors) > 0)
    @foreach($errors->all()  as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
</div>
@endsection
