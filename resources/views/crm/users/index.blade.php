@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список пользователей</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('users.create') }}">Создать</a>
</div>
<table class="table" id="color-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Email</th>
        <th>Имя</th>
        <th>Видимость</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <th>
          <a href="{{ route('users.show', [ 'user' => $user->id ]) }}">
            {{ $user->email }}
          </a>
        </th>
        <th>{{ $user->name }}</th>
        <th>{{ $user->visible ? 'Да' : 'Нет' }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('users.edit', [ 'user' => $user->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
          </div>
        </th>
      </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
  <script>
    $('#color-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
