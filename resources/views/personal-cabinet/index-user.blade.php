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

        <div class="container">


            <div class="card form-group">
                <div class="card-header text-center">{{ __('Ваши данные') }}</div>
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

                    <form method="POST" action="{{ route('personal-cabinet.updateInfoAboutUser') }}">
                        @csrf
                        <div class="row">

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
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Сохранить') }}
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>

                </div>

            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 form-group justify-content-center d-flex">
                        <a class="btn btn-dark" href="{{route('personal-cabinet.indexRecords')}}">Ваши записи</a>
                    </div>
                </div>
            </div>
    </header>
@endsection
