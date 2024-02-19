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
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Название"
          type="text"
          enable-old-support
        />

        <x-adminlte-textarea
          required
          label="Описание"
          id="description"
          name="description"
          rows="5"
          enable-old-support
        ></x-adminlte-textarea>

        <x-adminlte-select
          id="look_category_id"
          name="look_category_id"
          label="Категория"
          enable-old-support
        >
          <x-adminlte-options empty-option="Не выбрано" :options="$categories->pluck('name', 'id')->toArray()" />
        </x-adminlte-select>

        <x-adminlte-select
          id="look_color_id"
          name="look_color_id"
          label="Цвет"
          enable-old-support
        >
          <x-adminlte-options empty-option="Не выбрано" :options="$colors->pluck('name', 'id')->toArray()" />
        </x-adminlte-select>

        <x-adminlte-select
          id="designer_id"
          name="designer_id"
          label="Стилист"
          enable-old-support
        >
          <x-adminlte-options empty-option="Не выбрано" :options="$designers->pluck('name', 'id')->toArray()" />
        </x-adminlte-select>

        <div class="form-group">
          <label>Стиль образа</label>
          @foreach($styles as $style)
            <div class="form-check">
              <input id="style-{{ $style->id }}" class="form-check-input" type="checkbox" name="look_style_ids[]" value="{{ $style->id }}">
              <label class="form-check-label" for="style-{{ $style->id }}">{{ $style->name }}</label>
            </div>
          @endforeach
          @error('look_style_ids')
            <div class="invalid-feedback d-block">
              {{ $errors->first('look_style_ids') }}
            </div>
          @enderror
        </div>

        <x-adminlte-input
          required
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="0"
        />

        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
        >
          <option value="1">Да</option>
          <option value="0">Нет</option>
        </x-adminlte-select>
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
