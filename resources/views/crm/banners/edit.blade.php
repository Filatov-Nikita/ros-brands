@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('banners.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $banner->name }}</h2>
    </div>
    <form method="POST" action="{{ route('banners.update', [ 'banner' => $banner->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="title">Заголовок</label>
          <input class="form-control" id="title" name="title" type="text" value="{{ $banner->title }}" />
        </div>
        <div class="form-group">
          <label for="href">Url</label>
          <input class="form-control" id="href" name="href" type="text" value="{{ $banner->url }}" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $banner->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $banner->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="{{ $banner->priority }}" />
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
