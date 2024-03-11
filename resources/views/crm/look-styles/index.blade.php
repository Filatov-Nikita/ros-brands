@extends('adminlte::page')

@section('title', 'Стили образов')

@section('content_header')
  <h1>Стили образов</h1>
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
            <x-adminlte-modal id="modal-destory-{{ $style->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('look-styles.destroy', [ 'look_style' => $style->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $style->id }}" />
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
    $('#style-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
