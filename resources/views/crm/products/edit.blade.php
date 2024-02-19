@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('products.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $product->name }}</h2>
    </div>
    <form method="POST" action="{{ route('products.update', [ 'product' => $product->id ]) }}">
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
          value="{{ $product->name }}"
        />

        <x-adminlte-input
          required
          name="consist"
          id="consist"
          label="Состав"
          type="text"
          enable-old-support
          value="{{ $product->consist }}"
        />

        <x-adminlte-textarea
          required
          label="Описание"
          id="description"
          name="description"
          rows="5"
          enable-old-support
        >
          {{ $product->description }}
        </x-adminlte-textarea>

        <x-adminlte-input
          required
          name="price"
          id="price"
          label="Цена"
          type="number"
          enable-old-support
          value="{{ $product->price }}"
        />

        <x-adminlte-select
          id="brand"
          name="brand_id"
          label="Бренд"
          enable-old-support
        >
          <x-adminlte-options :options="$brands->pluck('name', 'id')->toArray()" selected="{{ $product->brand->id }}" />
        </x-adminlte-select>

        @include('crm.products.parts.category-list-form', [
          'categories' => $categories,
          'product' => $product,
          'checked' => $product->product_category_id,
        ])

        <x-adminlte-input
          required
          name="priority"
          id="priority"
          label="Приоритет"
          type="number"
          enable-old-support
          value="{{ $product->priority }}"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $product->visible }}"
        >
          <option value="1" @selected($product->visible === 1)>Да</option>
          <option value="0" @selected($product->visible === 0)>Нет</option>
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
