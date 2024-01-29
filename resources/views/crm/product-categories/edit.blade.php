@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a class="" href="{{ route('product-categories.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $product_category->name }}</h2>
    </div>
    <form method="POST" action="{{ route('product-categories.update', [ 'product_category' => $product_category->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $product_category->name }}" />
        </div>
        <p class="text-bold">Родительская категория</p>
        <div class="form-group">
          <div class="form-check">
            <input
              class="form-check-input"
              type="radio"
              name="cat_parent"
              id="empty"
              value=""
              {{ $parent === null ? 'checked' : '' }}
            >
            <label class="form-check-label" for="empty">
              Нет родительской категории
            </label>
          </div>
        </div>
        @include('crm.product-categories.parts.category-checkboxes-edit', [
          'categories' => $categories,
          'current_cat' => $product_category,
          'parent_cat' => $parent
        ])
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
