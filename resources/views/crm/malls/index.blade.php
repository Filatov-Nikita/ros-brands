@extends('adminlte::page')

@section('title', 'Моллы')

@section('content_header')
  <h1>Моллы</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('malls.create') }}">Создать</a>
</div>
<table class="table" id="mall-list-table" style="width:100%">
  <thead>
      <tr>
        <th>ID</th>
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
        <th>{{ $mall->id }}</th>
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
            <x-adminlte-modal id="modal-destory-{{ $mall->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('malls.destroy', [ 'mall' => $mall->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $mall->id }}" />
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
    $('#mall-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
