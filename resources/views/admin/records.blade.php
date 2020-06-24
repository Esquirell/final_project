@extends('layouts.base')

@section('content')
    <header class="masthead bg-primary min-vh-100">
        @if (Session::has('flash_message'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                </div>
            </div>
        @endif
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
                            <th>Доктор</th>
                            <th>Дата приема</th>
                            <th>Удалить</th>
                            </thead>
                            <tbody class="">
                            @foreach($records as $record)
                                <tr>
                                    <td class="align-middle">{{$record->id}}</td>
                                    <td class="align-middle">{{$record->user->name}} {{$record->user->surname}}</td>
                                    <td class="align-middle">{{$record->doctor->user->name}} {{$record->doctor->user->surname}}</td>
                                    <td class="align-middle">{{$record->reception}}</td>
                                    <td class="align-middle">
                                        <form style="margin: 0" method="post"
                                              action="{{route('admin-panel.deleteRecord', ['record' => $record->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs" data-title="Delete">X
                                            </button>
                                        </form>
                                    </td>
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
