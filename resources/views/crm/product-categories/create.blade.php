@extends('adminlte::page')

@section('title', 'Категории товаров | Создать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('product-categories.index') }}">К списку</a>
  </div>
  <h1>Создать категорию товара</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Категория товара</h2>
    </div>
    <form method="POST" action="{{ route('product-categories.store') }}">
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

        @include('crm.product-categories.parts.category-checkboxes', [ 'categories' => $categories ])
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop
