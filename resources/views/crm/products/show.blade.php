@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('products.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Товар</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $product->id }}</th>
        </tr>
        <tr>
          <th>Бренд</th>
          <th>{{ $brand->name }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $product->name }}</th>
        </tr>
        <tr>
          <th>Состав</th>
          <th>{{ $product->consist }}</th>
        </tr>
        <tr>
          <th>Цена</th>
          <th>{{ $product->price }}</th>
        </tr>
        <tr>
          <th>Категория</th>
          <th>{{ $category->name }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $product->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $product->priority }}</th>
        </tr>
        <tr>
          <th>Описание</th>
          <th>{{ $product->description }}</th>
        </tr>
      </tbody>
    </table>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
