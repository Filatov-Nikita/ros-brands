@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список стилей образов</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('look-styles.create') }}">Создать</a>
</div>
<table class="table" id="style-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($styles as $style)
      <tr>
        <th>
          <a href="{{ route('look-styles.show', [ 'look_style' => $style->id ]) }}">
            {{ $style->name }}
          </a>
        </th>
        <th>{{ $style->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $style->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('look-styles.edit', [ 'look_style' => $style->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('look-styles.destroy', [ 'look_style' => $style->id ]) }}">
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
    $('#style-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
