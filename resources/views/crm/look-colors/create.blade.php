@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('look-colors.index') }}">К списку</a>
  </div>
  <h1>Создать цвет</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Цвет</h2>
    </div>
    <form method="POST" action="{{ route('look-colors.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group">
          <label for="color_in_hex">Код цвета</label>
          <input required class="form-control" id="color_in_hex" name="color_in_hex" type="text" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option value="1">Да</option>
            <option value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="0" />
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
            Отправить
          </button>
        </div>
      </div>
    </form>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
