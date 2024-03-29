@extends('adminlte::page')

@section('title', 'Стили образов | Редактировать | ' . $look_style->name)

@section('content_header')
  <x-edit-toolbar resource_name="look-styles" resource="{{ $look_style->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Стиль образа: {{ $look_style->name }}</h2>
    </div>
    <form method="POST" action="{{ route('look-styles.update', [ 'look_style' => $look_style->id ]) }}">
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
          value="{{ $look_style->name }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $look_style->visible }}"
        >
          <option value="1" @selected($look_style->visible === 1)>Да</option>
          <option value="0" @selected($look_style->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $look_style->priority }}"
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
