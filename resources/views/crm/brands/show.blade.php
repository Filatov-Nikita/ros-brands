@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('brands.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Бренд {{ $brand->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $brand->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $brand->name }}</th>
        </tr>
        <tr>
          <th>ID на сайте планета</th>
          <th>{{ $brand->planeta_mall_id }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $brand->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Есть в ТРЦ:</th>
          <th>
            <ul class="list-group">
              @forelse($malls as $mall)
                <li class="list-group-item">{{ $mall->name }} - {{ $mall->city }}</li>
              @empty
                <p class="text-danger">Не привязан ни к одному ТРЦ</p>
              @endforelse
            </ul>
          </th>
        </tr>
      </tbody>
    </table>
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
