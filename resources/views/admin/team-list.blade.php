@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a
                type="button"
                class="btn btn-primary my-2"
                href="{{ route('admin') }}"
            >
                В админку на главную
            </a>
            <h2>
                Список сотрудников
            </h2>
            <a
                type="button"
                class="btn btn-success my-2"
                href="{{ route('team-add') }}"
            >
                Добавить
            </a>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Имя</th>
                        <th scope="col">Должность</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->position }}</td>
                            <td>
                                <a
                                    href="{{ route('team-edit', $item->id) }}"
                                    class="btn btn-warning"
                                >
                                    Изменить
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ route('team-delete', $item->id) }}"
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
