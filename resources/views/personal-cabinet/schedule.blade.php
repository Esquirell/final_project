@extends('layouts.base')

@section('content')
    <header class="masthead bg-primary min-vh-100">
        <div class="container">
            <div class="row">


                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="mytable" class="table table-hover table-dark">
                            <thead>
                            <th>ID</th>
                            <th>Дата приема</th>
                            </thead>
                            <tbody class="">
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td class="align-middle">{{$schedule->id}}</td>
                                    <td class="align-middle">{{$schedule->reception}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
