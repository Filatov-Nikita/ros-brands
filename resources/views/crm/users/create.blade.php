@extends('adminlte::page')

@section('title', 'Пользователи | Cоздать')

@section('content_header')
  <div class="mb-3">
    <a href="{{ route('users.index') }}">К списку</a>
  </div>
  <h1>Создать пользователя</h1>
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">Пользователь</h2>
    </div>
    <form method="POST" action="{{ route('users.store') }}">
      @csrf
      <div class="card-body">
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Имя"
          type="text"
          enable-old-support
        />
        <x-adminlte-input
          required
          name="email"
          id="email"
          label="E-mail"
          type="email"
          enable-old-support
        />
        <x-adminlte-input
          required
          name="password"
          id="password"
          label="Пароль"
          type="password"
        />
        <x-adminlte-input
          required
          name="password_confirmation"
          id="password_confirmation"
          label="Повторите пароль"
          type="password"
        />
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop

@section('css')
  {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop
