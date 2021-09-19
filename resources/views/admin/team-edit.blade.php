@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <a
                    type="button"
                    class="btn btn-primary my-2 me-auto"
                    href="{{ route('team-list') }}"
                >
                    К списку сотрудников
                </a>
              <h2>Изменить сотрудника</h2>
              <form
                action="{{ route('team-edit-submit', $team->id) }}"
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
                        value="{{ $team->name }}"
                    >
                </div>

                <div class="form-group mb-3">
                    <label for="position">Введите должность</label>
                    <input
                        name="position"
                        type="text"
                        class="form-control"
                        value="{{ $team->position }}"
                    >
                </div>

                <div class="input-group mb-3">
                    <label class="input-group-text" for="avatar">Загрузить аватар</label>
                    <input type="file" class="form-control" id="avatar" name="avatar">
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                  Изменить
                </button>
              </form>
            </div>
        </div>
    </div>
</div>
@endsection
