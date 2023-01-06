@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a
                type="button"
                class="btn btn-primary my-2 me-auto"
                href="{{ route('article-list', $magazine->id) }}"
            >
                К списку статей
            </a>
            <div class="card p-4">
              <h2>Изменить статью</h2>
              <h3>Журнал: {{$magazine->name}}</h3>
              <form
                action="{{ route(
                    'article-edit-submit',
                    $article->id
                )}}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf
                <input type="text" hidden name="magazine-id" value="{{$magazine->id}}">

                <div class="form-group mb-3">
                    <label for="name">Название</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{ $article->name }}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="english-name">Введите название на английском</label>
                    <input
                        id="english-name"
                        name="english-name"
                        type="text"
                        class="form-control"
                        value="{{ $article->english_name }}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="doi-link">Ссылка на DOI</label>
                    <input
                        id="doi-link"
                        name="doi-link"
                        type="text"
                        class="form-control"
                        value="{{ $article->link_doi }}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="annotation">Аннотация</label>
                    <textarea
                        id="annotation"
                        name="annotation"
                        type="text"
                        class="form-control"
                    >{{ $article->annotation }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="annotation-english">Аннотация на английском</label>
                    <textarea
                        id="annotation-english"
                        name="annotation-english"
                        type="text"
                        class="form-control"
                    >{{ $article->annotation_english }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="for-citation">Для цитирования</label>
                    <textarea
                        id="for-citation"
                        name="for-citation"
                        type="text"
                        class="form-control"
                    >{{ $article->for_citation }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="for-citation-english">Для цитирования на английском</label>
                    <textarea
                        id="for-citation-english"
                        name="for-citation-english"
                        type="text"
                        class="form-control"
                    >{{ $article->for_citation_english }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="bibliography">Список литературы</label>
                    <div id="editor">
                        {!! $article->bibliography !!}
                    </div>
                    <textarea
                        style="display: none"
                        id="bibliography"
                        name="bibliography"
                        type="text"
                        class="form-control"
                    >{{ $article->bibliography }}</textarea>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is-popular" name="is-popular" {{ $article->is_popular ? 'checked' : '' }}>
                    <label class="form-check-label" for="is-popular">
                        Популярное
                    </label>
                </div>

                <select class="form-select mb-3" multiple aria-label="multiple select example" name="authors[]">
                    <option>Выберите авторов</option>
                    @foreach ($authors as $author)
                        <option {{in_array($author->id, $articleAuthors) ? 'selected' : ''}} value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>

                <select class="form-select mb-3" aria-label="Default select example" name="headline-id">
                    <option>Выберите раздел</option>
                    @foreach ($headlines as $headline)
                        <option {{$article->headline_id == $headline->id ? 'selected' : ''}} value="{{$headline->id}}">{{$headline->title}}</option>
                    @endforeach
                </select>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="file">Загрузить статью</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                  Сохранить
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
