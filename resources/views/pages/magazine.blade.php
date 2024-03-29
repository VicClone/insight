@extends('layouts.app')

@section('content')
    <section class="container page">
        <nav class="nav-history">
            <a href="{{ route('archive') }}" class="btn btn-secondary nav-history__btn">В архив</a>
        </nav>
        <section class="magazine">
            <div class="magazine__cover">
                <img
                    class="magazine__cover-img"
                    src="/storage/images/{{$magazine->img}}"
                    alt="asfd"
                >
            </div>
            <div class="magazine__info">
                <h1 class="magazine__info-title">
                    {{$magazine->number}}
                </h1>
                <p class="magazine__info-name">
                    {{$magazine->name}}
                </p>

                <a href="/storage/files/{{$magazine->file}}" class="btn btn-primary magazine__info-btn" target="_blank">Скачать</a>
            </div>
        </section>
        <section class="articles">
            <h2 class="articles__title">
                Статьи в журнале
            </h2>

            <ul class="headlines__list">
                @foreach ($headlines as $headline)
                    <li class="headlines__list-item">
                        <p class="headlines__list-title">
                            {{$headline->title}}
                        </p>
                        <ul class="articles__list">
                            @foreach ($headline->articles as $article)
                                <li class="articles__list-item">
                                    <div class="articles__list-info">
                                        <p class="articles__list-title">
                                            {{$article->name}}
                                        </p>
                                        <p class="articles__list-text">
                                            {{$article->authors}}
                                        </p>
                                    </div>
                                    <div class="articles__list-links">
                                        <a
                                            class="articles__list-link btn btn-primary"
                                            href="/storage/files/{{$article->file}}"
                                            target="_blank"
                                        >
                                            Скачать
                                        </a>
                                        <a
                                            class="articles__list-link btn btn-secondary"
                                            href="{{ route('article', $article->id) }}"
                                        >
                                            Открыть
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </section>
    </section>
@endsection
