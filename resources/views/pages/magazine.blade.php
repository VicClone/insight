@extends('layouts.app')

@section('content')
    <section class="container page">
        <section class="magazine">
            <div class="magazine__cover">
                <img
                    class="magazine__cover-img"
                    src="http://insight-rsvpu.usite.pro/oblozhka.jpg"
                    alt="asfd"
                >
            </div>
            <div class="magazine__info">
                <h1 class="magazine__info-title">
                    Том 23, № 6
                </h1>
                <p class="magazine__info-name">
                    Ошибки гипотезирования как предмет методологической рефлексии педагога-исследователя.
                </p>
                <a href="#" class="btn btn-primary">Скачать</a>
            </div>
        </section>
        <section class="articles">
            <h2 class="articles__title">
                Статьи в журнале
            </h2>
            <ul class="list-group articles__list">
                <li class="list-group-item">
                    <p class="articles__list-title">
                        Оценивание в образовании: современные тенденции, проблемы и противоречия (обзор научных публикаций)
                    </p>
                    <p class="articles__list-text">
                        Авторы: И. Б. Шмигирилова, А. С. Рванова, О. В. Григоренко
                    </p>
                    <div class="articles__list-links">
                        <a class="articles__list-link btn btn-primary" href="">Скачать</a>
                        <a class="articles__list-link btn btn-secondary" href="">Открыть</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <p class="articles__list-title">
                        Оценивание в образовании: современные тенденции, проблемы и противоречия (обзор научных публикаций)
                    </p>
                    <p class="articles__list-text">
                        Авторы: И. Б. Шмигирилова, А. С. Рванова, О. В. Григоренко
                    </p>
                    <div class="articles__list-links">
                        <a class="articles__list-link btn btn-primary" href="">Скачать</a>
                        <a class="articles__list-link btn btn-secondary" href="">Открыть</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <p class="articles__list-title">
                        Оценивание в образовании: современные тенденции, проблемы и противоречия (обзор научных публикаций)
                    </p>
                    <p class="articles__list-text">
                        Авторы: И. Б. Шмигирилова, А. С. Рванова, О. В. Григоренко
                    </p>
                    <div class="articles__list-links">
                        <a class="articles__list-link btn btn-primary" href="">Скачать</a>
                        <a class="articles__list-link btn btn-secondary" href="">Открыть</a>
                    </div>
                </li>
              </ul>
        </section>
    </section>
@endsection
