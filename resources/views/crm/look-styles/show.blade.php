@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('look-styles.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Категория {{ $look_style->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $look_style->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $look_style->name }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $look_style->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $look_style->priority }}</th>
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