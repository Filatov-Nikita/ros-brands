@extends('adminlte::page')

@section('title', 'Баннеры | Редактировать | ' . $designer->name)

@section('content_header')
  <x-edit-toolbar resource_name="designers" resource="{{ $designer->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Стилист: {{ $designer->name }}</h2>
    </div>
    <form method="POST" action="{{ route('designers.update', [ 'designer' => $designer->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Имя"
          type="text"
          enable-old-support
          value="{{ $designer->name }}"
        />
        <x-adminlte-input
          required
          name="declinated_name"
          id="declinated_name"
          label="Имя в род. падеже"
          type="text"
          enable-old-support
          value="{{ $designer->declinated_name }}"
        />
        <x-adminlte-input
          required
          name="position"
          id="position"
          label="Короткое описание"
          type="text"
          enable-old-support
          value="{{ $designer->position }}"
        />
        <x-adminlte-textarea
          required
          label="Описание"
          id="description"
          name="description"
          rows="5"
          enable-old-support
        >
          {{ $designer->description }}
        </x-adminlte-textarea>
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $designer->visible }}"
        >
          <option value="1" @selected($designer->visible === 1)>Да</option>
          <option value="0" @selected($designer->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $designer->priority }}"
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
