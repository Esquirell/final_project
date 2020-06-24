<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Неболейка</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{--<link href="{{asset('css/date.css')}}" rel="stylesheet" type="text/css">--}}
<!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('styles.css')}}" rel="stylesheet"/>
    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
</head>
<body id="page-top">

<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('main')}}">Неболейка</a>
        <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                     href="{{route('main')}}#portfolio">Наши врачи</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                     href="{{route('main')}}#about">О нас</a></li>
                <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                     href="{{route('record')}}">Запись на прием</a></li>
                @guest
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                         href="{{ route('login') }}">Вход</a></li>
                    @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1"><a
                                class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                href="{{ route('register') }}">Регистрация</a>
                        </li>
                    @endif
                @else
                    @role('admin')
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                         href="{{route('admin-panel')}}">Админ панель</a></li>
                    @endrole

                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                         href="{{route('personal-cabinet')}}">Личный кабинет</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                                                         href="#contact2" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                @endguest

            </ul>
        </div>
    </div>
</nav>

@yield('content')
<div class="scroll-to-top d-lg-none position-fixed">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i
            class="fa fa-chevron-up"></i></a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
{{--<script src="{{asset('js/date.js')}}"></script>--}}

<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(1000)
</script>
<script>
    /* Локализация datepicker */
    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: 'Предыдущий',
        nextText: 'Следующий',
        currentText: 'Сегодня',
        monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
        dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
        dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
        dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
        weekHeader: 'Не',
        dateFormat: 'yy-mm-dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);


</script>
<script>


</script>

<script>
    $(function () {
        $('#doctor').change(function () {
            var doctor = $(this).val();
            $.ajax({
                url: '{{ route('record-query-days') }}',
                type: "POST",
                data: {doctor: doctor},
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {

                    $('#time').html('');
                    var calendar = '<input type="text" class="form-control text-center" id="datepicker" name="date" required readonly>';
                    $('#calendar').html(calendar).fadeIn();
                    $(function () {
                        var date = new Date();
                        date.setDate(date.getDate() + 1);
                        $("#datepicker").datepicker({
                            minDate: date,
                        });

                    });

                    var holidays = data;
                    console.log(holidays);
                /*&& holidays[i][2] == date.getDate()*/

                    $("#datepicker").datepicker({
                        beforeShowDay: function (date) {
                            for (var i = 0; i < holidays.length; i++) {
                                if (holidays[i][0] == date.getDate() && holidays[i][1] - 1 == date.getMonth() && holidays[i][2] == date.getFullYear()) {
                                    return [true];
                                }
                            }
                            return [false];
                        }
                    });

                    $('#datepicker').change(function () {
                        var date = $(this).val();

                        $.ajax({
                            url: '{{ route('record-query-time') }}',
                            type: "POST",
                            data: {date: date, doctor: doctor},
                            headers: {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (data) {
                                console.log(data);
                                var work_time = '';
                                for (let i = 0; i < data['work_time'].length; i++) {
                                    work_time = work_time + '<option value="' + data['work_time'][i] + '">' + data['work_time'][i] + '</option>';
                                }

                                $('#time').html(work_time);
                            }


                        });
                    });

                },
                error: function (msg) {
                    alert('Ошибка');
                }
            });
        });


    });

</script>



<script>
    var min_time = $('div.d-none').data('min_time');
    var max_time = $('div.d-none').data('max_time');

    console.log(min_time);

    var str1 = '';
    var str2 = '';
    for (var i = 0; i < 24; ++i) {
        if (i + ':00' == min_time || '0' + i + ':00' == min_time) {
            if (i < 10) {
                str1 = str1 + '<option value="0' + i + ':00" selected>0' + i + ':00</option>';
                console.log(str1);
            } else {
                str1 = str1 + '<option value="' + i + ':00" selected>' + i + ':00</option>';
            }
        } else {
            if (i < 10) {
                str1 = str1 + '<option value="0' + i + ':00">0' + i + ':00</option>';
            } else {
                str1 = str1 + '<option value="' + i + ':00">' + i + ':00</option>';
            }
        }
        if (i + ':00' == min_time || '0' + i + ':00' == min_time) {
            for (var j = i + 1; j < 24; ++j) {

                if (j + ':00' == max_time || '0' + j + ':00' == max_time) {
                    if (j < 10) {
                        str2 = str2 + '<option value="0' + j + ':00" selected>0' + j + ':00</option>';
                    } else {
                        str2 = str2 + '<option value="' + j + ':00" selected>' + j + ':00</option>';
                    }
                } else {
                    if (j < 10) {
                        str2 = str2 + '<option value="0' + j + ':00">0' + j + ':00</option>';
                    } else {
                        str2 = str2 + '<option value="' + j + ':00">' + j + ':00</option>';
                    }
                }
            }
        }

    }

    $("#min_time").html(str1);
    $("#max_time").html(str2);

    $(function () {
        $("#min_time").change(function () {
            min_time = $(this).val();
            var str1 = '';
            var str2 = '';
            for (var i = 0; i < 24; ++i) {
                if (i + ':00' == min_time || '0' + i + ':00' == min_time) {
                    if (i < 10) {
                        str1 = str1 + '<option value="0' + i + ':00" selected>0' + i + ':00</option>';
                        console.log(str1);
                    } else {
                        str1 = str1 + '<option value="' + i + ':00" selected>' + i + ':00</option>';
                    }
                } else {
                    if (i < 10) {
                        str1 = str1 + '<option value="0' + i + ':00">0' + i + ':00</option>';
                    } else {
                        str1 = str1 + '<option value="' + i + ':00">' + i + ':00</option>';
                    }
                }
                if (i + ':00' == min_time || '0' + i + ':00' == min_time) {
                    for (var j = i + 1; j < 24; ++j) {
                        if (j + ':00' == max_time || '0' + j + ':00' == max_time) {
                            if (j < 10) {
                                str2 = str2 + '<option value="0' + j + ':00" selected>0' + j + ':00</option>';
                            } else {
                                str2 = str2 + '<option value="' + j + ':00" selected>' + j + ':00</option>';
                            }
                        } else {
                            if (j < 10) {
                                str2 = str2 + '<option value="0' + j + ':00">0' + j + ':00</option>';
                            } else {
                                str2 = str2 + '<option value="' + j + ':00">' + j + ':00</option>';
                            }
                        }
                    }
                }

            }
            $("#min_time").html(str1);
            $("#max_time").html(str2);
        });
    });
</script>


<script src="{{asset('scripts.js')}}"></script>
</body>

