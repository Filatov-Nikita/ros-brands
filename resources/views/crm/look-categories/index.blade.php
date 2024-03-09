@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <x-rejected-delete-action>
    Категория уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Список категорий образов</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('look-categories.create') }}">Создать</a>
</div>
<table class="table" id="category-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($categories as $category)
      <tr>
        <th>
          <a href="{{ route('look-categories.show', [ 'look_category' => $category->id ]) }}">
            {{ $category->name }}
          </a>
        </th>
        <th>{{ $category->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $category->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('look-categories.edit', [ 'look_category' => $category->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <x-adminlte-modal id="modal-destory-{{ $category->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('look-categories.destroy', [ 'look_category' => $category->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $category->id }}" />
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
    $('#category-list-table').DataTable();
    // new DataTable('', {
    //     order: [[3, 'desc']]
    // });
  </script>
@stop
