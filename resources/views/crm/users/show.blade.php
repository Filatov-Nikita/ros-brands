@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <div class="d-flex justify-content-between">
    <a href="{{ route('users.index') }}">К списку</a>
    <div class="ml-4">
      <a href="{{ route('users.edit', [ 'user' => $user->id ]) }}" class="btn btn-primary">
        Редактировать
      </a>
    </div>
  </div>
@stop

@section('content')
  <div class="card col col-6">
    <div class="card-header">
      <h1>Пользователь: {{ $user->name }}</h1>
    </div>
    <table class="table table-striped">
      <tbody>
        <tr>
          <th>ID</th>
          <th>{{ $user->id }}</th>
        </tr>
        <tr>
          <th>E-mail</th>
          <th>{{ $user->email }}</th>
        </tr>
        <tr>
          <th>Имя</th>
          <th>{{ $user->name }}</th>
        </tr>
        <tr>
          <th>Видимость</th>
          <th>{{ $user->visible ? 'Да' : 'Нет' }}</th>
        </tr>
      </tbody>
    </table>
  </div>
@stop
