@extends('adminlte::page')

@section('title', 'Товары | Cоздать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('products.index') }}">К списку</a>
  </div>
  <h1>Создать товар</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Товар</h2>
    </div>
    <form method="POST" action="{{ route('products.store') }}">
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
          name="consist"
          id="consist"
          label="Состав"
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
        <x-adminlte-input
          required
          name="price"
          id="price"
          label="Цена"
          type="number"
          enable-old-support
        />
        <x-adminlte-select
          id="brand"
          name="brand_id"
          label="Бренд"
          enable-old-support
        >
          <x-adminlte-options :options="$brands->pluck('name', 'id')->toArray()" />
        </x-adminlte-select>

        @include('crm.products.parts.category-list-form', [
          'categories' => $categories,
        ])

        <x-adminlte-input
          required
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="0"
        />
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

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
