@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Промоакции</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('promotions.create') }}">Создать</a>
</div>
<table class="table" id="promotion-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Видимость</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($promotions as $promotion)
      <tr>
        <th>
          <a href="{{ route('promotions.show', [ 'promotion' => $promotion->id ]) }}">
            {{ $promotion->name }}
          </a>
        </th>
        <th>{{ $promotion->visible ? 'Да' : 'Нет' }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('promotions.edit', [ 'promotion' => $promotion->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <form method="POST" action="{{ route('promotions.destroy', [ 'promotion' => $promotion->id ]) }}">
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
    $('#promotion-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
