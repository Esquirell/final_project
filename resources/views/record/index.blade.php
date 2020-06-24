@extends('layouts.base')
@section('content')
    <header class="masthead bg-primary text-center min-vh-100">
        @if (Session::has('flash_message'))
            <div class="container">
                <div class="row justify-content-center">
                    <div class="alert alert-success">
                        {{ Session::get('flash_message') }}
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Запись на прием') }}</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('new-record') }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="doctor"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Врач') }}</label>

                                    <div class="col-md-6">

                                        <select id="doctor" class="form-control text-center" name="doctor" required>
                                            <option disabled selected>Выберите врача</option>
                                            @foreach($doctors as $doctor)
                                                <option value="{{$doctor->id}}">{{$doctor->user->name}} {{$doctor->user->surname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="disabled-days"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Дата приема') }}</label>

                                    <div class="col-md-6 d-flex justify-content-center" id="calendar">
                                        <input type="text" class="form-control text-center" id="datepicker" name="date" readonly>
                                        {{--<input type='text' id="disabled-days" class="datepicker-here form-control text-center" name="date">--}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="time"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Время приема') }}</label>

                                    <div class="col-md-6">
                                        <select id="time" type="text" class="form-control text-center" name="time" autofocus required>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Записаться') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </header>
@endsection

