@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <a
                    type="button"
                    class="btn btn-primary my-2 me-auto"
                    href="{{ route('promo-list') }}"
                >
                    К списку слайдов
                </a>
              <h2>Добавить слайд</h2>
              <form
                action="{{ route('promo-add-submit') }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf
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
                    <label for="description">Введите описание</label>
                    <textarea
                        class="form-control"
                        name="description"
                        id="description"
                    ></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="link">Введите название ссылки</label>
                    <input
                        id="link-name"
                        name="link-name"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="link">Введите ссылку на журнал</label>
                    <input
                        id="link"
                        name="link"
                        type="text"
                        class="form-control"
                    >
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="image">Загрузить обложку</label>
                    <input type="file" class="form-control" id="image" name="image">
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
