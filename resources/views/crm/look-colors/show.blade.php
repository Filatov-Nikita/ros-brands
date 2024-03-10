@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-card-toolbar resource_name="look-colors" resource="{{ $color->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Цвет: {{ $color->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $color->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $color->name }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $color->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $color->priority }}</th>
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
