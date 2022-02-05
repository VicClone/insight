@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <a
                    type="button"
                    class="btn btn-primary my-2 me-auto"
                    href="{{ route('author-list') }}"
                >
                    К списку авторов
                </a>
              <h2>Изменить автора</h2>
              <form
                action="{{ route('author-edit-submit', $author->id) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Введите имя</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{$author->name}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="link">Введите ссылку</label>
                    <input
                        name="link"
                        type="text"
                        class="form-control"
                        value="{{$author->link}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="organization">Введите организацию</label>
                    <input
                        name="organization"
                        type="text"
                        class="form-control"
                        value="{{$author->organization}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="sort">Позиция</label>
                    <input
                        id="sort"
                        name="sort"
                        type="number"
                        class="form-control"
                        value="{{$author->sort}}"
                    >
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="image">Загрузить фото</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                    Сохранить
                </button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
