@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Список ТРЦ</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('malls.create') }}">Создать</a>
</div>
<table class="table" id="mall-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Город</th>
        <th>Сайт</th>
        <th>Код</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($malls as $mall)
      <tr>
        <th>
          <a href="{{ route('malls.show', [ 'mall' => $mall->id ]) }}">
            {{ $mall->name }}
          </a>
        </th>
        <th>{{ $mall->city }}</th>
        <th>
          <a href="{{ $mall->site_href }}">
            {{ $mall->site_href }}
          </a>
        </th>
        <th>{{ $mall->planeta_mall_code }}</th>
        <th>{{ $mall->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $mall->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('malls.edit', [ 'mall' => $mall->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('malls.destroy', [ 'mall' => $mall->id ]) }}">
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
    $('#mall-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
