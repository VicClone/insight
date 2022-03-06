<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ИНСАЙТ - журнал</title>
        <meta name="keywords" content="журнал, Инсайт, insight, РГППУ, Инновационная научная современная академическая исследовательская траектория (ИНСАЙТ), научный журнал, edinsight">
        <meta name="description" content="Инсайт - журнал молодых ученых «Инновационная научная современная академическая исследовательская траектория (ИНСАЙТ)», созданного советом молодых ученых Российского государственного профессионально-педагогического университета.">
        <meta property="og:site_name" content="ИНСАЙТ">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://edinsight.ru/">
        <meta property="og:title" content="Журнал «ИНСАЙТ»">
        <meta property="og:image:type" content="image/png">
		<meta property="og:image" content="http://edinsight.ru/img/magazine1.jpg">
        <meta property="og:description" content="Журнал журнал молодых ученых «Инновационная научная современная академическая исследовательская траектория (ИНСАЙТ)»">

        <meta name="twitter:card" content="summary">
        <meta name="twitter:domain" content="http://edinsight.ru">
        <meta name="twitter:url" content="http://edinsight.ru">
        <meta name="twitter:title" content="Журнал «ИНСАЙТ»">

        <meta property="vk:type" content="article">
        <meta property="vk:url" content="http://edinsight.ru">
        <meta property="vk:title" content="Журнал «ИНСАЙТ»">
		<meta property="vk:image" content="http://edinsight.ru/img/magazine1.jpg">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        {{-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
    </head>
    <body>
        <header>
            <nav class="
                navbar navbar-expand-lg navbar-dark navbar-custom
                {{Route::current()->getName() == 'home' ? 'absolute' : ''}}
            ">
                <div class="container">
                    <a
                        id="home"
                        class="navbar-brand"
                        href="{{route('home')}}"
                    >
                        Insight
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/#about">О журнале</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#staff">Редакционная коллегия</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#recommendation">Рекомендации для авторов</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#rules">Правила рецензирования</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/#shedule">График выхода журнала</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('archive')}}">Архив номеров</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <p class="footer__text">Контакты: <a class="base-link" href="mailto:insight-rsvpu@mail.ru">insight-rsvpu@mail.ru</a></p>
            <div class="footer__sociable">
                <a class="footer__sociable-link" href="https://vk.com/insight_rsvpu" target="_blank">
                    <img class="footer__sociable-icon" src="{{asset('img/icons/vk.svg')}}" alt="vk">
                </a>
                <a class="footer__sociable-link" href="https://www.facebook.com/INSIGHTscientificJournal/" target="_blank">
                    <img class="footer__sociable-icon" src="{{asset('img/icons/fb.svg')}}" alt="fb">
                </a>
                <a class="footer__sociable-link" style="display: none" shref="https://www.facebook.com/INSIGHTscientificJournal/" target="_blank">
                    <img class="footer__sociable-icon" src="{{asset('img/icons/insta.svg')}}" alt="insta">
                </a>
            </div>
        </footer>


        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    </body>
</html>
