@extends('layouts.app')

@section('content')
    <section class="container page">
        <h2 class="base-title-2">Архив номеров</h2>
        @foreach ($magazinesByYears as $year => $magazines)
            <section class="archive__section">
                <h3 class="archive__year">
                    {{$year}} год
                </h3>
                <div class="archive__magazines">
                    @foreach ($magazines as $magazine)
                        <div class="card archive__magazines-card">
                            <img src="/storage/images/{{$magazine->img}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$magazine->number}}</h5>
                                <p class="card-text">{{$magazine->name}}</p>
                                <a href="/magazine/{{$magazine->id}}" class="btn btn-primary">Открыть журнал</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </section>
@endsection
