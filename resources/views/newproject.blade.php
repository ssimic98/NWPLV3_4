@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <title>New project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Novi projekt</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('project') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="ime">Ime: </label>
                            <input class="form-control" type="text" name="ime" id="ime" required>
                        </div>
                        <div class="form-group row">
                            <label for="opis">Opis: </label>
                            <textarea class="form-control" rows=5 name="opis" id="opis" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="cijena">Cijena: </label>
                            <input class="form-control" type="number" name="cijena" id="cijena" required>
                        </div>
                        <div class="form-group row">
                            <label for="obavljen">Obavljeni poslovi: </label>
                            <textarea class="form-control" rows=5 name="obavljen" id="obavljen" required></textarea>
                        </div>
                        <div class="form-group row">
                            <label for="datumPocetka">Datum početka: </label>
                            <input class="form-control" type="datetime-local" name="datumPocetka" id="datumPocetka" required>
                        </div>
                        <div class="form-group row">
                            <label for="datumZavrsetka">Datum kraja: </label>
                            <input class="form-control" type="datetime-local" name="datumZavrsetka" id="datumZavrsetka" required>
                        </div>
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