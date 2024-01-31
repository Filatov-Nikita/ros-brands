@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div>
    <a href="{{ route('designers.index') }}">К списку</a>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Стилист {{ $designer->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $designer->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $designer->name }}</th>
        </tr>
        <tr>
          <th>Короткое описание</th>
          <th>{{ $designer->position }}</th>
        </tr>
        <tr>
          <th>Описание</th>
          <th>{{ $designer->description }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $designer->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $designer->priority }}</th>
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
