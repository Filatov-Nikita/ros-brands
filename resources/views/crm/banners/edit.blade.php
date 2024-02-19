@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('banners.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $banner->name }}</h2>
    </div>
    <form method="POST" action="{{ route('banners.update', [ 'banner' => $banner->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <x-adminlte-input
          name="title"
          id="title"
          label="Заголовок"
          type="text"
          enable-old-support
          value="{{ $banner->title }}"
        />
        <x-adminlte-input
          name="href"
          id="href"
          label="Url"
          type="text"
          enable-old-support
          value="{{ $banner->href }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $banner->visible }}"
        >
          <option value="1" @selected($banner->visible === 1)>Да</option>
          <option value="0" @selected($banner->visible === 0)>Нет</option>
        </x-adminlte-select>
        <x-adminlte-input
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $banner->priority }}"
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
