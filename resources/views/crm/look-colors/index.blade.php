@extends('adminlte::page')

@section('title', 'Цвета образов')

@section('content_header')
  <x-rejected-delete-action>
    Цвет уже используется в других записях.
  </x-rejected-delete-action>
  <h1>Цвета образов</h1>
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
            <x-adminlte-modal id="modal-destory-{{ $color->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('look-colors.destroy', [ 'look_color' => $color->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $color->id }}" />
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
    $('#color-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
