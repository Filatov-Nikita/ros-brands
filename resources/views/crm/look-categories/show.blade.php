@extends('adminlte::page')

@section('title', 'Категории образов | ' . $look_category->name)

@section('content_header')
  <x-card-toolbar resource_name="look-categories" resource="{{ $look_category->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Категория образа: {{ $look_category->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $look_category->id }}</th>
        </tr>
        <tr>
          <th>Название</th>
          <th>{{ $look_category->name }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $look_category->visible ? 'Да' : 'Нет' }}</th>
        </tr>
        <tr>
          <th>Приоритет</th>
          <th>{{ $look_category->priority }}</th>
        </tr>
      </tbody>
    </table>
  </div>
@stop
