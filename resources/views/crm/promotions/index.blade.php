@extends('adminlte::page')

@section('title', 'Спецпредложения')

@section('content_header')
  <h1>Спецпредложения</h1>
@stop

@section('content')
<div class="mb-4">
  <a class="btn btn-primary" href="{{ route('promotions.create') }}">Создать</a>
</div>
<table class="table" id="promotion-list-table" style="width:100%">
  <thead>
      <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Видимость</th>
        <th>Действия</th>
      </tr>
  </thead>
  <tbody>
    @foreach ($promotions as $promotion)
      <tr>
        <th>{{ $promotion->id }}</th>
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
            <x-adminlte-modal id="modal-destory-{{ $promotion->id }}" title="Вы уверены, что хотите удалить запись?" theme="danger">
              <x-slot name="footerSlot">
                <x-adminlte-button label="Отмена" data-dismiss="modal"/>
                <form method="POST" action="{{ route('promotions.destroy', [ 'promotion' => $promotion->id ]) }}">
                  @method('DELETE')
                  @csrf
                  <x-adminlte-button theme="danger" label="Удалить навсегда" type="submit" alt="удалить" />
                </form>
              </x-slot>
            </x-adminlte-modal>
            <x-adminlte-button icon="fas fa-trash" data-toggle="modal" data-target="#modal-destory-{{ $promotion->id }}" />
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
    $('#promotion-list-table').DataTable(
      {
        language: {
          url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/ru.json',
        }
      }
    );
  </script>
@stop
