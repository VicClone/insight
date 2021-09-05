@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>
                Список журналов
            </h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Название</th>
                        <th scope="col">Авторы</th>
                        <th scope="col">Ссылка на DOI</th>
                        <th scope="col">Популярное</th>
                        <th scope="col">Изменить</th>
                        <th scope="col">Удалить</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->authors }}</td>
                            <td>{{ $item->link_doi }}</td>
                            <td>{{ $item->is_popular ? 'Да' : 'Нет' }}</td>
                            <td>
                                <a
                                    href="{{
                                        route('article-edit',
                                        [
                                            'magazineId' => $item->magazine_id,
                                            'articleId' => $item->id
                                        ])
                                    }}"
                                    class="btn btn-warning"
                                >
                                    Изменить
                                </a>
                            </td>
                            <td>
                                <a
                                    href="{{ route('article-delete', $item->id) }}"
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
