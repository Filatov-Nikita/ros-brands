@extends('adminlte::page')

@section('title', 'Цвета образов | ' . $color->name)

@section('content_header')
  <x-card-toolbar resource_name="look-colors" resource="{{ $color->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Цвет образа: {{ $color->name }}</h1>
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
