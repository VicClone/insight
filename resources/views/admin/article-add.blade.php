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
                    <label for="english-name">Введите название на английском</label>
                    <input
                        id="english-name"
                        name="english-name"
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

                <div class="form-group mb-3">
                    <label for="annotation-english">Аннотация на английском</label>
                    <textarea
                        id="annotation-english"
                        name="annotation-english"
                        type="text"
                        class="form-control"
                    ></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="for-citation">Для цитирования</label>
                    <textarea
                        id="for-citation"
                        name="for-citation"
                        type="text"
                        class="form-control"
                    ></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="for-citation-english">Для цитирования на английском</label>
                    <textarea
                        id="for-citation-english"
                        name="for-citation-english"
                        type="text"
                        class="form-control"
                    ></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="bibliography">Список литературы</label>
                    <div id="editor">
                    </div>
                    <textarea
                        style="display: none"
                        id="bibliography"
                        name="bibliography"
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

                <select class="form-select mb-3" multiple aria-label="multiple select example" name="authors[]">
                    <option>Выберите авторов</option>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>

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

<!-- Include the Quill library -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="{{ asset('js/article.js') }}"></script>
@endsection
