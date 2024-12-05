@extends('layouts.app')
@section('content')
    <div class="centered-text">
        <p>
        <h1>{{ $pageTitle }}</h1>
        </p>
        @auth
            <div>
                <form action="{{ route('logoutUser') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @endauth
    </div>
    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Numero di Utenti
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $userCount }}</h5>
                        <p class="card-text">Numero totale di utenti nel sistema.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Numero di Esami
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $examCount }}</h5>
                        <p class="card-text">Numero totale di esami nel sistema.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Aggiungi Nuovo Esame
                    </div>
                    <div class="card-body">

                        <form action="{{ route('exams.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titolo Esame</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="form-group">
                                <label for="date">Data Esame</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Aggiungi Esame</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
