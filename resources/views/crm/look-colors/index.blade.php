@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-rejected-delete-action>
    Цвет уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Список цветов для образа</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('look-colors.create') }}">Создать</a>
</div>
<table class="table" id="color-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Цвет</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($colors as $color)
      <tr>
        <th>
          <a href="{{ route('look-colors.show', [ 'look_color' => $color->id ]) }}">
            {{ $color->name }}
          </a>
        </th>
        <th>
          <span style="display:block; width: 20px; height: 20px; border-radius:50%; background-color: {{ $color->color_in_hex }}"></span>
        </th>
        <th>{{ $color->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $color->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('look-colors.edit', [ 'look_color' => $color->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('look-colors.destroy', [ 'look_color' => $color->id ]) }}">
              @method('DELETE')
              @csrf
              <button class="btn btn-default bg-dander" type="submit" alt="удалить">
                <i class="fas fa-trash"></i>
              </button>
            </form>
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
