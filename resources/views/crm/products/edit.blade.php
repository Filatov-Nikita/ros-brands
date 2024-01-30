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
        <div class="form-group">
          <label for="name">Название</label>
          <input required class="form-control" id="name" name="name" type="text" value="{{ $product->name }}" />
        </div>
        <div class="form-group">
          <label for="price">Цена</label>
          <input required class="form-control" id="price" name="price" type="number" value="{{ $product->price }}" />
        </div>
        <div class="form-group">
          <label for="consist">Состав</label>
          <input required class="form-control" id="consist" name="consist" type="text" value="{{ $product->consist }}" />
        </div>
        <div class="form-group">
          <label for="description">Описание</label>
          <textarea class="form-control" id="description" name="description" rows="5">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
          <label for="brand">Бренд</label>
          <select id="brand" class="custom-select" name="brand_id">
            @foreach($brands as $brand)
              <option {{ $brand->id === $product->brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
          </select>
        </div>
        <p class="text-bold">Категория товара</p>
        @include('crm.products.parts.category-list-edit', [
          'categories' => $categories,
          'product' => $product,
        ])
        <div class="form-group">
          <label>Видимость</label>
          <select class="form-control" name="visible">
            <option {{ $product->visible === 1 ? 'selected' : '' }} value="1">Да</option>
            <option {{ $product->visible === 0 ? 'selected' : '' }} value="0">Нет</option>
          </select>
        </div>
        <div class="form-group">
          <label for="priority">Приоритет</label>
          <input class="form-control" id="priority" name="priority" type="number" value="{{ $product->priority }}" />
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
