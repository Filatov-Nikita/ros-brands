@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список Товаров</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('products.create') }}">Создать</a>
</div>
<table class="table" id="product-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Цена</th>
        <th>Бренд</th>
        <th>Категория</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($products as $product)
      <tr>
        <th>
          <a href="{{ route('products.show', [ 'product' => $product->id ]) }}">
            {{ $product->name }}
          </a>
        </th>
        <th>{{ $product->price }}</th>
        <th>{{ $product->brand->name }}</th>
        <th>{{ $product->product_category->name }}</th>
        <th>{{ $product->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $product->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('products.edit', [ 'product' => $product->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('products.destroy', [ 'product' => $product->id ]) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-default bg-dander" type="submit" alt="удалить">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </div>
        </th>
      </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script>
    $('#product-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
