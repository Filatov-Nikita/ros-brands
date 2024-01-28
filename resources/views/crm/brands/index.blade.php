@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список Брендов</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('brands.create') }}">Создать</a>
</div>
<table id="brand-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>ID на сайте планета</th>
        <th>Видимость</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($brands as $brand)
      <tr>
        <th>
          <a href="{{ route('brands.show', [ 'brand' => $brand->id ]) }}">
            {{ $brand->name }}
          </a>
        </th>
        <th>{{ $brand->planeta_mall_id }}</th>
        <th>{{ $brand->visible ? 'Да' : 'Нет' }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('brands.edit', [ 'brand' => $brand->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('brands.destroy', [ 'brand' => $brand->id ]) }}">
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
    $('#brand-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
