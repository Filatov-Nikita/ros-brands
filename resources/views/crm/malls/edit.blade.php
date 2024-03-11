@extends('adminlte::page')

@section('title', 'Моллы | Редактировать | ' . $mall->name . ' - ' . $mall->city)

@section('content_header')
  <x-edit-toolbar resource_name="malls" resource="{{ $mall->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Молл: {{ $mall->name }} - {{ $mall->city }}</h2>
    </div>
    <form method="POST" action="{{ route('malls.update', [ 'mall' => $mall->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Название"
          type="text"
          enable-old-support
          value="{{ $mall->name }}"
        />
        <x-adminlte-input
          required
          name="city"
          id="city"
          label="Город"
          type="text"
          enable-old-support
          value="{{ $mall->city }}"
        />
        <x-adminlte-input
          required
          name="planeta_mall_code"
          id="planeta_mall_code"
          label="Код"
          type="text"
          enable-old-support
          value="{{ $mall->planeta_mall_code }}"
        />
        <x-adminlte-input
          required
          name="site_href"
          id="site_href"
          label="Ссылка на сайт"
          type="text"
          enable-old-support
          value="{{ $mall->site_href }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $mall->visible }}"
        >
          <option value="1" @selected($mall->visible === 1)>Да</option>
          <option value="0" @selected($mall->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          value="{{ $mall->priority }}"
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
