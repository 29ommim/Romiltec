@extends('layouts.app')
@section('content')
    <div class="centered-text">
        <p>
        <h1>{{ $pageTitle }}</h1>
        @auth
            <p>Ciao {{ $user->name }}</p>
            <div>
                <form action="{{ route('logoutUser') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        @endauth
        </p>

    </div>
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @auth
            @if ($exams->isNotEmpty())
                <div class="container">
                    <h1>I tuoi esami</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome Esame</th>
                                <th>Data</th>
                                <th>Voto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exams as $examUser)
                                <tr>
                                    <td>{{ $examUser->exam->title }}</td>
                                    <td>{{ $examUser->exam->date }}</td>
                                    <td>{{ $examUser->grade }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        @endauth
    </div>
@endsection
