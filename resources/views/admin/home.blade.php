@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Поля') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item">
                            <a class="d-block" href="{{ route('team-list') }}">
                                Сотрудники
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="d-block" href="{{ route('magazine-list') }}">
                                Журналы
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a class="d-block" href="{{ route('promo-list') }}">
                                Слайды на главной
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="admin"></div> --}}
</div>
@endsection
