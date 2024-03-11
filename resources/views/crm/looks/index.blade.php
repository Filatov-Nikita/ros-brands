@extends('adminlte::page')

@section('title', 'Образы')

@section('content_header')
  <h1>Образы</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('looks.create') }}">Создать</a>
</div>
<table class="table" id="look-list-table" style="width:100%">
  <thead>
      <tr>
        <th>Название</th>
        <th>Видимость</th>
        <th>Приоритет</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($looks as $look)
      <tr>
        <th>
          <a href="{{ route('looks.show', [ 'look' => $look->id ]) }}">
            {{ $look->name }}
          </a>
        </th>
        <th>{{ $look->visible ? 'Да' : 'Нет' }}</th>
        <th>{{ $look->priority }}</th>
        <th>
          <div class="btn-group">
            <a class="btn btn-default mr-2" href="{{ route('looks.edit', [ 'look' => $look->id ]) }}" alt="изменить">
              <i class="fas fa-edit"></i>
            </a>
            <x-adminlte-modal id="modal-destory-{{ $look->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('looks.destroy', [ 'look' => $look->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $look->id }}" />
          </div>
        </th>
      </tr>
    @endforeach
  </tbody>
</table>
<div class="pb-4"></div>
@stop

@section('js')
  <script>
    $('#look-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
