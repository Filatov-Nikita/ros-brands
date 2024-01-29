@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('malls.index') }}">К списку</a>
  </div>
  <h1>Создать ТРЦ</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">ТРЦ</h2>
    </div>
    <form method="POST" action="{{ route('malls.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group">
          <label for="city">Город</label>
          <input required class="form-control" id="city" name="city" type="text" />
        </div>
        <div class="form-group">
          <label for="code">Код</label>
          <input required class="form-control" id="code" name="planeta_mall_code" type="text" />
        </div>
        <div class="form-group">
          <label for="site_href">Ссылка на сайт</label>
          <input required class="form-control" id="site_href" name="site_href" type="text" />
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
