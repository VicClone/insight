@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a
                type="button"
                class="btn btn-primary my-2 me-auto"
                href="{{ route('magazine-list') }}"
            >
                К списку журналов
            </a>
            <h2>
                Список разделов журнала "{{$magazine->name}}"
            </h2>
            <a
                type="button"
                class="btn btn-success my-2"
                href="{{ route('headline-add', $magazineId) }}"
            >
                Добавить
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Позиция</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headlines as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->sort }}</td>
                            <td>
                                <a
                                    href="{{
                                        route('headline-edit',
                                        [
                                            'magazineId' => $item->magazine_id,
                                            'headlineId' => $item->id
                                        ])
                                    }}"
                                    class="btn btn-warning"
                                >
                                    Изменить
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ route('headline-delete', $item->id) }}"
                                    class="btn btn-danger"
                                >
                                    Удалить
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
