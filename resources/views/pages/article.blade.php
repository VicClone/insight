@extends('layouts.app')

@section('content')
    <section class="container page">
        <nav class="nav-history">
            <a href="{{ route('magazine', $article->magazine_id) }}" class="btn btn-secondary nav-history__btn">В журнал</a>
        </nav>
        <section class="article">
            <h1 class="article__title">{{$article->name}}</h1>
            <div class="article__authors">
                @foreach ($article->authors as $author)
                    <div class="article__author">
                        <img
                            class="article__author-img"
                            src="/storage/images/{{$author->image}}"
                            alt="{{$author->name}}"
                        >
                        <p class="article__author-name">
                            <a class="article__author-link" target="_blank" href="{{$author->link}}">
                                {{$author->name}}
                            </a>
                        </p>
                        <p class="article__author-organization">
                            {{$author->organization}}
                        </p>
                    </div>
                @endforeach
            </div>
            <p class="article__links">
                <a href="{{$article->link_doi}}">
                    {{$article->link_doi}}
                </a>
            </p>
            <div class="article__download">
                <a
                    class="articles__list-link btn btn-primary"
                    target="_blank"
                    href="/storage/files/{{$article->file}}"
                >
                    Скачать
                </a>
            </div>
            <div class="annotation">
                <h2 class="annotation__title">
                    Аннотация
                </h2>
                <div class="base-text">
                    <p class="annotation__text">
                        {{$article->annotation}}
                    </p>
                </div>
            </div>
        </section>
    </section>
@endsection
