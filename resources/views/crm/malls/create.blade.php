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
          name="city"
          id="city"
          label="Город"
          type="text"
          enable-old-support
        />
        <x-adminlte-input
          required
          name="planeta_mall_code"
          id="planeta_mall_code"
          label="Код"
          type="text"
          enable-old-support
        />
        <x-adminlte-input
          required
          name="site_href"
          id="site_href"
          label="Ссылка на сайт"
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

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
