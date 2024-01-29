@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('product-categories.index') }}">К списку</a>
  </div>
  <h1>Создать категорию товара</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Новая категория</h2>
    </div>
    <form method="POST" action="{{ route('product-categories.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
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
            >
            <label class="form-check-label" for="empty">
              Нет родительской категории
            </label>
          </div>
        </div>
        @include('crm.product-categories.parts.category-checkboxes', [ 'categories' => $categories ])
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">
            Отправить
          </button>
        </div>
      </div>
    </form>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script>
    $('#brand-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
