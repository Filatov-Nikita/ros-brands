@extends('adminlte::page')

@section('title', 'Спецпредложения | Cоздать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('promotions.index') }}">К списку</a>
  </div>
  <h1>Создать спецпредложение</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Спецпредложение</h2>
    </div>
    <form method="POST" action="{{ route('promotions.store') }}">
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

        <x-adminlte-input
          required
          name="title"
          id="title"
          label="Заголовок"
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
