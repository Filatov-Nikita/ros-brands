@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('malls.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>ТРЦ {{ $mall->name }} - {{ $mall->city }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $mall->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $mall->name }}</th>
        </tr>
        <tr>
          <th>Город</th>
          <th>{{ $mall->city }}</th>
        </tr>
        <tr>
          <th>Сайт</th>
          <th>
            <a href="{{ $mall->site_href }}" target="_blank">
              {{ $mall->site_href }}
            </a>
          </th>
        </tr>
        <tr>
          <th>Город</th>
          <th>{{ $mall->city }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $mall->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $mall->priority }}</th>
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
    $('#mall-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
