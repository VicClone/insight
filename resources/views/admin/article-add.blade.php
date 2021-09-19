@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <a
                    type="button"
                    class="btn btn-primary my-2 me-auto"
                    href="{{ route('article-list', $magazine->id) }}"
                >
                    К списку статей
                </a>
              <h2>Добавить статью</h2>
              <h3>Журнал: {{$magazine->name}}</h3>
              <form
                action="{{ route('article-add-submit', $magazine->id) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf
                <input type="text" hidden name="magazine-id" value="{{$magazine->id}}">

                <div class="form-group mb-3">
                    <label for="name">Введите название</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="authors">Введите авторов</label>
                    <input
                        id="authors"
                        name="authors"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="doi-link">Ссылка на DOI</label>
                    <input
                        id="doi-link"
                        name="doi-link"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="annotation">Аннотация</label>
                    <textarea
                        id="annotation"
                        name="annotation"
                        type="text"
                        class="form-control"
                    ></textarea>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is-popular" name="is-popular">
                    <label class="form-check-label" for="is-popular">
                        Поместить в популярное
                    </label>
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="file">Загрузить статью</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                  Создать
                </button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
