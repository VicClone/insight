@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>
                Список журналов
            </h2>
            <a
                type="button"
                class="btn btn-success my-2"
                href="{{ route('magazine-add') }}"
            >
                Добавить
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Номер</th>
                        <th scope="col">Год</th>
                        <th scope="col">Статьи</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magazines as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->year }}</td>
                            <td>
                                <a
                                    href="{{ route('article-list', $item->id) }}"
                                    class="btn btn-success"
                                >
                                    Открыть статьи
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ route('magazine-edit', $item->id) }}"
                                    class="btn btn-warning"
                                >
                                    Изменить
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ route('magazine-delete', $item->id) }}"
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
