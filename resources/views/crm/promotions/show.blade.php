@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('promotions.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Промоакция {{ $promotion->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $promotion->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $promotion->name }}</th>
        </tr>
        <tr>
          <th>Заголовок</th>
          <th>{{ $promotion->title }}</th>
        </tr>
        <tr>
          <th>Описание</th>
          <th>{{ $promotion->description }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $promotion->visible ? 'Да' : 'Нет' }}</th>
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
