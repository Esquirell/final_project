@extends('layouts.base')

@section ('content')
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="{{asset('img/avataaars.svg')}}" alt="" /><!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">Медицинский центр</h1>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <p class="masthead-subheading mb-0">Обследование - Лечение - Дорого</p>
        </div>
    </header>

    <section class="page-section portfolio" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Наши врачи</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row">
                <!-- Portfolio Item 1-->

                @foreach($doctors as $doctor)
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal"
                             data-target="#portfolioModal{{$loop->iteration}}">
                            <div
                                class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i
                                        class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{asset($doctor->avatar)}}" alt=""/>
                        </div>
                    </div>
                @endforeach


                @foreach ($doctors as $doctor)
                    <div class="portfolio-modal modal fade" id="portfolioModal{{$loop->iteration}}" tabindex="-1"
                         role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                                </button>
                                <div class="modal-body text-center">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-8">
                                                <!-- Portfolio Modal - Title-->
                                                <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                                    id="portfolioModal1Label">{{$doctor->name}} {{$doctor->surname}}</h2>
                                                <!-- Icon Divider-->
                                                <div class="divider-custom">
                                                    <div class="divider-custom-line"></div>
                                                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                                    <div class="divider-custom-line"></div>
                                                </div>
                                                <!-- Portfolio Modal - Image--><img class="img-fluid rounded mb-5"
                                                                                    src="{{asset($doctor->avatar)}}"
                                                                                    alt=""/>
                                                <!-- Portfolio Modal - Text-->
                                                <p class="mb-5">{{$doctor->description}}</p>

                                                <button class="btn btn-primary" data-dismiss="modal"><i
                                                        class="fas fa-times fa-fw"></i>Close Window
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="page-section bg-primary text-white mb-0" id="about">
        <div class="container">
            <!-- About Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-white">О нас</h2>
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- About Section Content-->
            <div class="row">
                <div class="col-lg-4 ml-auto"><p class="lead">Медицинский центр — это многопрофильный медицинский
                        центр, расположенный на левом берегу города, который оказывает услуги по проведению лабораторных
                        исследований, профилактике, диагностике и лечению многих заболеваний.</p></div>
                <div class="col-lg-4 mr-auto"><p class="lead">После необходимого обследования, которое вам проведут с
                        помощью современного диагностического оборудования, специалисты назначат адекватное лечение и будут
                        наблюдать до выздоровления или стойкой клинической ремиссии.</p></div><div class="col-lg-4 mr-auto"><p class="lead">После необходимого обследования, которое вам проведут с
                        помощью современного диагностического оборудования, специалисты назначат адекватное лечение и будут
                        наблюдать до выздоровления или стойкой клинической ремиссии.</p></div><div class="col-lg-4 mr-auto"><p class="lead">После необходимого обследования, которое вам проведут с
                        помощью современного диагностического оборудования, специалисты назначат адекватное лечение и будут
                        наблюдать до выздоровления или стойкой клинической ремиссии.</p></div><div class="col-lg-4 mr-auto"><p class="lead">После необходимого обследования, которое вам проведут с
                        помощью современного диагностического оборудования, специалисты назначат адекватное лечение и будут
                        наблюдать до выздоровления или стойкой клинической ремиссии.</p></div><div class="col-lg-4 mr-auto"><p class="lead">После необходимого обследования, которое вам проведут с
                        помощью современного диагностического оборудования, специалисты назначат адекватное лечение и будут
                        наблюдать до выздоровления или стойкой клинической ремиссии.</p></div>
            </div>
            <!-- About Section Button-->

        </div>
    </section>
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">2215 John Daniel Drive<br />Clark, MO 65243</p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a><a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">Freelance is a free to use, MIT licensed Bootstrap theme created by <a href="http://startbootstrap.com">Start Bootstrap</a>.</p>
                </div>
            </div>
        </div>
    </footer>
@endsection
