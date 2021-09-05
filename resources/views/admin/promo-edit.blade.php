@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
              <h2>Редактировать слайд</h2>
              <form
                action="{{ route('promo-edit-submit', $promo->id) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Название</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{$promo->name}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="description">Введите описание</label>
                    <textarea
                        class="form-control"
                        name="description"
                        id="description"
                    >{{$promo->description}}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="link">Введите название ссылки</label>
                    <input
                        id="link-name"
                        name="link-name"
                        type="text"
                        class="form-control"
                        value="{{$promo->link_name}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="link">Введите ссылку на журнал</label>
                    <input
                        id="link"
                        name="link"
                        type="text"
                        class="form-control"
                        value="{{$promo->link}}"
                    >
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="image">Загрузить обложку</label>
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
