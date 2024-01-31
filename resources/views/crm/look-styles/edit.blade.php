@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('look-styles.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $look_style->name }}</h2>
    </div>
    <form method="POST" action="{{ route('look-styles.update', [ 'look_style' => $look_style->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $look_style->name }}" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $look_style->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $look_style->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="{{ $look_style->priority }}" />
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
