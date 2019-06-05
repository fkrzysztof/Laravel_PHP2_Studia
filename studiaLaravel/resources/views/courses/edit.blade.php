@extends('main');
@section('content')
@if($przedmiot->id != -1)
<form method='POST' action="{{ route('przedmiots.update', $przedmiot->id) }}">
<input type="hidden" name="_method" value="PUT">
@else
<form method='POST' action="{{ route('przedmiots.store') }}">
@endif

@csrf
    <table border=0>
        <tr>
            <td>Nazwa</td><td colspan=2>
                <input type=text name='nazwa' value='{{$przedmiot->nazwa}}'
                size=15 style='text-align: left'></td>
            </tr>
            <tr>
                <td>Liczba godzin</td><td colspan=2>
                    <input type=text name='godzin' value='{{$przedmiot->godzin}}'
                    size=10 style='text-align: left'></td>
                </tr>
                <tr>
                    <td colspan='3'>
                        <input type=submit value='Zapisz' style='width:200'></td>
                    </tr>
                </table>
</form>
<div>
@if(count($errors) > 0)
    @foreach($errors->all()  as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
</div>
@endsection
