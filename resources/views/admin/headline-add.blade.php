@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <a
                    type="button"
                    class="btn btn-primary my-2 me-auto"
                    href="{{ route('headlines-list', $magazine->id) }}"
                >
                    К списку разделов
                </a>
              <h2>Добавить раздел</h2>
              <h3>Журнал: {{$magazine->name}}</h3>
              <form
                action="{{ route('headline-add-submit', $magazine->id) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf
                <input type="text" hidden name="magazine-id" value="{{$magazine->id}}">

                <div class="form-group mb-3">
                    <label for="title">Введите название</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="sort">Позицию</label>
                    <input
                        id="sort"
                        name="sort"
                        type="text"
                        class="form-control"
                        value="0"
                    >
                </div>

                <select class="form-select mb-3" multiple aria-label="multiple select example" name="articles[]">
                    <option>Выберите статьи</option>
                    @foreach ($articles as $article)
                        <option value="{{$article->id}}">{{$article->name}}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary mt-3">
                  Создать
                </button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
