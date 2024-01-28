@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('malls.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $mall->name }}</h2>
    </div>
    <form method="POST" action="{{ route('malls.update', [ 'mall' => $mall->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $mall->name }}" />
        </div>
        <div class="form-group">
          <label for="city">Город</label>
          <input required class="form-control" id="city" name="city" type="text" value="{{ $mall->city }}" />
        </div>
        <div class="form-group">
          <label for="code">Код</label>
          <input required class="form-control" id="code" name="planeta_mall_code" type="text" value="{{ $mall->planeta_mall_code }}" />
        </div>
        <div class="form-group">
          <label for="site_href">Ссылка на сайт</label>
          <input required class="form-control" id="site_href" name="site_href" type="text" value="{{ $mall->site_href }}" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $mall->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $mall->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="{{ $mall->priority }}" />
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
