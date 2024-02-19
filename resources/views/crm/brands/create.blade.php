@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('brands.index') }}">К списку</a>
  </div>
  <h1>Создать Бренд</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Бренд</h2>
    </div>
    <form method="POST" action="{{ route('brands.store') }}">
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
          name="planeta_mall_id"
          id="planeta_mall_id"
          label="ID на сайте планета"
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
        <div class="form-group">
          <label>Привязка к ТРЦ</label>
          <div class="form-group">
            @foreach($malls as $mall)
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="malls[]"
                  id="mall-{{ $mall->id }}"
                  value="{{ $mall->id }}"
                >
                <label class="form-check-label" for="mall-{{ $mall->id }}">
                  {{ $mall->name }}
                </label>
              </div>
            @endforeach
          </div>
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
