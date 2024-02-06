@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('looks.index') }}">К списку</a>
  </div>
  <h1>Создать стиль образа</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Стиль</h2>
    </div>
    <form method="POST" action="{{ route('looks.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label>Категория</label>
          <select class="form-control" name="look_category_id">
            <option value="">Не выбрано</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Цвет</label>
          <select class="form-control" name="look_color_id">
            <option value="">Не выбрано</option>
            @foreach($colors as $color)
              <option value="{{ $color->id }}">
                {{ $color->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Стилист</label>
          <select class="form-control" name="designer_id">
            <option value="">Не выбрано</option>
            @foreach($designers as $designer)
              <option value="{{ $designer->id }}">
                {{ $designer->name }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Стиль образа</label>
          @foreach($styles as $style)
            <div class="form-check">
              <input id="style-{{ $style->id }}" class="form-check-input" type="checkbox" name="look_style_ids[]" value="{{ $style->id }}">
              <label class="form-check-label" for="style-{{ $style->id }}">{{ $style->name }}</label>
            </div>
          @endforeach
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
