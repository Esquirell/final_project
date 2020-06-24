@extends('layouts.base')

@section('content')
    <header class="masthead bg-primary min-vh-100">
        <div class="container">
            <a class="btn btn-dark btn-xs" href="{{route('pdf', ['id' => $record->id])}}">Скачать в пдф</a>
        </div>
        <div class="container bg-light p-4">
            <div class="d-flex align-items-center justify-content-between p-2">
                <h3>Доктор - {{$record->doctor->user->name}} {{$record->doctor->user->surname}}</h3>
                <img src="{{asset($record->doctor->user->avatar)}}" style="border: 2px solid #1abc9c"
                     class="img-fluid rounded-circle" width="120" height="120" alt="">
            </div>
            <div class="d-flex align-items-center justify-content-between p-2">
                <h3>Пациент - {{$record->user->name}} {{$record->user->surname}}</h3>
                <img src="{{asset($record->user->avatar)}}" style="border: 2px solid #1abc9c"
                     class="img-fluid rounded-circle" width="120" height="120" alt="">
            </div>
            <div class="d-flex align-items-center justify-content-between p-2">
                <h3>Время приема</h3>
                <h3>{{$record->reception}}</h3>
            </div>
            <div class="d-flex text-center align-items-center justify-content-center" style="margin-top: 65px">
                <h3>
                    Неболейка, 2020
                </h3>
                <img src="{{asset('img/portfolio/shtamp.png')}}"
                     class="img-fluid rounded-circle" width="150" height="150" alt="">
            </div>

        </div>

    </header>
@endsection
