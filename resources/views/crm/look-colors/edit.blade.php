@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('look-colors.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $color->name }}</h2>
    </div>
    <form method="POST" action="{{ route('look-colors.update', [ 'look_color' => $color->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $color->name }}" />
        </div>
        <div class="form-group">
          <label for="color_in_hex">Код цвета</label>
          <input required class="form-control" id="color_in_hex" name="color_in_hex" type="text" value="{{ $color->color_in_hex }}" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $color->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $color->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="{{ $color->priority }}" />
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
