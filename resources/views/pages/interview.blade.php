@extends('layouts.app')

@section('content')
    <section class="container page">
        <nav class="nav-history">
            <a href="{{ route('home') }}" class="btn btn-secondary nav-history__btn">На главную</a>
        </nav>
        <section class="team">
            <section class="team__info">
                <div class="team__avatar">
                    <img class="team__avatar_img" src="/storage/images/{{$team->avatar}}" alt="{{$team->name}}">
                </div>
                <div class="team__description">
                    <h2 class="team__info_name">
                        {{$team->name}}
                    </h2>
                    <p class="team__info_description base-text">
                        {{$team->description}}
                    </p>
                </div>
            </section>
            <section class="team__interview base-text">
                {!! $team->interview !!}
            </section>
        </section>
    </section>
@endsection
