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
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Название"
          type="text"
          enable-old-support
          value="{{ $color->name }}"
        />
        <x-adminlte-input-color
          required
          name="color_in_hex"
          id="color_in_hex"
          label="Код цвета"
          :config="[ 'autoInputFallback' => false ]"
          enable-old-support
          value="{{ $color->color_in_hex }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $color->visible }}"
        >
          <option value="1" @selected($color->visible === 1)>Да</option>
          <option value="0" @selected($color->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $color->priority }}"
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
