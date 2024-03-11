@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-edit-toolbar resource_name="users" resource="{{ $user->id }}" />
@stop

@section('content')
  <div class="card card-primary">
    <div class="card-header">
      <h2 class="card-title">{{ $user->name }}</h2>
    </div>
    <form method="POST" action="{{ route('users.update', [ 'user' => $user->id ]) }}">
      @csrf
      @method('PUT')
      <div class="card-body">
        <x-adminlte-input
          disabled
          name="email"
          id="email"
          label="E-mail"
          type="text"
          value="{{ $user->email }}"
        />
        <x-adminlte-input
          required
          name="name"
          id="name"
          label="Имя"
          type="text"
          enable-old-support
          value="{{ $user->name }}"
        />
        <x-adminlte-input
          name="password"
          id="password"
          label="Новый пароль"
          type="password"
        />
        <x-adminlte-input
          name="password_confirmation"
          id="password_confirmation"
          label="Подтвердите пароль"
          type="password"
        />
        <x-adminlte-select
          name="visible"
          label="Видимость"
          enable-old-support
          value="{{ $user->visible }}"
        >
          <option value="1" @selected($user->visible === 1)>Да</option>
          <option value="0" @selected($user->visible === 0)>Нет</option>
        </x-adminlte-select>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">
          Отправить
        </button>
      </div>
    </form>
  </div>
@stop
