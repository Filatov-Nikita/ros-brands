@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список стилей образов</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('designers.create') }}">Создать</a>
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
    @foreach ($designers as $designer)
      <tr>
        <th>
          <a href="{{ route('designers.show', [ 'designer' => $designer->id ]) }}">
            {{ $designer->name }}
          </a>
        </th>
        <th>{{ $designer->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $designer->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('designers.edit', [ 'designer' => $designer->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('designers.destroy', [ 'designer' => $designer->id ]) }}">
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
