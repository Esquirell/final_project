@extends('layouts.base')
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
    <div class="d-none" data-min_time="{{$doctorMinTime}}" data-max_time="{{$doctorMaxTime}}"></div>

    <div class="container">


        <div class="card form-group">
            <div class="card-header text-center">{{ __('Расписание врача') }}</div>
            <div class="card-body">
                <div class="text-center">
                    <img src="{{asset($user->avatar)}}" style="border: 2px solid #1abc9c"
                         class="img-fluid rounded-circle" width="240" height="240" alt="">
                </div>
                <div class="d-flex justify-content-center" style="margin-bottom: 30px">
                    <form method="post" action="{{ route('personal-cabinet.updateAvatar') }}" enctype="multipart/form-data">
                        <input class="" name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input class="" type="file" multiple name="file">
                        <button class="btn btn-primary" type="submit">Загрузить</button>
                    </form>
                </div>
                <form method="POST" action="{{ route('personal-cabinet.updateInfoAboutDoctor') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                           value="Monday" name="days[]"
                                           @if(in_array('Monday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Понедельник</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                           value="Tuesday" name="days[]"
                                           @if(in_array('Tuesday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox2">Вторник</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                           value="Wednesday" name="days[]"
                                           @if(in_array('Wednesday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox3">Среда</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox4"
                                           value="Thursday" name="days[]"
                                           @if(in_array('Thursday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox4">Чертверг</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5"
                                           value="Friday" name="days[]"
                                           @if(in_array('Friday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox5">Пятница</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6"
                                           value="Saturday" name="days[]"
                                           @if(in_array('Saturday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox6">Суббота</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox7"
                                           value="Sunday" name="days[]"
                                           @if(in_array('Sunday', $doctorDays)) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox7">Воскресенье</label>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 form-group">
                            <div class="form-group row">
                                <label for="min_time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Начало работы') }}</label>
                                <div class="col-md-6">
                                    <select id="min_time" type="text" class="form-control text-center" name="min_time"
                                            autofocus required>
                                        {{--@for($i = 0; $i <= 24; ++$i)
                                            @if ($i.':00' == $doctorMinTime))
                                            <option value="{{$i.':00'}}" selected>{{$i.':00'}}</option>
                                            @else
                                                <option value="{{$i.':00'}}">{{$i.':00'}}</option>
                                            @endif
                                        @endfor--}}
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="max_time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Конец работы') }}</label>
                                <div class="col-md-6">
                                    <select id="max_time" type="text" class="form-control text-center" name="max_time"
                                            autofocus required>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label for="user_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Ваше имя') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="user_name"
                                              name="user_name">{{$user->name}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="user_surname"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Ваша фамилия') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="user_surname"
                                              name="user_surname">{{$user->surname}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Ваше описание') }}</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="description"
                                              name="description">{{$doctorDescription}}</textarea>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row mb-0 justify-content-center">
                                <a class="btn btn-dark" href="{{route('personal-cabinet.generateSchedule')}}">Сгенерировать
                                    расписание на 7
                                    дней</a>
                            </div>
                        </div>

                    </div>

                </form>

            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 form-group justify-content-center d-flex">
                    <a class="btn btn-dark" href="{{route('personal-cabinet.indexSchedule')}}">Расписание</a>
                </div>
                <div class="col-lg-6 form-group justify-content-center d-flex">
                    <a class="btn btn-dark" href="{{route('personal-cabinet.indexRecords')}}">Ваши записи</a>
                </div>
            </div>
        </div>
</header>
