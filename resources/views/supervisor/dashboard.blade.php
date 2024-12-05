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
    <div class="container">
        <h1>Assegna Voti agli Esami</h1>

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

        <form action="{{ route('examuser.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">Seleziona Utente</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="">Seleziona un utente</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exam_id">Seleziona Esame</label>
                <select class="form-control" id="exam_id" name="exam_id" required>
                    <option value="">Seleziona un esame</option>
                    @foreach ($exams as $exam)
                        <option value="{{ $exam->id }}">{{ $exam->title }} - {{ $exam->date }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grade">Voto</label>
                <input type="number" class="form-control" id="grade" name="grade" min="0" max="100"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Assegna Voto</button>
        </form>
    </div>
@endsection
