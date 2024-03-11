@extends('adminlte::page')

@section('title', 'Спецпредложения | ' . $promotion->name)

@section('content_header')
  <x-card-toolbar resource_name="promotions" resource="{{ $promotion->id }}" />
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Спецпредложение: {{ $promotion->name }}</h1>
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
