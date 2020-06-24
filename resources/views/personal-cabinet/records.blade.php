@extends('layouts.base')

@section('content')
    <header class="masthead bg-primary min-vh-100">
        <div class="container d-flex justify-content-center">
            {{$records->render()}}
        </div>
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-hover table-dark">
                            <thead>
                            <th>ID</th>
                            <th>Пациент</th>
                            @if(!in_array('doctor', json_decode(Auth::user()->role)))
                                <th>Доктор</th>
                            @endif
                            <th>Дата приема</th>
                            <th>Подробнее</th>
                            </thead>
                            <tbody class="">
                            @if (in_array('doctor', json_decode(Auth::user()->role)))
                                @foreach($records as $record)
                                    <tr>
                                        <td class="align-middle">{{$record->id}}</td>
                                        <td class="align-middle">{{$record->user->name}} {{$record->user->name}}</td>
                                        <td class="align-middle">{{$record->reception}}</td>
                                        <td class="align-middle">
                                            <a class="btn btn-primary btn-xs" href="{{route('personal-cabinet.showRecord', ['record' => $record->url])}}">+</a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                @foreach($records as $record)
                                    <tr>
                                        <td class="align-middle">{{$record->id}}</td>
                                        <td class="align-middle">{{$record->user->name}} {{$record->user->surname}}</td>
                                        <td class="align-middle">{{$record->doctor->user->name}} {{$record->doctor->user->surname}}</td>
                                        <td class="align-middle">{{$record->reception}}</td>
                                        <td class="align-middle">
                                            <a class="btn btn-primary btn-xs" href="{{route('personal-cabinet.showRecord', ['record' => $record->url])}}">+</a>
                                        </td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
