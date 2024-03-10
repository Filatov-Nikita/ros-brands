@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-edit-toolbar resource_name="look-categories" resource="{{ $look_category->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $look_category->name }}</h2>
    </div>
    <form method="POST" action="{{ route('look-categories.update', [ 'look_category' => $look_category->id ]) }}">
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
          value="{{ $look_category->name }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $look_category->visible }}"
        >
          <option value="1" @selected($look_category->visible === 1)>Да</option>
          <option value="0" @selected($look_category->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $look_category->priority }}"
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
