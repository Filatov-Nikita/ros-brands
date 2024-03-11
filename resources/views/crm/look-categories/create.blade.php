@extends('adminlte::page')

@section('title', 'Категории образов | Создать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('look-categories.index') }}">К списку</a>
  </div>
  <h1>Создать категорию образа</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Категория образа</h2>
    </div>
    <form method="POST" action="{{ route('look-categories.store') }}">
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
