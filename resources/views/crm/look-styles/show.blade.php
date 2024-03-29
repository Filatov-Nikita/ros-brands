@extends('adminlte::page')

@section('title', 'Стили образов | ' . $look_style->name)

@section('content_header')
  <x-card-toolbar resource_name="look-styles" resource="{{ $look_style->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Стиль образа: {{ $look_style->name }}</h1>
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
