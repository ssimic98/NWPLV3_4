@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header loginHeader">Uredi projekt <strong>{{$project->imeProjekta}}</strong> </div>
                <div class="card-body loginCard">
                    <form method="POST" action="{{ route('saveproject', $project->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        @if($project->Voditelj == Auth::user()->getId())
                        <div class="form-group row">
                            <label for="imeProjekta">Ime: </label>
                            <input class="form-control" type="text" name="imeProjekta" id="imeProjekta" value="{{$project->imeProjekta}}" required>
                        </div>
                        <div class="form-group row">
                            <label for="opisProjekta">Opis: </label>
                            <textarea class="form-control" rows=5 name="opisProjekta" id="opisProjekta" required>{{$project->opisProjekta}}</textarea>
                        </div>
                        <div class="form-group row">
                            <label for="cijenaProjekta">Cijena: </label>
                            <input class="form-control" type="number" name="cijenaProjekta" id="cijenaProjekta" value="{{$project->cijenaProjekta}}" required>
                        </div>
                        <div class="form-group row">
                            @endif
                            <label for="posaoObavljen">Obavljeni posao: </label>
                            <textarea class="form-control" rows=5 name="posaoObavljen" id="posaoObavljen" required> {{$project->posaoObavljen}}</textarea>
                        </div>
                        @if($project->Voditelj == Auth::user()->getId())
                        <div class="form-group row">
                            <label for="datum_Pocetka">Datum početka: </label>
                            <input class="form-control" type="datetime-local" name="datum_Pocetka" id="datum_Pocetka" value="{{$project->datum_Pocetka}}" required>
                        </div>
                        <div class="form-group row">
                            <label for="datum_Zavrsetka">Datum kraja: </label>
                            <input class="form-control" type="datetime-local" name="datum_Zavrsetka" id="datum_Zavrsetka" value="{{$project->datum_Zavrsetka}}" required>
                        </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Potvrdi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection