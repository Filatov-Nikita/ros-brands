@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('promotions.index') }}">К списку</a>
  </div>
  <h1>Создать промоакцию</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Промоакция</h2>
    </div>
    <form method="POST" action="{{ route('promotions.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group">
          <label for="title">Заголовок</label>
          <input required class="form-control" id="title" name="title" type="text" />
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option value="1">Да</option>
            <option value="0">Нет</option>
          </select>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
