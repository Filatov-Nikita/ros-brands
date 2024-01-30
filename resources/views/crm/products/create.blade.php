@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('products.index') }}">К списку</a>
  </div>
  <h1>Создать Товар</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Товар</h2>
    </div>
    <form method="POST" action="{{ route('products.store') }}">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" />
        </div>
        <div class="form-group">
          <label for="consist">Состав</label>
          <input required class="form-control" id="consist" name="consist" type="text" />
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="description" name="description" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label for="price">Цена</label>
          <input class="form-control" id="price" name="price" type="number" value="0" />
        </div>
        <div class="form-group">
          <label for="brand">Бренд</label>
          <select id="brand" class="custom-select" name="brand_id">
            @foreach($brands as $brand)
              <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
          </select>
        </div>
        <p class="text-bold">Категория товара</p>
        @include('crm.products.parts.category-list-insert', [
          'categories' => $categories
        ])
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="0" />
        </div>
        <div class="form-group">
          <label>Видимость</label>
          <select class="custom-select" name="visible">
            <option value="1">Да</option>
            <option value="0">Нет</option>
          </select>
        </div>
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
