@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>All projects</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        @if(count($projects) > 0)
        <table class="table table-striped table-hover backBlue">
            <thead class="backDark">
                <th>#</th>
                <th>Ime</th>
                <th>Opis</th>
                <th>Cijena</th>
                <th>Obavljeni posao</th>
                <th>Datum početka</th>
                <th>Datum kraja</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                <tr>
                    <td>
                        <div>{{$project->id}}</div>
                    </td>
                    <td>
                        <div>{{$project->imeProjekta}}</div>
                    </td>
                    <td>
                        <div>{{$project->opisProjekta}}</div>
                    </td>
                    <td>
                        <div>{{$project->cijenaProjekta}}</div>
                    </td>
                    <td>
                        <div>{{$project->posaoObavljen}}</div>
                    </td>
                    <td>
                        <div>{{$project->datum_Pocetka}}</div>
                    </td>
                    <td>
                        <div>{{$project->datum_Zavrsetka}}</div>
                    </td>
                    <td><a class="link link1" href="{{ route('editproject', $project->id) }}">Uredi</a></td>
                    @if($project->Voditelj == Auth::user()->getId())
                    <td><a class="link link1" href="{{ route('users', $project->id) }}">Dodaj korisnika</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        No projects.
        @endif
    </div>
</body>

</html>
@endsection