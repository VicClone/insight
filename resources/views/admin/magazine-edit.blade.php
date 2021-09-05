@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
              <h2>Изменить журнал</h2>
              <form
                action="{{ route('magazine-edit-submit', $magazine->id) }}"
                method="POST"
                enctype="multipart/form-data"
              >
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Введите название</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control"
                        value="{{$magazine->name}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="number">Введите номер</label>
                    <input
                        name="number"
                        type="text"
                        class="form-control"
                        value="{{$magazine->number}}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="year">Введите год</label>
                    <input
                        name="year"
                        type="number"
                        class="form-control"
                        value="{{$magazine->year}}"
                    >
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="cover">Загрузить обложку</label>
                    <input type="file" class="form-control" id="cover" name="cover">
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="file">Загрузить журнал</label>
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
@endsection
