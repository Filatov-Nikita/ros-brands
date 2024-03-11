@extends('adminlte::page')

@section('title', 'Баннеры | Cоздать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('banners.index') }}">К списку</a>
  </div>
  <h1>Создать баннер</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Баннер</h2>
    </div>
    <form method="POST" action="{{ route('banners.store') }}">
      @csrf
      <div class="card-body">
        <x-adminlte-input
          name="title"
          id="title"
          label="Заголовок"
          type="text"
          enable-old-support
        />
        <x-adminlte-input
          name="href"
          id="href"
          label="Url"
          type="text"
          enable-old-support
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
        >
          <option value="1">Да</option>
          <option value="0">Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          value="0"
          enable-old-support
        />
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop
