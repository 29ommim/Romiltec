@extends('layouts.app')
@section('content')
    <div class="centered-text">
        <p>
        <h1>{{ $pageTitle }}</h1>
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="input-container">
            <input type="text" id="searchTitle" placeholder="Cerca per titolo" onkeyup="filterTable()">
            <input type="date" id="searchDate" onchange="filterTable()">
        </div>
        <table id="examTable">

            <tr>
                <th>Data</th>
                <th>Titolo</th>
            </tr>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{ $exam->date }}</td>
                    <td>{{ $exam->title }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
