@extends('layouts.base')
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
        <form method="POST" action="{{ route('admin-panel.addDoctor') }}">
            @csrf
            <div class="form-group row">
                <label for="disabled-days"
                       class="col-md-4 col-form-label text-md-right">{{ __('Введите почту') }}</label>

                <div class="col-md-6 d-flex justify-content-center">
                    <input id="user_email" type="text" class="form-control" name="user_email">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Назначить врачом') }}
                    </button>
                    {{--<input type='text' id="disabled-days" class="datepicker-here form-control text-center" name="date">--}}
                </div>
            </div>
        </form>
        <form method="POST" action="{{ route('admin-panel.deleteDoctor') }}">
            @csrf
            <div class="form-group row">
                <label for="disabled-days"
                       class="col-md-4 col-form-label text-md-right">{{ __('Введите почту') }}</label>

                <div class="col-md-6 d-flex justify-content-center">
                    <input id="user_email" type="text" class="form-control" name="user_email">
                    <button type="submit" class="btn btn-dark">
                        {{ __('Удалить врача') }}
                    </button>
                    {{--<input type='text' id="disabled-days" class="datepicker-here form-control text-center" name="date">--}}
                </div>
            </div>

        </form>
        <div class="col-md-12 mt-3">
            <a class="btn btn-dark" href="{{route('admin-panel.indexRecords')}}">Просмотреть все записи</a>
        </div>

    </div>
    {{--<a class="btn btn-dark" href="{{route('admin-panel.generateSchedule')}}">Сгенерировать расписание врачей</a>
    <a class="btn btn-dark" href="{{route('admin-panel.deleteTime')}}">Удалить время</a>--}}
</header>

